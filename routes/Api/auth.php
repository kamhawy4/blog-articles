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
         // Specific Articles
        Route::group(['prefix' => 'articles/{id}'], function () {
            Route::get('/'            , 'ArticleController@ArticleById'); // Article by id
        });
        Route::group(['prefix' => 'articles/categroy/{id}'], function () {
            Route::get('/'            , 'ArticleController@ArticlesByCategroy'); // Articles by Categroy
        });
        Route::group(['prefix' => 'articles/tag/{id}'], function () {
            Route::get('/'            , 'ArticleController@ArticlesByTag'); // Articles by Tag
        });
    });

    // Comments Article
    Route::group(['prefix' => '/article/comments/','namespace' => 'Comments'], function () {
         Route::post('/store'      ,'CommentsController@StoreComments'); // store Comments 
         Route::post('/update/{id}','CommentsController@UpdateComments'); // update Comments 
         Route::get('/show/{id}'   ,'CommentsController@ShowComments'); // store Comments 
         Route::get('/delete/{id}' ,'CommentsController@DeleteComments'); // Delete Comments 
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