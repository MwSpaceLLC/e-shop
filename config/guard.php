<?php
/**
 * e-shop - A PHP Package for Laravel Framework start (6.x)
 *
 * @package  eshop
 * @author   Aleksandr Ivanovitch <alex@mwspace.com>
 */

return [
    'eshop:admin' => [
        'driver' => 'session',
        'provider' => 'eshop:admins',
    ]
];
