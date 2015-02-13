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

Route::group(['namespace' => 'Api'], function()
{
        
  Route::get('api/events', 'EventController@index');
  Route::post('api/events/add', 'EventController@addEvent');
  Route::delete('api/events/remove/{id}', 'EventController@removeEvent');
  Route::get('api/events/list', 'EventController@listEvents');
  Route::post('api/events/join/{id}', 'EventController@joinEvent');
  Route::post('api/events/unjoin/{id}', 'EventController@unjoinEvent');

  Route::post('api/login', 'SessionController@login');
  Route::post('api/logout', 'SessionController@logout');

  Route::put('api/register', 'UserAccountController@register');
  Route::post('api/update', 'UserAccountController@update');
  Route::get('api/user/events', 'UserAccountController@events');

});

