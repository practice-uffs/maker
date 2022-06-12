<?php

namespace App\Services;

use Google\Client;
use Illuminate\Support\Str;
use Google_Service_Drive;

class GoogleDoc
{
    protected $client;
    protected $service;

    public function __construct(array $config = [])
    {
        $this->config = config('google');
        $this->client = $this->getGoogleClient();
        $this->service = new Google_Service_Drive($this->client);
    }

    public function getService(): Google_Service_Drive
    {
        return $this->service;
    }

    public function config($key, $defaulValue = null)
    {
        if(!is_array($this->config) || !isset($this->config['docs'])) {
            return $defaulValue;
        }
        if(isset($this->config['docs'][$key])) {
            return $this->config['docs'][$key];
        }
        return $defaulValue;    
    }


    public function findBookById($fileId){
        $fileInfo = [];
        try {
            $response = $this->service->files->export($fileId, 'text/plain', array('alt' => 'media' ));
            $content = $response->getBody()->getContents();

            $parameters = array();
            $parameters['fields'] = 'permissions(*)';
            $permissions = $this->service->permissions->listPermissions($fileId, $parameters);
            
            $countPermissions = 0;
            foreach ($permissions->getPermissions() as $permission){
                $fileInfo['ownerEmail'][$countPermissions] = $permission['emailAddress'];
                $countPermissions++;
            }
            $fileInfo['content'] = $content;
            $fileInfo['title'] =  $this->service->files->get($fileId)->getName();
            $fileInfo['error'] = '';
            return $fileInfo;
        } catch (\Google_Service_Exception $e){
            $fileInfo['error'] = 'Arquivo não encontrado, verifique se você compartilhou corretamente o seu Google Docs no modo \'Editor\'';
            return $fileInfo;
        }
    }

    public function findSiteById($fileId){
        $fileInfo = [];
        try {
            $response = $this->service->files->export($fileId, 'text/plain', array('alt' => 'media' ));
            $content = $response->getBody()->getContents();
            
            $arrayOfLines = $this->parseDocsToArray($content);

            $siteContent = $this->parseLineArrayToPageArray($arrayOfLines);

            $parameters = array();
            $parameters['fields'] = 'permissions(*)';
            $permissions = $this->service->permissions->listPermissions($fileId, $parameters);
            
            $countPermissions = 0;
            foreach ($permissions->getPermissions() as $permission){
                $fileInfo['ownerEmail'][$countPermissions] = $permission['emailAddress'];
                $countPermissions++;
            }

            $fileInfo['content'] = $siteContent;
            $fileInfo['title'] =  $this->service->files->get($fileId)->getName();
            $fileInfo['error'] = '';
            return $fileInfo;

        } catch (\Google_Service_Exception $e){
            $fileInfo['error'] = 'Arquivo não encontrado, verifique se você compartilhou o documento no modo \'Editor\'!';
            return $fileInfo;
        }
    }


    public function downloadFileById($fileId){
        try {
            $response = $this->service->files->export($fileId, 'text/plain', array('alt' => 'media' ));
            $content = $response->getBody()->getContents();

            $arrayOfLines = $this->parseDocsToArray($content);

            $arrayOfLines = $this->findImageAndAdaptLink($arrayOfLines);

            $bookContent = $this->parseLineArrayToChapterArray($arrayOfLines);

            $interactions = 0;
            foreach( $bookContent as $bookChapter ){
                $title = $bookChapter['title'];
                $chapter = $bookChapter['chapter'];
                $content = $bookChapter['content'];
                
                if($content == "" && $title == "Capítulo não informado\r\n"){
                    continue;
                } else {
                    
                    $content = "# $title".$content; 
                    
                    if ($interactions < 9){
                        $fileName = "0".$chapter.$title;
                    } else {
                        $fileName = $chapter.$title;
                    }
                    
                    $fileName = Str::slug($fileName);
                    if(strlen($fileName) > 200){
                        $fileName = substr($fileName, 0 , 200);
                    }
                    $public_path = public_path();
                    file_put_contents($public_path."/book/content/$fileName.md",$content);
                    $interactions++;
                }
            }
            return true;
        } catch (\Google_Service_Exception $e){
            return false;
        }
    }

    public function verifyFileById($fileId){
        try {
            $response = $this->service->files->export($fileId, 'text/plain', array('alt' => 'media' ));
            $content = $response->getBody()->getContents();
            return true;
        } catch (\Google_Service_Exception $e){
            return false;
        }
    }

    

    public function parseDocsToArray($content){
    
        $arrayOfLines = array();
        $hasLines = true;
        $currentLine = 0;
        $numberOfLines = substr_count($content, "\r\n");

        while ($hasLines){
            if ($currentLine < $numberOfLines+1){
                if($numberOfLines == 0){
                    $arrayOfLines[$currentLine] = $content;
                    $hasLines = false;
                } else {
                    if($currentLine == $numberOfLines){
                        $arrayOfLines[$currentLine] = substr($content, 0);
                    } else {
                        $arrayOfLines[$currentLine] = substr($content, 0, strpos($content, "\r\n")+2);
                        $content = substr( $content, strpos($content, "\r\n")+2);
                    }
                }
            } else {
                $hasLines = false;
            }
            $currentLine = $currentLine+1;
        }

        return $arrayOfLines;
    }

