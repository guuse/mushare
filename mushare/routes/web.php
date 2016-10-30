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
    'middleware'=>'auth',
    ]);

Route::get('genres/{genre}', [
    'uses'=>'songsController@show',
    ]);

Route::post('genres/{id}/notes', [
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
Route::get('/{song}/edit',
    [
        'as' => 'edit',
        'uses' => 'songsController@editSong'
    ]);
Route::patch('/songs/{song}',
    [
        'uses' => 'songsController@update'
    ]);
Route::get('/{user}/mysongs',
    [
        'as' => 'profile',
        'uses' => 'songsController@mySongs'
    ]);
Auth::routes();

Route::get('/admin',
    [
        'as' => 'admin',
        'uses' => 'adminController@admin',
        'middleware' => 'admin'
    ]);

Route::post('/admin/addgenre', [
    'uses'=>'adminController@addGenre',
    'middleware' => 'admin'

]);

Route::get('/admin/{genre}/edit',[
    'uses' => 'adminController@editGenre',
    'middleware' => 'admin'
]);

Route::patch('/admin/{genre}', [
    'uses' => 'adminController@update',
    'middleware' => 'admin'
    ]);

Route::get('/admin/{genre}/delete',[
    'uses' => 'adminController@delete',
    'middleware' => 'admin'
]);

Route::delete('/admin/{genre}/delete',
    [
        'uses' => 'adminController@deleteGenre',
        'middleware' => 'admin'
    ]);

Route::get('/admin/user/{user}/edit',[
    'uses' => 'adminController@editUser',
    'middleware' => 'admin'
]);

Route::patch('/admin/user/{user}',
    [
        'uses' => 'adminController@updateUser',
        'middleware' => 'admin'
    ]);

Route::get('/admin/search',[
    'uses' => 'adminController@search',
    'middleware' => 'admin'
]);

Route::get('/home', 'HomeController@index');
