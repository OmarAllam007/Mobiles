<?php
return [
    //Environment=> test/production
    'env' => 'test',
    //Google Ads
    'production' => [
        'developerToken' => env('developerToken'),
        'clientCustomerId' => env('clientCustomerId'),
        'userAgent' => "YOUR-NAME",
        'clientId' => env('clientId'),
        'clientSecret' => env('clientSecret'),
        'refreshToken' => env('refreshToken')
    ],
    'test' => [
        'developerToken' => env('developerToken'),
        'clientCustomerId' => env('clientCustomerId'),
        'userAgent' => "YOUR-NAME",
        'clientId' => env('clientId'),
        'clientSecret' => env('clientSecret'),
        'refreshToken' => env('refreshToken')
    ],
    'oAuth2' => [
        'authorizationUri' => 'https://accounts.google.com/o/oauth2/v2/auth',
        'redirectUri' => 'urn:ietf:wg:oauth:2.0:oob',
        'tokenCredentialUri' => 'https://www.googleapis.com/oauth2/v4/token',
        'scope' => 'https://www.googleapis.com/auth/adwords'
    ]
];