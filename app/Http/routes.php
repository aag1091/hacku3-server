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

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('api/events', 'EventController@index');
Route::post('api/events/add', 'EventController@addEvent');
Route::get('api/events/list', 'EventController@listEvents');

Route::post('api/login', 'SessionController@login');
Route::post('api/logout', 'SessionController@logout');
