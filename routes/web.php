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

Route::get('users/account_email', 'UserController@account_email')->middleware('auth')->name('users.account_email');

Route::get('users/account_edit', 'UserController@account_edit')->middleware('auth')->name('users.account_edit');

Route::get('users/account_delete', 'UserController@account_delete')->middleware('auth')->name('users.account_delete');


Route::get('/', function () {
    return view('welcome');
});

Route::patch('users/{user}/confirm', 'UserController@confirm')->middleware('auth')->name('users.confirm');
Route::resource('/', 'UserController')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('posts', 'PostController')->middleware('auth');

Route::resource('users', 'UserController')->middleware('auth')->except('index');

Route::resource('pets', 'PetController')->middleware('auth');

Route::resource('comments', 'CommentController')->middleware('auth');

Route::resource('groups', 'GroupController');
