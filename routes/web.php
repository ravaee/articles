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

Auth::routes();

Route::get('/','ArticleController@index')->name('home');

//article

Route::middleware('auth')->get('/article/like', 'ArticleController@like');
Route::middleware('auth')->get('/article/create','ArticleController@create');
Route::middleware('auth')->post('/article','ArticleController@store')->name('article.store');
Route::get('/article/{article}','ArticleController@show')->name('article.show');

//comment

Route::middleware('auth')->post('/article/{article}/comment','CommentController@store')->name('comment.store');
Route::middleware('auth')->post('/comment/{comment}/comment','CommentController@addAnswer')->name('comment.addAnswer');

//album

Route::middleware('auth')->post('/album/store', 'AlbumController@store');
Route::middleware('auth')->get('/album/read', 'AlbumController@read');
Route::middleware('auth')->get('/album/delete', 'AlbumController@delete');

//picture

Route::middleware('auth')->post('/picture/store', 'PictureController@store');
Route::middleware('auth')->get('/picture/read', 'PictureController@read');
Route::middleware('auth')->get('/picture/delete', 'PictureController@delete');

//user routes

Route::middleware('auth')->get('/profile/edit', 'UserController@edit')->name('user.edit');
Route::get('/@{username}', 'UserController@show')->name('user.show');
Route::middleware('auth')->post('/profile/edit/user','UserController@edit_basic_information')->name('user.profile.edit');
Route::middleware('auth')->post('/profile/edit/usersec','UserController@edit_secondary_information')->name('user.profile.edit.secondary');
Route::middleware('auth')->post('/profile/edit/userset','UserController@edit_setting_information')->name('user.profile.edit.setting');


// edit_basic_information



