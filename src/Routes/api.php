<?php
/**
 * e-shop - A PHP Package for Laravel Framework start (6.x)
 *
 * @package  eshop
 * @author   Aleksandr Ivanovitch <alex@mwspace.com>
 */

use Illuminate\Support\Facades\DB;

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

Route::post('/new/user', 'Api\GlobalController@newUser')->name('eshop-api-user');


Route::post('/new/product/cart', 'Api\GlobalController@newProductCart')->name('eshop-api-cart');

Route::get('/delete/product/cart/{id}', 'Api\GlobalController@deleteProductCart')->name('eshop-api-cart');

Route::get('/delete/cart', 'Api\GlobalController@deleteCart')->name('eshop-api-cart');


Route::get('/cart/express/checkout', 'Api\GlobalController@expressCheckout')->name('eshop-api-payment');

Route::get('/cart/express/product/{id}/checkout', 'Api\GlobalController@expressProductCheckout')->name('eshop-api-payment');


/* Routes api with public access but not in list
|--------------------------------------------------------------------------*/
Route::get('/cart/express/checkout/success', 'Api\GlobalController@checkoutSuccess')->name('eshop-stripe-success');

Route::get('/cart/express/checkout/cancel', 'Api\GlobalController@checkoutCancel')->name('eshop-stripe-cancel');


Route::get('/maintenance', 'Api\GlobalController@maintenance')->name('eshop-maintenance');
