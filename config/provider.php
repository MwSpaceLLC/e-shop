<?php
/**
 * e-shop - A PHP Package for Laravel Framework start (6.x)
 *
 * @package  eshop
 * @author   Aleksandr Ivanovitch <alex@mwspace.com>
 */

return [
    'eshop:admins' => [
        'driver' => 'eloquent',
        'model' => MwSpace\Eshop\Model\AdminEshop::class,
    ]
];
