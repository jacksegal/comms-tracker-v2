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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

/* Auth routes - Auth::routes() */
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

/* Roles */
Route::get('/roles', 'RoleController@index')->middleware('permission:manageUsers');
Route::get('/role', 'RoleController@create')->middleware('permission:manageUsers');
Route::post('/role', 'RoleController@store')->middleware('permission:manageUsers');
Route::get('/role/{role}', 'RoleController@edit')->middleware('permission:manageUsers');
Route::post('/role/{role}', 'RoleController@update')->middleware('permission:manageUsers');

/* Users */
Route::get('/users', 'UserController@index')->middleware('permission:manageUsers');
Route::get('/user', 'UserController@create')->middleware('permission:manageUsers');
Route::post('/user', 'UserController@store')->middleware('permission:manageUsers');
Route::get('/user/{user}', 'UserController@edit')->middleware('permission:manageUsers');
Route::post('/user/{user}', 'UserController@update')->middleware('permission:manageUsers');


/* Socialite */
Route::get('login/google', 'Auth\LoginController@redirectToProvider');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');
