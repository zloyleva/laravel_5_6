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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/chat', 'MessagesController@index')->name('chat');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/messages', 'MessagesController@list')->name('messages');
    Route::post('/messages/store', 'MessagesController@store')->name('messages.store');
});

