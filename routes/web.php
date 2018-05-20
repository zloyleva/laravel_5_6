<?php

Route::get('/', function () {
        return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/open_letter', 'HomeController@openLetter')->name('open_letter');
