<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'google' => [
        'client_id' => '229016597854-k22i2aert98p538u4hnnpioc1jhmmai0.apps.googleusercontent.com',
        'client_secret' => 'xSrUACpYM9jqRjuA6O_92CXq',
        'redirect' => 'http://localhost:8000/google/callback',
    ],
    'facebook' => [
        'client_id' => '2143707139181900',
        'client_secret' => '78c18fc56a5b40984bbff28d46dda3cf',
        'redirect' => 'http://localhost:8000/facebook/callback',
    ],

];
