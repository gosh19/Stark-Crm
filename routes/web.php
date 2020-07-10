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

Route::get('/', 'PaginasController@index')->middleware('redirect');


Route::post('import', 'DatoController@import');
Route::get('export', 'DatoController@export');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin', 'AdminController@index')->name('Admin.index');
    Route::post('/user/store', 'UserController@store')->name('User.store');
    Route::get('/Datos/Admin', 'DatoController@index')->name('Dato.index');
    /**Excel routes */
});


Route::group(['middleware' => ['operario']], function () {
    Route::resource('Comentario', 'ComentarioController');
    Route::get('/operario', 'OperarioController@index')->name('Operario.index');

    Route::get('/operario-putCase/{Dato}/{case}', 'OperarioController@putCase')->name('Operario.putCase');
    Route::post('/operario-re-agendar', 'OperarioController@reAgendar')->name('Operario.reAgendar');
    /**Excel routes */
});
