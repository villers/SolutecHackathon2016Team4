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

    // Country list
    Route::get('country', function () {
        return Response::json(App\Country::all(), 200, [], JSON_NUMERIC_CHECK);
    });

    // Login Routes
<<<<<<< Updated upstream
    Route::controller('authenticate', 'AuthenticateController');
=======

    Route::resource('authenticate', 'AuthenticateController');
    Route::post('authenticate', 'AuthenticateController@authenticate');
    Route::post('upload', 'UploadController@upload');

    // Register & validate Routes

    Route::post('register', 'RegisterController@register');
    Route::get('active_account/{token}', 'RegisterController@active_account');
>>>>>>> Stashed changes

    // CRUD Routes
    Route::resource('categories', 'CategoriesController');
    Route::resource('jobs', 'JobsController');
    Route::resource('notifications', 'NotificationsController');
    Route::resource('achievements', 'AchievementsController');
    Route::resource('users', 'UsersController');
});
