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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/selclients', 'ClientsController@all');
Route::get('/selclients/{id}', 'ClientsController@one');
Route::post('/addclients', 'ClientsController@store');
Route::put('/updclients/{id}', 'ClientsController@change');
Route::delete('/delclients/{id}', 'ClientsController@delete');

Route::get('/selservices', 'ServicesController@all');
Route::get('/selservices/{id}', 'ServicesController@one');
Route::post('/addservices', 'ServicesController@store');
Route::put('/updservices/{id}', 'ServicesController@change');
Route::delete('/delservices/{id}', 'ServicesController@delete');

Route::get('/selorders', 'OrdersController@all');
Route::get('/selorders/{id}', 'OrdersController@one');
Route::post('/addorders', 'OrdersController@store');
Route::put('/updorders/{id}', 'OrdersController@change');
Route::delete('/delorders/{id}', 'OrdersController@delete');
