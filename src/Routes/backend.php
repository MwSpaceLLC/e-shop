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
| e-shop Routes | User needs to be authenticated to enter here.
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "eshop-auth" middleware group. Now create something great!
|
*/

Route::get('/', 'BackendController@index')->name('eshop-backend');

Route::get('/model/{model}', 'BackendController@models')->name('eshop-models');

Route::get('/model/insert/{model}', 'BackendController@insertModel')->name('eshop-model-insert');

Route::get('/model/{model}/{parent}', 'BackendController@parentModels')->name('eshop-parent-models');

Route::get('/model/delete/{model}/{id}', 'BackendController@deleteModel')->name('eshop-delete-model');

Route::post('/model/post/{model}', 'BackendController@postModel')->name('eshop-post-model');

Route::get('/logout', 'BackendController@logout')->name('eshop-logout');
