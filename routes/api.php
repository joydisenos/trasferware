<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('roles')->group(function () {

    Route::get('list', 'RolesController@getList');

    Route::get('/permission/{id}', 'RolesController@getPermission');

});
Route::resource('/roles', 'RolesController');


// RUTAS DE USUARIOS
Route::prefix('users')->group(function () {

    Route::get('list', 'UsersController@getList');

});
Route::resource('/users', 'UsersController');