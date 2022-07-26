<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

#Autenticação
Route::post('/login', 'App\Http\Controllers\Api\LoginController@login');
Route::post('/cadastro', 'App\Http\Controllers\Api\LoginController@cadastro');

Route::group(['middleware' => ['jwt.auth']], function () {
    Route::post('/establishment', 'App\Http\Controllers\Api\EstablishmentController@postEstablishment');
    Route::get('/establishments/{id_user}', 'App\Http\Controllers\Api\EstablishmentController@getEstablishments');

    Route::get('/styles', 'App\Http\Controllers\Api\StyleController@getStyles');
});