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

Route::group(['middleware' => 'cors'], function () {
    // Country Routes
    Route::get('country', function () {
        return Response::json(App\Country::all(), 200, [], JSON_NUMERIC_CHECK);
    });

    // Auth Routes
    Route::controller('authenticate', 'AuthenticateController');

    // Upload Routes
    Route::post('upload', 'UploadController@upload');

    // CRUD Routes

    Route::resource('categories', 'CategoriesController');
    Route::resource('jobs', 'JobsController');
    Route::resource('notifications', 'NotificationsController');
    Route::resource('achievements', 'AchievementsController');
    Route::resource('users', 'UsersController');

});

