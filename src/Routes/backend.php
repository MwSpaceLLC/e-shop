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

Route::get('/{page?}', 'Backend\Page\ViewController')->name('eshop-backend');

Route::get('/endpoint/{page?}', 'Backend\GlobalController@indexApi')->name('eshop-backend-api');

Route::get('/endpoint/static/{page?}', 'Backend\GlobalController@indexApiStatic')->name('eshop-backend-api-static');

Route::get('/model/{model}', 'Backend\GlobalController@models')->name('eshop-models');

Route::get('/model/insert/{model}', 'Backend\GlobalController@insertModel')->name('eshop-model-insert');

Route::get('/model/update/{model}/{parent}', 'Backend\GlobalController@updateModel')->name('eshop-update-model');

Route::post('/model/update/position/{model}', 'Backend\GlobalController@updatePositionModel')->name('eshop-update-position-model');

Route::get('/model/info/{model}/{parent}', 'Backend\GlobalController@infoModel')->name('eshop-info-model');

Route::get('/model/insert/{model}/{parent}', 'Backend\GlobalController@insertModelParent')->name('eshop-model-insert-parent');

Route::get('/model/{model}/{parent}', 'Backend\GlobalController@parentModels')->name('eshop-parent-models');

Route::post('/model/post/{model}/{current?}', 'Backend\GlobalController@postModel')->name('eshop-post-model');

Route::get('/model/delete/{model}/{id}', 'Backend\GlobalController@deleteModel')->name('eshop-delete-model');

Route::get('/model/remove/image/{model}/{current}', 'Backend\GlobalController@removeImageModel')->name('eshop-remove-image-model');


/*
| e-shop Option & Config
|-------------------------------------------------------------------------- */
Route::get('/options/toggle/{name}', 'Backend\Option\UpdateController')->name('eshop-options-toggle');

Route::post('/config/update', 'Backend\Config\UpdateController')->name('eshop-config-update');


Route::get('/event/logout', 'Event\AdminLogoutController')->name('eshop-logout');
