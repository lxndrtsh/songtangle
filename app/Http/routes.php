<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController'
]);

Route::get('/me', 'UserController@index');
Route::get('/u/{alias}', 'ProfileController@index');

Route::group(['prefix'=>'api'], function()
{
	Route::resource('instruments', 'Api\InstrumentController',
		['only' => ['index', 'show']]);
	Route::resource('genres', 'Api\GenreController',
		['only' => ['index', 'show']]);
});