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

	Route::any('forgotten',['uses'=>'UserController@forgotten','as'=>'password.forgotten']);
	Route::resource('login', 'LoginController', ['only' => ['index', 'store', 'destroy']]);

	Route::group(['before'=>'Sentry'],function() {
		Route::resource('home', 'HomeController', ['only' => ['index']]);
		Route::resource('users', 'UserController', ['except' => 'show']);
		Route::resource('', 'HomeController', ['only' => ['index']]);
	});