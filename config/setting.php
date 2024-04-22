<?php

return [
    'app_name' => env('APP_NAME', 'Ecommerce'),
    'app_url' => env('APP_URL', 'http://localhost:8000'),
    'docs_url' => env('DOCS_URL', 'http://localhost:8000/docs'),
    'api' => 'v1',
    'api_url'  => env('API_URL', 'http://localhost:8000/api/v1'),
    'api_version' => env('API_VERSION', '1.0.0'),
    'date_format' => 'Y-m-d',
    'time_format' => 'H:i:s',
    'registration_default_role' => '4',
    'dashboard_language' => 'en',
    'primary_language' => 'es',
    'available_languages' => [
        'en' => 'English',
        'es' => 'Spanish',
    ],
    'models_dir' => 'Marketplace\Shared\Infrastructure\Persistence\Models'
];
