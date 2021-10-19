<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Reshot
    |--------------------------------------------------------------------------
    |
    | Informações relacionadas aos serviços do reshot.com, que disponibiliza
    | imagens, ícones e ilustrações.
    |
    */
    'url' => [
        'icons' => env('RESHOT_URL_ICONS', 'https://www.reshot.com/free-svg-icons'),
        'illustrations' => env('RESHOT_URL_ILLUSTRATIONS', 'https://www.reshot.com/free-vector-illustrations'),
        'photos' => env('RESHOT_URL_PHOTOS', 'https://www.reshot.com/free-stock-photos'),
    ],    
];
