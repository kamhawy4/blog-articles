<?php


Route::group(['middleware' => ['api','localizationApp']  ],function () {

	// Login
	Route::group(['prefix' => 'user/','namespace' => 'Login'], function () {
		// Route  Api group dashboard
		Route::post('login'    , 'AuthController@login');
	    Route::post('signup'   , 'AuthController@signup');
	});

	// Lang
	Route::group(['namespace' => 'Lang'], function () {
	     Route::resource('lang','LangController'); //Lang 
	});

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

     // Categories
    Route::group(['namespace' => 'Categories'], function () {
         Route::resource('categories','CategoriesController'); //Categories 
    });

    // Tags
    Route::group(['namespace' => 'Tags'], function () {
         Route::resource('tags','TagsController'); //Tags 
    });
 
});



?>