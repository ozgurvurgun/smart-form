<?php

return [
    'app_name' => 'Smartlab Participant Form',

    'jwt' => [
        'secret_key' => 'supersecretkey',
        'expiration' => 2592000, // 30 day
        'algorithm' => 'HS256'
    ],

    'error_handling' => [
        'web' => [
            'response_type' => 'text',  // "view" or "text"
            'view_path' => 'errors/404',
            'text_message' => '404 - Sayfa bulunamadı'
        ],
        'api' => [
            'response_type' => 'json',  // "json" or "text"
            'json_message' => '404 - API endpoint not found',
            'text_message' => '404 - API endpoint bulunamadı'
        ]
    ]
];
