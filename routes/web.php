<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'InicioController')->name('inicio');

Auth::routes(['verify' => true]);

// Almacena los likes de los establecimientos
Route::post('/establecimientos/{establecimiento}', 'LikesController@update')->name('likes.update');



Route::group(['middleware' => ['auth', 'verified']], function(){
    Route::get('establecimiento/create' , 'EstablecimientoController@create')->name('establecimeinto.create')->middleware('revisar');
    Route::post('establecimiento/store' , 'EstablecimientoController@store')->name('establecimeinto.store');
    Route::get('establecimiento/edit' , 'EstablecimientoController@edit')->name('establecimeinto.edit');
    Route::put('establecimiento/{establecimiento}' , 'EstablecimientoController@update')->name('establecimeinto.update');

    // Imagenes
    Route::post('/imagenes/store' , 'ImagenController@store')->name('imagen.store');
    Route::post('/imagenes/destroy' , 'ImagenController@destroy')->name('imagen.destroy');

    // Opiniones
    Route::get('comentario/create/{establecimiento}' , 'ComentarioController@create')->name('comentario.create');
    Route::get('comentario/store' , 'ComentarioController@store')->name('comentario.store');
});

