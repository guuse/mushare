<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/contact', 'PagesController@contact');
Route::get('/', 'PagesController@home');

Route::get('genres', 'songsController@index');
Route::get('genres/{id}', 'songsController@show');


Auth::routes();

Route::get('/home', 'HomeController@index');

