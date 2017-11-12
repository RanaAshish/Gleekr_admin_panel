<?php

return [
    'gleekrIOS' => [
        'environment' => 'production',
        'certificate' =>  storage_path('app/GleekrPush.pem'),
        'passPhrase' => '',
        'service' => 'apns'
    ],

    'gleekrAndroid' => [
        'environment' => 'production',
        'apiKey' => 'AIzaSyBt9eb49IQxcgZhnwbUXBD5ePGhnDgSpF4',
        'service' => 'gcm'
    ]
];