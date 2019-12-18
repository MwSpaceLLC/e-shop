<?php
/*
|--------------------------------------------------------------------------
| Filesystem Disks e-shop
|--------------------------------------------------------------------------
|
*/
return [
    'eshop' => [
        'driver' => 'local',
        'root' => public_path('vendor/eshop/drive'),
        'url' => env('APP_URL') . '/vendor/eshop',
        'visibility' => 'public',
    ]
];
