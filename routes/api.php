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
Route::post('login', 'Api\UserController@login');
Route::post('register', 'Api\UserController@register');
Route::group(['middleware' => 'auth.jwt'], function () {
  Route::get('logout', 'Api\UserController@logout');
  Route::apiResource('providers', 'API\ProviderController');
  Route::apiResource('setup', 'API\SetupController');
  Route::apiResource('device', 'API\DeviceController');
  Route::get('current', 'Api\ReadingController@current');
  Route::get('daily', 'Api\ReadingController@daily');
  Route::get('monthly', 'Api\ReadingController@monthly');
});