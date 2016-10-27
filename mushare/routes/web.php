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

Route::get('genres', [
    'uses'=>'songsController@index',
    'as'=>'genres',
    'middleware'=>'auth'
    ]);

Route::get('genres/{id}', 'songsController@show');

Route::post('genres/{id}/notes',
    [
        'uses'=>'songsController@addSong'
    ]);

Route::get('product/like/{id}',
    [
        'as' => 'product.like',
        'uses' => 'LikeController@likeProduct'
    ]);
Route::get('post/like/{id}',
    [
        'as' => 'post.like',
        'uses' => 'LikeController@likePost'
    ]);

Route::get('product/dislike/{id}',
    [
        'as' => 'product.dislike',
        'uses' => 'DislikeController@dislikeProduct'
    ]);
Route::get('post/dislike/{id}',
    [
        'as' => 'post.dislike',
        'uses' => 'DislikeController@dislikePost'
    ]);
Route::get('/songs/{song}/edit',
    [
        'uses' => 'songsController@editSong'
    ]);
Route::patch('/songs/{song}',
    [
        'uses' => 'songsController@update'
    ]);

Auth::routes();

Route::get('/home', 'HomeController@index');

