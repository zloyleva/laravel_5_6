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

Route::get('articles', 'ArticlesController@index');
Route::post('article', 'ArticlesController@store');
Route::put('article', 'ArticlesController@store');
Route::get('article/{id}', 'ArticlesController@show')->where('id', '[0-9]+');
Route::delete('article/{id}', 'ArticlesController@delete')->where('id', '[0-9]+');