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

// Ruta estática que retorna vista
Route::get('/', function () { return view('frontend.index');})->name('dashboard');

// Crud usuarios
Route::get('usuarios', 'Web\UsersController@index')->name('usuarios');
Route::get('editar-usuario/{id?}', 'Web\UsersController@editar')->name('editar.usuario');
Route::post('actualizar-usuario', 'Web\UsersController@actualizar')->name('actualizar.usuario');
Route::get('eliminar-usuario/{id}', 'Web\UsersController@eliminar')->name('eliminar.usuario');


// Generado por "php artisan make:auth" además genera las vistas (esta en la doc de laravel)
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');




// testing...
Route::get('/probando/{name?}', function ($name = 'nadie') {
    return "Hola: ".$name;
});
