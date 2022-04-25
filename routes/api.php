<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;

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
Route::post('login', 'Api\ApiController@login');
Route::post('register', 'Api\ApiController@register');
 
Route::group(['middleware' => 'auth.jwt'], function () {
    Route::get('logout', 'Api\ApiController@logout');
 
     //user CRUD


    Route::get('find/user','Api\ApiController@show');
    Route::post('insert/user','Api\ApiController@store');
    Route::put('update/user/{id}','Api\ApiController@update');
    Route::get('delete/user/{id}','Api\ApiController@destroy');

 
});