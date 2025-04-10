<?php


use Illuminate\Support\Facades\Cache;

return [
    'sms_configuration' => [
        'sms_api_url' => env('SMS_API_URL',''),
        'sms_api_username' => env('SMS_API_USERNAME',''),
        'sms_api_secret' => env('SMS_API_SECRET',''),
        'api_key' => env('SMS_API_KEY',''),
        'sender_id' => env('SMS_SENDER_ID',''),
    ],
    'app_name' => env('APP_NAME'),
    'asset_version' => env('ASSET_VERSION') ?? 1.3,
    'logo_path' => 'public/static/logo.png'
];
