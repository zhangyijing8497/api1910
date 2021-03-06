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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/info','Api\TestController@info');
Route::get('/test/receive','Api\TestController@receive');
Route::any('/test/receive-post','Api\TestController@receivePost');
Route::any('/test/decrypt1','Api\TestController@decrypt1');
Route::any('/rsa/decrypt1','Api\TestController@rsaDecrypt1');
Route::any('/rsa/get-a','Api\TestController@getA');
Route::any('/rsa/verify1','Api\TestController@verify1');
