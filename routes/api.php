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

// Rutas que no requieren auth por ejemplo lista de productos, categorias, etc
Route::post('register', 'Api\AuthController@register');
Route::get('test', 'Api\AuthController@test');
Route::post('actividad', 'Api\ActividadController@save');

// Rutas que si requieren auth
Route::group(['middleware' => 'auth:api'], function(){
    Route::post('testOauth', 'Api\AuthController@testOauth');
    Route::get('actividad', 'Api\ActividadController@listar');
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
