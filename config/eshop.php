<?php

return [

    /*
    |--------------------------------------------------------------------------
    | e-shop Domain
    |--------------------------------------------------------------------------
    |
    | This is the subdomain where e-shop will be accessible from. If the
    | setting is null, e-shop will reside under the same domain as the
    | application. Otherwise, this value will be used as the subdomain.
    |
    */

    'domain' => env('ESHOP_DOMAIN', null),

    /*
    |--------------------------------------------------------------------------
    | e-shop Path
    |--------------------------------------------------------------------------
    |
    | This is the URI path where e-shop will be accessible from. Feel free
    | to change this path to anything you like. Note that the URI will not
    | affect the paths of its internal API that aren't exposed to users.
    |
    */

    'path' => env('ESHOP_PATH', 'eshop'),

    /*
    |--------------------------------------------------------------------------
    | e-shop Storage Driver
    |--------------------------------------------------------------------------
    |
    | This configuration options determines the storage driver that will
    | be used to store e-shop's data. In addition, you may set any
    | custom options as needed by the particular driver you choose.
    |
    */

    'driver' => env('ESHOP_DRIVER', 'database'),

    'storage' => [
        'database' => [
            'connection' => env('DB_CONNECTION', 'mysql'),
            'chunk' => 1000,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | e-shop Master Switch
    |--------------------------------------------------------------------------
    |
    | This option may be used to disable all e-shop watchers regardless
    | of their individual configuration, which simply provides a single
    | and convenient way to enable or disable e-shop data storage.
    |
    */

    'enabled' => env('ESHOP_ENABLED', true),

    /*
    |--------------------------------------------------------------------------
    | e-shop Route Middleware
    |--------------------------------------------------------------------------
    |
    | These middleware will be assigned to every e-shop route, giving you
    | the chance to add your own middleware to this list or change any of
    | the existing middleware. Or, you can simply stick with this list.
    |
    */

    'middleware' => [
        'web',
        MwSpace\Eshop\Http\Middleware\EshopAuth::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | Of course, a great default configuration has been defined for you
    | here which uses session storage and the Eloquent user provider.
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | Supported: "session", "token"
    |
    */

    'guards' => [
        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ]

    ],


    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | If you have multiple user tables or models you may configure multiple
    | sources which represent each model / table. These sources may then
    | be assigned to any extra authentication guards you have defined.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [
        'admins' => [
            'driver' => 'eloquent',
            'model' => MwSpace\Eshop\Model\AdminEshop::class,
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Ignored Paths & Commands
    |--------------------------------------------------------------------------
    |
    | The following array lists the URI paths and Artisan commands that will
    | not be watched by e-shop. In addition to this list, some Laravel
    | commands, like migrations and queue commands, are always ignored.
    |
    */

    'ignore_paths' => [
        //
    ],

    'ignore_commands' => [
        //
    ],

    /*
    |--------------------------------------------------------------------------
    | e-shop Watchers
    |--------------------------------------------------------------------------
    |
    | The following array lists the "watchers" that will be registered with
    | e-shop. The watchers gather the application's profile data when
    | a request or task is executed. Feel free to customize this list.
    |
    */

    'watchers' => [

    ],
];
