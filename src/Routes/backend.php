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

Route::post('/model/insert/{model}', 'Backend\Model\InsertController')->name('eshop-model-insert');

Route::get('/category/{id}', 'Backend\Model\Category\ViewController')->name('eshop-view-model');

Route::get('/model/delete/{model}/{id}', 'Backend\Model\DeleteController')->name('eshop-delete-model');

/*
| e-shop Option & Config
|-------------------------------------------------------------------------- */
Route::get('/options/toggle/{name}', 'Backend\Option\UpdateController')->name('eshop-options-toggle');

Route::post('/config/update', 'Backend\Config\UpdateController')->name('eshop-config-update');


Route::get('/event/logout', 'Event\AdminLogoutController')->name('eshop-logout');
