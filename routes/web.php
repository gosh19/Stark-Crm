<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PaginasController@index')->middleware('redirect');


Route::post('import', 'DatoController@import');
Route::get('export', 'DatoController@export');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin', 'AdminController@index')->name('Admin.index');
    Route::post('/user/store', 'UserController@store')->name('User.store');
    Route::get('/Datos/Admin', 'DatoController@index')->name('Dato.index');
    Route::get('/Datos/Usados/{case?}', 'DatoController@verUsados')->name('Dato.usados');

    Route::post('/Dato/{Dato}', 'DatoController@changeOp')->name('Dato.changeOP');
    Route::post('new-dato', 'DatoController@store')->name('Dato.newDato');
    
});


Route::group(['middleware' => ['operario']], function () {
    Route::resource('Comentario', 'ComentarioController');
    Route::get('/operario', 'OperarioController@index')->name('Operario.index');
    Route::get('/operario-agenda', 'OperarioController@agenda')->name('Operario.agenda');

    Route::get('/operario-putCase/{Dato}/{case}', 'OperarioController@putCase')->name('Operario.putCase');
    Route::post('/operario-re-agendar', 'OperarioController@reAgendar')->name('Operario.reAgendar');
});
