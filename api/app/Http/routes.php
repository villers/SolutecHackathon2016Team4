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

Route::get('/', function () {
});


Route::group(['middleware' => 'cors'], function()
{

    // Login Routes

    Route::resource('authenticate', 'AuthenticateController');
    Route::post('authenticate', 'AuthenticateController@authenticate');




    // Register & validate Routes

    Route::post('register', 'RegisterController@register');
    Route::get('active_account/{token}', 'RegisterController@active_account');


    // CRUD Routes

    Route::resource('categories', 'CategoriesController');
    Route::resource('jobs', 'JobsController');
    Route::resource('notifications', 'NotificationsController');
    Route::resource('achievements', 'AchievementsController');
    Route::resource('users', 'UsersController');


});

