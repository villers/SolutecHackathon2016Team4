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

    // Authenticated Routes
    Route::controller('authenticate', 'AuthenticateController');

    // Upload Routes
    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::post('upload', 'UploadController@upload');

        // CRUD Routes
        Route::resource('categories', 'CategoriesController');
        Route::resource('jobs', 'JobsController');
        Route::resource('notifications', 'NotificationsController');
        Route::resource('achievements', 'AchievementsController');
        Route::resource('users', 'UsersController');
        Route::post('users/achievements', 'UsersController@storeAchievement');
        Route::get('user/achievements', 'UsersController@getMe');

    });
});
