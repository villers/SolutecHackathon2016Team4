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


Route::group(['prefix' => 'api'], function()
{
    Route::resource('authenticate', 'AuthenticateController');
    Route::post('authenticate', 'AuthenticateController@authenticate');
});

Route::resource('categories', 'CategoriesController');

Route::resource('jobs', 'JobsController');

Route::resource('notifications', 'NotificationsController');

Route::resource('achievements', 'AchievementsController');
