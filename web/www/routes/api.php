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


Route::get('service-log/set/{id}/{status}','ApiController@setServiceLog');

Route::get('service/get/all','ApiController@getServicesAll');
Route::post('service/create','ApiController@setServices');
