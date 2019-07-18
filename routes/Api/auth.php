<?php

// All route names are prefixed with 'dashboard'.
Route::group(['middleware' => 'auth:api' ],function () {
     
    // Settings
    Route::group(['namespace' => 'Settings'], function () {
         Route::resource('settings','SettingsController'); //Settings 
    });

    // Categories
    Route::group(['namespace' => 'Categories'], function () {
         Route::resource('categories','CategoriesController'); //Settings 
    });

    // Logout
    Route::group(['namespace' => 'Login'], function () {
        Route::get('logout', 'AuthController@logout');
        Route::get('user'  , 'AuthController@user');
    });

});