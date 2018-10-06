<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::middleware('auth')->group(function () {

    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/home', 'HomeController@index');

    //Route::get('/mensaje', 'MessageController@index')->name('mensajes');
    //Route::post('/mensaje', 'MessageController@store')->name('mensajes.store');

    Route::get('/jobs', 'RolesController@index')->name('jobs');

    Route::get('/roles', 'RolesController@index')->name('roles');

    Route::get('/users', 'UsersController@index')->name('users');

    Route::get('/consultancy', 'GeneralDirectionController@index')->name('consultancy');

    Route::get('/controlwork', 'GeneralDirectionController@index')->name('controlwork');

    Route::get('/build', 'GeneralDirectionController@index')->name('build');
    
    Route::get('/planificacion', 'PlananualController@index')->name('planificacion');
    
    Route::get('/presupuesto', 'PresupuestoController@index')->name('presupuesto');
    
    
    Route::get('/organizacion', 'PresupuestoController@index')->name('organizacion');
    
    Route::get('list', 'PlananualController@getList');
    
    Route::get('listSearch', 'PlananualController@getListsearch');
    
    Route::post('/import-metasFisicas', 'PlananualController@ExcelMetasFisicas');
    
    Route::post('/edit-metafisica', 'PlananualController@EditMetaFisica');
    
    Route::delete('/eliminar-metafisica/{id}', 'PlananualController@eliminarMetafisica');

    Route::get('/mensaje', 'MessageController@index')->name('mensaje');

    Route::get('/mensaje/crear', 'MessageController@create')->name('crear');

    Route::get('/mensaje/vreceived/{id}', 'MessageController@vreceived')->name('vreceived');

    Route::get('/mensaje/vsent/{id}', 'MessageController@vsent')->name('vsent');

    Route::get('/mensaje/sent', 'MessageController@sent')->name('enviados');

    Route::post('/mensaje/store', 'MessageController@store')->name('store');

    Route::get('/uploads/{file}', function ($file) {
        return \Storage::download("uploads/$file");
    })->name('download_file');

    //Módulos para subir archivos
    
    Route::get('/subir', 'FileController@create')->name('subir');
    Route::post('/subir', 'FileController@store')->name('subirarchivo');
    Route::get('archivos', 'FileController@index')->name('archivos');
    Route::get('/eliminar/archivo/{id}', 'FileController@destroy')->name('eliminararchivo');

    //Módulo para organización de archivos por Departamento
    

    Route::get('archivos/{dpto}', 'DepartamentoController@show')->name('departamento');
    Route::get('archivos/{dpto}/{slug}', 'DepartamentoController@archivos')->name('mostrararchivos');
    Route::get('mover/archivo/{id}/{slug}', 'DepartamentoController@asignar')->name('mostrararchivos');
});