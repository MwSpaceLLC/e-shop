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

Route::get('/{page?}', 'BackendController@index')->name('eshop-backend');

Route::get('/model/{model}', 'BackendController@models')->name('eshop-models');

Route::get('/model/insert/{model}', 'BackendController@insertModel')->name('eshop-model-insert');

Route::get('/model/update/{model}/{parent}', 'BackendController@updateModel')->name('eshop-update-model');

Route::get('/model/insert/{model}/{parent}', 'BackendController@insertModelParent')->name('eshop-model-insert-parent');

Route::get('/model/{model}/{parent}', 'BackendController@parentModels')->name('eshop-parent-models');

Route::post('/model/post/{model}/{current?}', 'BackendController@postModel')->name('eshop-post-model');

Route::get('/model/delete/{model}/{id}', 'BackendController@deleteModel')->name('eshop-delete-model');

Route::get('/model/remove/image/{model}/{current}', 'BackendController@removeImageModel')->name('eshop-remove-image-model');


/*
| e-shop Option & Config
|-------------------------------------------------------------------------- */
Route::get('/options/toggle/{name}', 'BackendController@toggleOption')->name('eshop-options-toggle');

Route::post('/config/update', 'BackendController@configUpdate')->name('eshop-config-update');




Route::get('/logout', 'BackendController@logout')->name('eshop-logout');
