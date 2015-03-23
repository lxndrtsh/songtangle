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
Route::get('/home', 'WelcomeController@redirect');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController'
]);

Route::get('/me', 'UserController@index');
Route::get('/u/{alias}', 'ProfileController@show');

Route::group(['prefix'=>'profile'], function()
{
    Route::post('/address', 'PostRequests\SettingsController@updateAddress');
    Route::post('/basics', 'PostRequests\SettingsController@updateBasics');
    Route::post('/settings', 'PostRequests\SettingsController@updateSettings');
    Route::post('/instruments', 'PostRequests\UserMusicController@updateInstruments');
    Route::post('/genres','PostRequests\UserMusicController@updateGenres');
});

Route::group(['prefix'=>'api'], function()
{
	Route::resource('instruments', 'Api\InstrumentController',
		['only' => ['index', 'show']]);
	Route::resource('genres', 'Api\GenreController',
		['only' => ['index', 'show']]);
    Route::resource('postings', 'Api\PostingController',
        ['only' => ['index', 'store', 'show', 'update', 'destroy']]);
});