<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => 'admin',
        'passwords' => 'admins',
    ],

    'guards' => [
        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],
        'commercial' => [
            'driver' => 'jwt',
            'provider' => 'commercials',
        ],
        'client' => [
            'driver' => 'jwt',
            'provider' => 'clients',
        ],
    ],


    'providers' => [
        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class,
        ],
        'commercials' => [
            'driver' => 'eloquent',
            'model' => App\Models\Commercial::class,
        ],
        'clients' => [
            'driver' => 'eloquent',
            'model' => App\Models\Client::class,
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],


    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],


    'password_timeout' => 10800,

];
