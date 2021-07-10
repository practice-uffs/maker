<?php

require __DIR__ . '../../../vendor/autoload.php';

class GoogleDoc {
    protected $client;
    protected $service;
    public function getClient()    
    {   
        $client = new Google_Client();
        $client->setApplicationName('Google Drive API Online Documents');
        $client->setScopes(Google_Service_Drive::DRIVE);
        // TODO : Use config_path() to get the credentials.json
        $client->setAuthConfig('../../config/google/credentials.json');
        $client->setAccessType('offline');
        $client->setApprovalPrompt('force');
        // TODO : Use config_path() to get the token.json
        $credentialsPath = '../../config/google/token.json';
        if (file_exists($credentialsPath)) {
            $accessToken = json_decode(file_get_contents($credentialsPath), true);
        } else {
            $authUrl = $client->createAuthUrl();
            printf("Open the following link in your browser:\n%s\n", $authUrl);
            print 'Enter verification code: ';
            $authCode = trim(fgets(STDIN));
            $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
            if (!file_exists(dirname($credentialsPath))) {
                mkdir(dirname($credentialsPath), 0700, true);
            }
            file_put_contents($credentialsPath, json_encode($accessToken));
            printf("Credentials saved to %s\n", $credentialsPath);
        }
        $client->setAccessToken($accessToken);
        if ($client->isAccessTokenExpired()) {
            $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
            file_put_contents($credentialsPath, json_encode($client->getAccessToken()));
        }
        return $client;
    }   

    public function getFilesFromSpecificFolderInArray(){
        if (!isset($this->client)){
            $this->client = $this->getClient();
        }
        if (!isset($this->service)){
            $this->service = new Google_Service_Drive($this->client);
        }
        // TODO : Use the folder ID from config/google.php
        $folderId = '1rfKpEqhv5WGCwfAqx8xYGTPlzj-748YC';
        $parameters = [
            'q' => "'$folderId' in parents"];
        $files = $this->service->files->listFiles($parameters);
        $arrayOfFiles = [];
        $count = 0;
        if (count($files->getFiles()) == 0) {
            return false;
        } 
        else{
            foreach ($files->getFiles() as $file) {
                $response = $this->service->files->export($file->getId(), 'text/html', array('alt' => 'media' ));
                $content = $response->getBody()->getContents();
                $arrayOfFiles [$count] = $content;
                $count++;
            }
            return $arrayOfFiles;
        }
    }
    
    public function downloadDocsFromSpecificFolder(){
        if (!isset($this->client)){
            $this->client = $this->getClient();
        }
        if (!isset($this->service)){
            $this->service = new Google_Service_Drive($this->client);
        }
        // TODO : Use the folder ID from config/google.php
        // Also, notice that i don't put the credential and token in the .git ignore
        $folderId = '1rfKpEqhv5WGCwfAqx8xYGTPlzj-748YC';
        $parameters = [
            'q' => "'$folderId' in parents"];
        $files = $this->service->files->listFiles($parameters);
        if (count($files->getFiles()) == 0) {
            return false;
        } 
        else{
            foreach ($files->getFiles() as $file) {
                $response = $this->service->files->export($file->getId(), 'text/html', array('alt' => 'media' ));
                $content = $response->getBody()->getContents();
                $data = $content;
                $name = $file->getName();
                file_put_contents("../../storage/DigitalContent/$name.html",$data);
            }
            return true;
        }
    }
}



