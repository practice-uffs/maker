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
            $fileInfo['error'] = 'Arquivo não encontrado, verifique se você compartilhou corretamente o seu Google Docs com practiceuffs.maker@gmail.com';
            return $fileInfo;
        }
    }

    public function findSiteById($fileId){
        $fileInfo = [];
        try {
            $response = $this->service->files->export($fileId, 'text/plain', array('alt' => 'media' ));
            $content = $response->getBody()->getContents();
            
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

            $currentLine = 0;
            $path = 1;
            $siteContent = array();
            $siteContent[0] = array();
            $siteContent[0]['path'] = "caminho-nao-informado";
            $siteContent[0]['content'] = '';
            
            

            foreach ($arrayOfLines as $line) {
                preg_match('/{(.*)}/', $line, $outputPath);
                if (empty($outputPath)){
                    $siteContent[$path-1]['content'] = $siteContent[$path-1]['content'].$line;
                } else {
                    array_push($siteContent, array( "path" => $outputPath[1],
                                                    "content" => ""));
                    $path = $path + 1;   
                }
                $currentLine = $currentLine + 1;
            }  

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
            $fileInfo['error'] = 'Arquivo não encontrado, verifique se você compartilhou corretamente o seu Google Docs com practiceuffs.maker@gmail.com';
            return $fileInfo;
        }
    }


    public function downloadFileById($fileId){
        try {
            $response = $this->service->files->export($fileId, 'text/plain', array('alt' => 'media' ));
            $content = $response->getBody()->getContents();
            $fileDirectoryName = Str::slug($fileId[0]);

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

            $currentLine = 0;
            $chapter = 1;
            $bookContent = array();
            $bookContent[0] = array();
            $bookContent[0]['title'] = "Capítulo não informado\r\n";
            $bookContent[0]['content'] = '';
            $bookContent[0]['chapter'] = 0;
            

            foreach ($arrayOfLines as $line) {
                preg_match('/{(.*)}/', $line, $outputChapter);
                if (empty($outputChapter)){
                    
                    $bookContent[$chapter-1]['content'] = $bookContent[$chapter-1]['content'].$line;
                } else {
                    if ( Str::slug($outputChapter[1]) == 'capitulo' ){
                        array_push($bookContent, array( "title" => preg_replace('/{(.*)}/', '', $line),
                                                        "content" => "",
                                                        "chapter" => $chapter));
                        $chapter = $chapter + 1;   
                    } else {
                        $bookContent[$chapter-1]['content'] = $bookContent[$chapter-1]['content'].$line;
                    }
                }
                $currentLine = $currentLine + 1;
            }  
            
            foreach( $bookContent as $bookChapter ){
                $title = $bookChapter['title'];
                $chapter = $bookChapter['chapter'];
                $content = $bookChapter['content'];
                
                if($content == "" & $title == "Capítulo não informado\r\n"){
                    continue;
                } else {
                    $content = "# $title".$content; 
                    $fileName = $chapter.$title;
                    $fileName = Str::slug($fileName);
                    if(strlen($fileName) > 200){
                        $fileName = substr($fileName, 0 , 200);
                    }
                    file_put_contents("book/content/$fileName.md",$content);
                }
            }
            return true;
        } catch (\Google_Service_Exception $e){
            return false;
        }
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
                $authCode = trim(fgets(STDIN));

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

