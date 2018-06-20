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

Route::get('/', 'CommunicationController@calendar')->name('home')->middleware('permission:manageCommunications');
Route::get('/home', 'CommunicationController@calendar')->name('home')->middleware('permission:manageCommunications');
Route::get('/communications/calendar', 'CommunicationController@calendar')->name('home')->middleware('permission:manageCommunications');

/* Auth routes - Auth::routes() */
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

/* Roles */
Route::get('/roles', 'RoleController@index')->middleware('permission:manageUsers');
Route::post('/roles', 'RoleController@store')->middleware('permission:manageUsers');
Route::get('/roles/create', 'RoleController@create')->middleware('permission:manageUsers');
Route::get('/roles/{role}', 'RoleController@show')->middleware('permission:manageUsers');
Route::post('/roles/{role}', 'RoleController@update')->middleware('permission:manageUsers');
Route::post('/roles/{role}/delete', 'RoleController@destroy')->middleware('permission:manageUsers');
Route::get('/roles/{role}/edit', 'RoleController@edit')->middleware('permission:manageUsers');

/* Users */
Route::get('/users', 'UserController@index')->middleware('permission:manageUsers');
Route::post('/users', 'UserController@store')->middleware('permission:manageUsers');
Route::get('/users/create', 'UserController@create')->middleware('permission:manageUsers');
Route::get('/users/{user}', 'UserController@show')->middleware('permission:manageUsers');
Route::post('/users/{user}', 'UserController@update')->middleware('permission:manageUsers');
Route::post('/users/{user}/delete', 'UserController@destroy')->middleware('permission:manageUsers');
Route::get('/users/{user}/edit', 'UserController@edit')->middleware('permission:manageUsers');

/* Baskets */
Route::get('/baskets', 'BasketController@index')->middleware('permission:manageModels');
Route::post('/baskets', 'BasketController@store')->middleware('permission:manageModels');
Route::get('/baskets/create', 'BasketController@create')->middleware('permission:manageModels');
Route::get('/baskets/{basket}', 'BasketController@show')->middleware('permission:manageModels');
Route::post('/baskets/{basket}', 'BasketController@update')->middleware('permission:manageModels');
Route::post('/baskets/{basket}/delete', 'BasketController@destroy')->middleware('permission:manageModels');
Route::get('/baskets/{basket}/edit', 'BasketController@edit')->middleware('permission:manageModels');

/* Areas */
Route::get('/areas', 'AreaController@index')->middleware('permission:manageModels');
Route::post('/areas', 'AreaController@store')->middleware('permission:manageModels');
Route::get('/areas/create', 'AreaController@create')->middleware('permission:manageModels');
Route::get('/areas/{area}', 'AreaController@show')->middleware('permission:manageModels');
Route::post('/areas/{area}', 'AreaController@update')->middleware('permission:manageModels');
Route::post('/areas/{area}/delete', 'AreaController@destroy')->middleware('permission:manageModels');
Route::get('/areas/{area}/edit', 'AreaController@edit')->middleware('permission:manageModels');

/* Subareas */
Route::get('/subareas', 'SubAreaController@index')->middleware('permission:manageModels');
Route::post('/subareas', 'SubAreaController@store')->middleware('permission:manageModels');
Route::get('/subareas/create', 'SubAreaController@create')->middleware('permission:manageModels');
Route::get('/subareas/{subArea}', 'SubAreaController@show')->middleware('permission:manageModels');
Route::post('/subareas/{subArea}', 'SubAreaController@update')->middleware('permission:manageModels');
Route::post('/subareas/{subArea}/delete', 'SubAreaController@destroy')->middleware('permission:manageModels');
Route::get('/subareas/{subArea}/edit', 'SubAreaController@edit')->middleware('permission:manageModels');

/* Mediums */
Route::get('/mediums', 'MediumController@index')->middleware('permission:manageModels');
Route::post('/mediums', 'MediumController@store')->middleware('permission:manageModels');
Route::get('/mediums/create', 'MediumController@create')->middleware('permission:manageModels');
Route::get('/mediums/{medium}', 'MediumController@show')->middleware('permission:manageModels');
Route::post('/mediums/{medium}', 'MediumController@update')->middleware('permission:manageModels');
Route::post('/mediums/{medium}/delete', 'MediumController@destroy')->middleware('permission:manageModels');
Route::get('/mediums/{medium}/edit', 'MediumController@edit')->middleware('permission:manageModels');

/* Asks */
Route::get('/asks', 'AskController@index')->middleware('permission:manageModels');
Route::post('/asks', 'AskController@store')->middleware('permission:manageModels');
Route::get('/asks/create', 'AskController@create')->middleware('permission:manageModels');
Route::get('/asks/{ask}', 'AskController@show')->middleware('permission:manageModels');
Route::post('/asks/{ask}', 'AskController@update')->middleware('permission:manageModels');
Route::post('/asks/{ask}/delete', 'AskController@destroy')->middleware('permission:manageModels');
Route::get('/asks/{ask}/edit', 'AskController@edit')->middleware('permission:manageModels');

/* Audiences */
Route::get('/audiences', 'AudienceController@index')->middleware('permission:manageModels');
Route::post('/audiences', 'AudienceController@store')->middleware('permission:manageModels');
Route::get('/audiences/create', 'AudienceController@create')->middleware('permission:manageModels');
Route::get('/audiences/{audience}', 'AudienceController@show')->middleware('permission:manageModels');
Route::post('/audiences/{audience}', 'AudienceController@update')->middleware('permission:manageModels');
Route::post('/audiences/{audience}/delete', 'AudienceController@destroy')->middleware('permission:manageModels');
Route::get('/audiences/{audience}/edit', 'AudienceController@edit')->middleware('permission:manageModels');

/* Communications */
Route::get('/communications', 'CommunicationController@index')->middleware('permission:manageCommunications');
Route::post('/communications', 'CommunicationController@store')->middleware('permission:manageCommunications');
Route::get('/communications/create', 'CommunicationController@create')->middleware('permission:manageCommunications');
Route::get('/communications/{communication}', 'CommunicationController@show')->middleware('permission:manageCommunications');
Route::post('/communications/{communication}', 'CommunicationController@update')->middleware('permission:manageCommunications');
Route::post('/communications/{communication}/delete', 'CommunicationController@destroy')->middleware('permission:manageCommunications');
Route::get('/communications/{communication}/edit', 'CommunicationController@edit')->middleware('permission:manageCommunications');
Route::get('/communications/{communication}/clone', 'CommunicationController@replicate')->middleware('permission:manageCommunications');


/* Socialite */
Route::get('login/google', 'Auth\LoginController@redirectToProvider');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');
