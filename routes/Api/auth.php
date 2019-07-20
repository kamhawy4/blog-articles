<?php

// All route names are prefixed with 'dashboard'.
Route::group(['middleware' => 'auth:api' ],function () {
     
    // Settings
    Route::group(['namespace' => 'Settings'], function () {
         Route::resource('settings','SettingsController'); //Settings 
    });

    // Social
    Route::group(['namespace' => 'Social'], function () {
         Route::resource('social','SocialController'); //Social 
    });

    // Articles
    Route::group(['namespace' => 'Articles'], function () {
         Route::get('articles','ArticleController@index'); //Articles 
         Route::get('recent/artical','ArticleController@RecentArtical'); //Recent Artical 
    });

    // Categories
    Route::group(['namespace' => 'Categories'], function () {
         Route::resource('categories','CategoriesController'); //Categories 
    });

    // Tags
    Route::group(['namespace' => 'Tags'], function () {
         Route::resource('tags','TagsController'); //Tags 
    });


    // Logout
    Route::group(['namespace' => 'Login'], function () {
        Route::get('logout', 'AuthController@logout');
        Route::get('user'  , 'AuthController@user');
    });

});