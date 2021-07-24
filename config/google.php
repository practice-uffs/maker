<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Google Drive
    |--------------------------------------------------------------------------
    |
    | Informações relacionadas aos serviços do Google Drive.
    |
    |  digital_content_folder_id:
    |      id da pasta "DigitalContent" no google Drive
    |
    */
    'docs' => [
        'digital_content_folder_id' => env('GOOGLE_DRIVE_DIGITAL_CONTENT_FOLDER_ID', ''),
    ],    
];