    public function findImageAndAdaptLink($arrayOfLines){
        $currentLine = 0;
        
        foreach ($arrayOfLines as $line) {
            preg_match('/!\[(.*)\]\((.*)\)/', $line, $output_array);
            $oldLine = $line;
            if (!empty($output_array)){
                $title = $output_array[1];
                $link = $output_array[2];
                $bookIdArray = $this->parseUrl($link);
                if(!empty($bookIdArray)){
                    $bookId = $bookIdArray[0];
                    $newLink = "https://drive.google.com/uc?export=view&id=$bookId";
                    $arrayOfLines[$currentLine] = "![$title]($newLink)";
                } else {
                    $arrayOfLines[$currentLine] = $oldLine;
                }
            } 
            $currentLine = $currentLine + 1;
        } 
        return $arrayOfLines;
    }

    public function parseUrl($url){
        preg_match('/(?<=\/d\/).*(?=\/view)/', $url, $id);
        return $id;
    }

    public function parseLineArrayToChapterArray($arrayOfLines){
        $currentLine = 0;
        $chapter = 1;
        $bookContent = [
            [
                'title' => "Capítulo não informado\r\n",
                'content' => '',
                'chapter' => 0,
            ]
        ];

        foreach ($arrayOfLines as $line) {
            preg_match('/{(.*)}/', $line, $outputChapter);
            if (empty($outputChapter)){
                $bookContent[$chapter-1]['content'] = $bookContent[$chapter-1]['content'].$line;
            } else {
                if ( Str::slug($outputChapter[1]) == 'capitulo' ){
                    $bookContent[] = [ "title" => preg_replace('/{(.*)}/', '', $line), "content" => "", "chapter" => $chapter];
                    $chapter = $chapter + 1;   
                } else {
                    $bookContent[$chapter-1]['content'] = $bookContent[$chapter-1]['content'].$line;
                }
            }
            $currentLine = $currentLine + 1;
        } 

        return $bookContent;
    }

    public function parseLineArrayToPageArray($arrayOfLines){
        $currentLine = 0;
        $path = 1;
        $siteContent = [
            [
                'path' => "caminho-nao-informado",
                'content' => '',
            ]
        ];
        foreach ($arrayOfLines as $line) {
            preg_match('/{(.*)}/', $line, $outputPath);
            if (empty($outputPath)){
                $siteContent[$path-1]['content'] = $siteContent[$path-1]['content'].$line;
            } else {
                $siteContent[] = [ "path" => $outputPath[1], "content" => ""];
                $path = $path + 1;   
            }
            $currentLine = $currentLine + 1;
        }  
        return $siteContent;
    }

    /**
     * Returns an authorized API client.
     * @return Google_Client the authorized client object
     */
    protected function getGoogleClient(array $options = []): Client
    {
        $client = new Client();

        $client->setHttpClient(new \GuzzleHttp\Client([
            \GuzzleHttp\RequestOptions::VERIFY => \Composer\CaBundle\CaBundle::getSystemCaRootBundlePath()
        ]));

        $client->setApplicationName('Practice Google Drive');
        $client->setScopes(Google_Service_Drive::DRIVE);
        $client->setAuthConfig(config_path('google/credentials.json'));
        $client->setAccessType('offline');
        $client->setPrompt('select_account consent');
        $client->setApprovalPrompt('consent');

        // Load previously authorized token from a file, if it exists.
        // The file token.json stores the user's access and refresh tokens, and is
        // created automatically when the authorization flow completes for the first
        // time.
        $tokenPath = config_path('google/token.json');
        if (file_exists($tokenPath)) {
            $accessToken = json_decode(file_get_contents($tokenPath), true);
            $client->setAccessToken($accessToken);
        }
        
        // If there is no previous token or it's expired.
        if ($client->isAccessTokenExpired()) {
            // Refresh the token if possible, else fetch a new one.
            if ($client->getRefreshToken()) {
                $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
            } else {
                // Request authorization from the user.
                $authUrl = $client->createAuthUrl();
                printf("Open the following link in your browser:\n%s\n", $authUrl);
                print 'Enter verification code: ';
                
                $authCode = env('GOOGLE_VERIFICATION_CODE','');

                // Exchange authorization code for an access token.
                $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
                $client->setAccessToken($accessToken);

                // Check to see if there was an error.
                if (array_key_exists('error', $accessToken)) {
                    throw new \Exception(join(', ', $accessToken));
                }
            }
            // Save the token to a file.
            if (!file_exists(dirname($tokenPath))) {
                mkdir(dirname($tokenPath), 0700, true);
            }
            file_put_contents($tokenPath, json_encode($client->getAccessToken()));
        }
        return $client;
    }
}

