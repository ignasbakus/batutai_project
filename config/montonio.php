<?php
return [
    'access_key' => env('MONTONIO_ACCESS_KEY'),
    'secret_key' => env('MONTONIO_SECRET_KEY'),
    'api_url' => env('MONTONIO_API_URL'),
    'return_url' => env('MONTONIO_RETURN_URL'),
    'webhook_url' => env('MONTONIO_WEBHOOK_URL'),
    'payment_duration' => env('MONTONIO_PAYMENT_DURATION'),
    // Set to false to bypass payment and confirm immediately
    'require_payment' => env('MONTONIO_REQUIRE_PAYMENT', false),
];
