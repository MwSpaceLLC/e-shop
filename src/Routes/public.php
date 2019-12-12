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
Route::get('/login', 'EventController@login')->name('eshop-login');

Route::post('/login', 'EventController@postLogin')->name('eshop-post-login');

Route::get('/auth/{token}', 'EventController@auth')->name('eshop-auth-admin');
