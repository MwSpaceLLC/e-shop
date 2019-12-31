<?php
/**
 * e-shop - A PHP Package for Laravel Framework start (6.x)
 *
 * @package  eshop
 * @author   Aleksandr Ivanovitch <alex@mwspace.com>
 */

return [

    /*
    |--------------------------------------------------------------------------
    | e-shop prefix http://127.0.0.1:8000/e-shop
    |--------------------------------------------------------------------------
    |
    | you can use a different alphanumeric value of your choice to
    | protect the login route of your backend
    |
    */

    'prefix' => env('ESHOP_PREFIX', 'e-shop'),

    /*
    |--------------------------------------------------------------------------
    | e-shop disk default is public_html
    |--------------------------------------------------------------------------
    |
    | Your file system rescue disk. we left this configuration for the possibility
    | of saving Amazon Bucket or Google on a remote disk
    |
    */

    'disk' => env('ESHOP_DISK', 'eshop'),

    /*
    |--------------------------------------------------------------------------
    | e-shop paginator
    |--------------------------------------------------------------------------
    |
    */

    'paginate' => env('ESHOP_PAGINATE', 16),

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
