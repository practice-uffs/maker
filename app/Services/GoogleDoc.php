<?php

namespace App\Services;

use Google\Client;
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

    public function getFilesAsHtml(){
        $folderId = $this->config('digital_content_folder_id','');
        if($folderId == ''){
            return null;
        }
        $parameters = [
            'q' => "'$folderId' in parents"
        ];
        $files = $this->service->files->listFiles($parameters);
        $arrayOfFiles = [];
        $count = 0;
        if (count($files->getFiles()) == 0) {
            return null;
        } else {
            foreach ($files->getFiles() as $file) {
                $response = $this->service->files->export($file->getId(), 'text/html', array('alt' => 'media' ));
                $content = $response->getBody()->getContents();

                $parameters = array();
                $parameters['fields'] = 'permissions(*)';
                $permissions = $this->service->permissions->listPermissions($file->id, $parameters);
                $countPermissions = 0;
                
                foreach ($permissions->getPermissions() as $permission){
                    $arrayOfFiles[$count]['ownerEmail'][$countPermissions] = $permission['emailAddress'];
                    $countPermissions++;
                }

                $startBody = strpos($content, '<body');
                $finishBody = strpos($content, '</body>');
                $body = substr($content, $startBody, $finishBody);
                $body = preg_replace('/<\/body><\/html>/', '', $body);
                $body = preg_replace('/<body(.*?)>/', '', $body);
                $arrayOfFiles[$count]['content'] = $body;
                $arrayOfFiles[$count]['title'] = $file->getName();
                
                $count++;
            }
            return $arrayOfFiles;
        }
    }

    public function getFilesAsPlainText(){
        $folderId = $this->config('digital_content_folder_id','');
        if($folderId == ''){
            return null;
        }
        $parameters = [
            'q' => "'$folderId' in parents"
        ];
        $files = $this->service->files->listFiles($parameters);
        $arrayOfFiles = [];
        $count = 0;
        if (count($files->getFiles()) == 0) {
            return null;
        } else {
            foreach ($files->getFiles() as $file) {
                $response = $this->service->files->export($file->getId(), 'text/plain', array('alt' => 'media' ));
                $content = $response->getBody()->getContents();

                $parameters = array();
                $parameters['fields'] = 'permissions(*)';
                $permissions = $this->service->permissions->listPermissions($file->id, $parameters);
                $countPermissions = 0;
                
                foreach ($permissions->getPermissions() as $permission){
                    $arrayOfFiles[$count]['ownerEmail'][$countPermissions] = $permission['emailAddress'];
                    $countPermissions++;
                }

                $arrayOfFiles[$count]['content'] = $content;
                $arrayOfFiles[$count]['title'] = $file->getName();
                
                $count++;
            }
            return $arrayOfFiles;
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
        $client->setApprovalPrompt('force');

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