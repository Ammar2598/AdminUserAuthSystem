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


Route::post('login', 'Api\ApiController@login');
Route::get('find/user/{id}','Api\ApiController@show');
    Route::post('insert/user','Api\ApiController@store');
    Route::put('update/user/{id}','Api\ApiController@update');

Route::group(['middleware' => 'auth.jwt'], function () {
    Route::get('logout', 'Api\ApiController@logout');

     //user CRUD


    Route::get('delete/user/{id}','Api\ApiController@destroy');

 
});