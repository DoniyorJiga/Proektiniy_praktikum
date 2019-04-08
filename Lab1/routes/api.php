<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('equations', 'APIController@equations');
Route::get('days', 'APIController@days');
Route::get('regions/{number}', 'APIController@regions');
Route::get('numbers/{number}', 'APIController@numbers');
Route::get('maths/{index}', 'APIController@maths');