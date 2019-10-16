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

Route::post('/projects/create', 'ProjectController@create')->middleware('auth:api');

Route::get('/projects', 'ProjectController@loadAll')->middleware('auth:api');

Route::get('/projects/{id}', 'ProjectController@load')->middleware('auth:api');

Route::post('/login', 'Auth\ApiTokenController@login');
