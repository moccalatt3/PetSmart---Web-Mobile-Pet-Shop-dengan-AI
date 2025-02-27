<?php

return [


    'defaults' => [
        'guard' => env('AUTH_GUARD', 'pengguna'), // Set to 'pengguna' if it's your main guard
        'passwords' => env('AUTH_PASSWORD_BROKER', 'pengguna'), // Adjust the password broker accordingly
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'admin' => [
            'driver' => 'session',
            'provider' => 'admins', // Pastikan ini mengarah ke admins
        ],

        'pengguna' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\Pengguna::class, // Model pengguna
        ],

        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class, // Model admin
        ],
    ],


    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800), // 3 hours by default

];
