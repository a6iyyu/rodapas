<?php

use App\Models\Restoran;

return [
    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],
    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'restoran',
        ],
    ],
    'providers' => [
        'restoran' => [
            'driver' => 'eloquent',
            'model' => Restoran::class,
        ],
    ],
    'passwords' => [
        'restoran' => [
            'provider' => 'restoran',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
    ],
    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),
];