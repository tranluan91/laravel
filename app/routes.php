<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@showWelcome');
Route::resource('admin', 'AdminController');
Route::get('/login', 'AdminController@getLogin');
Route::post('/signin', 'AdminController@postSignin');
Route::get('/dashboard', 'AdminController@getDashboard');
Route::get('/logout', 'AdminController@getLogout');
Route::get('/register', 'AdminController@getRegister');