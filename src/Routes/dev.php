<?php
/**
 * e-shop - A PHP Package for Laravel Framework start (6.x)
 *
 * @package  eshop
 * @author   Aleksandr Ivanovitch <alex@mwspace.com>
 */

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| eshop Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "eshop" middleware group. Now create something great!
|
*/

Route::get('new/product/{loop?}', function ($loop = 0) {

    if ($loop > 5000)
        throw new \MwSpace\Eshop\Model\EshopException('U are creasy =)');

    for ($i = 0; $i < $loop; $i++)
        eshop()->product()->create([
            'payload' => json_encode([
                'name' => Str::random(16),
                'price' => rand(165, 954) . ',' . rand(1, 9),
                'info' => Str::random(32),
                'description' => Str::random(64)
            ])
        ]);

    $product = eshop()->product()->count();

    echo "Count Enumerate Record: $product";

});

Route::get('delete/product', function () {

    $product = eshop()->product()->count();

    echo "Count Truncate Record: $product";

    dd(eshop()->product()->truncate());
});

Route::get('mailable', function () {
    return new MwSpace\Eshop\Mail\AdminLogin('app@mwspace.com');
});
