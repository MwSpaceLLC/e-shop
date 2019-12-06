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
Route::post('/login', 'EventController@login')->name('eshop-login');

Route::get('/{view?}', 'EventController@index')->where('view', '(.*)')->name('v-eshop');

Route::post('/model/{model}', 'EventController@insert')->name('eshop-insert');

Route::post('/logout', 'EventController@logout')->name('eshop-logout');
