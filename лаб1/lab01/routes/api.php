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

Route::get('url', 'ApiController@index');
Route::get('url/{number}', 'ApiController@show');
Route::get('url/math/a={a}&b={b}&c={c}', 'ApiController@math');
Route::get('url/day/date={date}', 'ApiController@date');
