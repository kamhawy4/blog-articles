<?php

// All route names are prefixed with 'dashboard'.
Route::group(['middleware' => 'admin:managers'  ],function () {

    // Settings
    Route::group(['namespace' => 'Dashboard'], function () {
        Route::resource('/'  ,'DashboardController'); // Dashboard 
    });
     
    // Settings
    Route::group(['namespace' => 'Settings'], function () {
         Route::resource('settings'  ,'SettingsController'); //Settings 
    });
    

    // User Management
    Route::group(['namespace' => 'User'], function () {
        Route::get('users'         , 'UsersController@index')->name('users.index');
        Route::get('users/create'  , 'UsersController@create')->name('users.create');
        Route::post('users'        , 'UsersController@store')->name('users.store');
        Route::post('delete/users' , 'UsersController@DeleteUsers')->name('users.DeleteMuiltUser');
        // Specific User
        Route::group(['prefix' => 'users/{user}'], function () {
            // User
            Route::get('/'         , 'UsersController@show')->name('users.show');
            Route::get('edit'      , 'UsersController@edit')->name('users.edit');
            Route::patch('/'       , 'UsersController@update')->name('users.update');
            Route::DELETE('/'      , 'UsersController@destroy')->name('users.destroy');
        });
    });


    // categorys Management
    Route::group(['namespace' => 'Categories'], function () {
        Route::get('categorys'         , 'CategoriesController@index')->name('categorys.index');
        Route::get('categorys/create'  , 'CategoriesController@create')->name('categorys.create');
        Route::post('categorys'        , 'CategoriesController@store')->name('categorys.store');
        Route::post('delete/categorys' , 'CategoriesController@deleteCategorys')->name('categorys.DeleteMuiltCategorys');
        // Specific categorys
        Route::group(['prefix' => 'categorys/{category}'], function () {
            // categorys
            Route::get('/'             , 'CategoriesController@show')->name('categorys.show');
            Route::get('edit'          , 'CategoriesController@edit')->name('categorys.edit');
            Route::patch('/'           , 'CategoriesController@update')->name('categorys.update');
            Route::delete('/'          , 'CategoriesController@destroy')->name('categorys.destroy');
        });
    });



    // Managers Management
    Route::group(['namespace' => 'Managers'], function () {
        Route::get('managers'         , 'ManagersController@index')->name('managers.index');
        Route::get('managers/create'  , 'ManagersController@create')->name('managers.create');
        Route::post('managers'        , 'ManagersController@store')->name('managers.store');
        Route::post('delete/managers' , 'ManagersController@DeleteMangaers')->name('managers.DeleteMuiltMangaers');
        // Specific Managers
        Route::group(['prefix' => 'managers/{manager}'], function () {
            // Managers
            Route::get('/'           , 'ManagersController@show')->name('managers.show');
            Route::get('edit'        , 'ManagersController@edit')->name('managers.edit');
            Route::patch('/'         , 'ManagersController@update')->name('managers.update');
            Route::delete('/'        , 'ManagersController@destroy')->name('managers.destroy');
        });
    });


    // Articles Management
    Route::group(['namespace' => 'Articles'], function () {
        Route::get('articles'         , 'ArticleController@index')->name('articles.index');
        Route::get('articles/create'  , 'ArticleController@create')->name('articles.create');
        Route::post('articles'        , 'ArticleController@store')->name('articles.store');
        Route::post('delete/articles' , 'ArticleController@DeleteArticle')->name('articles.DeleteMuiltArticle');
        // Specific Articles
        Route::group(['prefix' => 'articles/{user}'], function () {
            // Articles
            Route::get('/'            , 'ArticleController@show')->name('articles.show');
            Route::get('edit'         , 'ArticleController@edit')->name('articles.edit');
            Route::patch('/'          , 'ArticleController@update')->name('articles.update');
            Route::delete('/'         , 'ArticleController@destroy')->name('articles.destroy');
        });
    });


    Route::get('/logout','LoginManagersController@Logout'); //Logout

});