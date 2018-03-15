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
Route::get('/roles', 'RoleController@index')->middleware('permission:manageCommunications');
Route::post('/roles', 'RoleController@store')->middleware('permission:manageCommunications');
Route::get('/roles/create', 'RoleController@create')->middleware('permission:manageCommunications');
Route::get('/roles/{role}', 'RoleController@show')->middleware('permission:manageCommunications');
Route::post('/roles/{role}', 'RoleController@update')->middleware('permission:manageCommunications');
Route::post('/roles/{role}/delete', 'RoleController@destroy')->middleware('permission:manageCommunications');
Route::get('/roles/{role}/edit', 'RoleController@edit')->middleware('permission:manageCommunications');

/* Users */
Route::get('/users', 'UserController@index')->middleware('permission:manageCommunications');
Route::post('/users', 'UserController@store')->middleware('permission:manageCommunications');
Route::get('/users/create', 'UserController@create')->middleware('permission:manageCommunications');
Route::get('/users/{user}', 'UserController@show')->middleware('permission:manageCommunications');
Route::post('/users/{user}', 'UserController@update')->middleware('permission:manageCommunications');
Route::post('/users/{user}/delete', 'UserController@destroy')->middleware('permission:manageCommunications');
Route::get('/users/{user}/edit', 'UserController@edit')->middleware('permission:manageCommunications');

/* Baskets */
Route::get('/baskets', 'BasketController@index')->middleware('permission:manageCommunications');
Route::post('/baskets', 'BasketController@store')->middleware('permission:manageCommunications');
Route::get('/baskets/create', 'BasketController@create')->middleware('permission:manageCommunications');
Route::get('/baskets/{basket}', 'BasketController@show')->middleware('permission:manageCommunications');
Route::post('/baskets/{basket}', 'BasketController@update')->middleware('permission:manageCommunications');
Route::post('/baskets/{basket}/delete', 'BasketController@destroy')->middleware('permission:manageCommunications');
Route::get('/baskets/{basket}/edit', 'BasketController@edit')->middleware('permission:manageCommunications');

/* Areas */
Route::get('/areas', 'AreaController@index')->middleware('permission:manageCommunications');
Route::post('/areas', 'AreaController@store')->middleware('permission:manageCommunications');
Route::get('/areas/create', 'AreaController@create')->middleware('permission:manageCommunications');
Route::get('/areas/{area}', 'AreaController@show')->middleware('permission:manageCommunications');
Route::post('/areas/{area}', 'AreaController@update')->middleware('permission:manageCommunications');
Route::post('/areas/{area}/delete', 'AreaController@destroy')->middleware('permission:manageCommunications');
Route::get('/areas/{area}/edit', 'AreaController@edit')->middleware('permission:manageCommunications');

/* Subareas */
Route::get('/subareas', 'SubAreaController@index')->middleware('permission:manageCommunications');
Route::post('/subareas', 'SubAreaController@store')->middleware('permission:manageCommunications');
Route::get('/subareas/create', 'SubAreaController@create')->middleware('permission:manageCommunications');
Route::get('/subareas/{subArea}', 'SubAreaController@show')->middleware('permission:manageCommunications');
Route::post('/subareas/{subArea}', 'SubAreaController@update')->middleware('permission:manageCommunications');
Route::post('/subareas/{subArea}/delete', 'SubAreaController@destroy')->middleware('permission:manageCommunications');
Route::get('/subareas/{subArea}/edit', 'SubAreaController@edit')->middleware('permission:manageCommunications');

/* Mediums */
Route::get('/mediums', 'MediumController@index')->middleware('permission:manageCommunications');
Route::post('/mediums', 'MediumController@store')->middleware('permission:manageCommunications');
Route::get('/mediums/create', 'MediumController@create')->middleware('permission:manageCommunications');
Route::get('/mediums/{medium}', 'MediumController@show')->middleware('permission:manageCommunications');
Route::post('/mediums/{medium}', 'MediumController@update')->middleware('permission:manageCommunications');
Route::post('/mediums/{medium}/delete', 'MediumController@destroy')->middleware('permission:manageCommunications');
Route::get('/mediums/{medium}/edit', 'MediumController@edit')->middleware('permission:manageCommunications');

/* Asks */
Route::get('/asks', 'AskController@index')->middleware('permission:manageCommunications');
Route::post('/asks', 'AskController@store')->middleware('permission:manageCommunications');
Route::get('/asks/create', 'AskController@create')->middleware('permission:manageCommunications');
Route::get('/asks/{ask}', 'AskController@show')->middleware('permission:manageCommunications');
Route::post('/asks/{ask}', 'AskController@update')->middleware('permission:manageCommunications');
Route::post('/asks/{ask}/delete', 'AskController@destroy')->middleware('permission:manageCommunications');
Route::get('/asks/{ask}/edit', 'AskController@edit')->middleware('permission:manageCommunications');

/* Audiences */
Route::get('/audiences', 'AudienceController@index')->middleware('permission:manageCommunications');
Route::post('/audiences', 'AudienceController@store')->middleware('permission:manageCommunications');
Route::get('/audiences/create', 'AudienceController@create')->middleware('permission:manageCommunications');
Route::get('/audiences/{audience}', 'AudienceController@show')->middleware('permission:manageCommunications');
Route::post('/audiences/{audience}', 'AudienceController@update')->middleware('permission:manageCommunications');
Route::post('/audiences/{audience}/delete', 'AudienceController@destroy')->middleware('permission:manageCommunications');
Route::get('/audiences/{audience}/edit', 'AudienceController@edit')->middleware('permission:manageCommunications');

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
