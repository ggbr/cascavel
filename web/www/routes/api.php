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



// Routes of services
Route::get('service-log/set/{id}/{status}','ApiController@setServiceLog');
Route::get('service/get/all','ApiController@getServicesAll');
Route::post('service/create','ApiController@setServices');
Route::get('service/delete/{id}','ApiController@delServices');

// Routes of Serve
Route::get('serve/get/all','ApiController@getAllServe');
Route::post('serve/create','ApiController@setServe');
Route::get('serve/delete/{id}','ApiController@delServe');

