<?php

use Laravel\Fortify\Features;

return [

    'guard' => 'web',

    'passwords' => 'users',

    'username' => 'email',

    'email' => 'email',

    'lowercase_usernames' => true,

    'home' => '/dashboard',

    'prefix' => '',

    'domain' => null,

    'middleware' => ['web'],

    'limiters' => [
        'login' => 'login',
        /* @chisel-2fa */
        'two-factor' => 'two-factor',
        /* @end-chisel-2fa */
        /* @chisel-passkeys */
        'passkeys' => 'passkeys',
        /* @end-chisel-passkeys */
    ],

    'views' => true,

    /* @chisel-passkeys */
    'passkeys' => [
        'relying_party_id' => parse_url(config('app.url'), PHP_URL_HOST),
        'allowed_origins' => [config('app.url')],
        'user_handle_secret' => env('PASSKEYS_USER_HANDLE_SECRET', config('app.key')),
        'timeout' => 60000,
    ],
    /* @end-chisel-passkeys */

    'features' => [
        /* @chisel-registration */
        Features::registration(),
        /* @end-chisel-registration */
        Features::resetPasswords(),
        /* @chisel-email-verification */
        Features::emailVerification(),
        /* @end-chisel-email-verification */
        /* @chisel-2fa */
        Features::twoFactorAuthentication([
            'confirm' => true,
            'confirmPassword' => true,
        ]),
        /* @end-chisel-2fa */
        /* @chisel-passkeys */
        Features::passkeys([
            'confirmPassword' => true,
        ]),
        /* @end-chisel-passkeys */
    ],

];
