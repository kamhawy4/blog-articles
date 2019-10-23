<?php

// All route names are prefixed with 'dashboard'.
Route::group(['middleware' => 'admin:managers'  ],function () {

    // Dashboard
    Route::group(['namespace' => 'Dashboard'], function () {
        Route::resource('/'  ,'DashboardController'); // Dashboard 
    });
     
    // Settings
    Route::group(['namespace' => 'Settings'], function () {
         Route::resource('settings'  ,'SettingsController'); //Settings 
    });

    // roles
    Route::group(['namespace' => 'Role'], function () {
      Route::resource('roles','RoleController'); 
    });

    
    // log
    Route::group(['namespace' => 'Log'], function () {
         Route::get('log'  ,'LogController@GetAllLog'); //log
         Route::post('delete/log' , 'LogController@DeleteLog')->name('users.DeleteMuiltLog'); // Delete log
    });

    // Send mail
    Route::group(['namespace' => 'SendMail'], function () {
         Route::get('sendmail'   ,'SendMailController@index'); 
         Route::post('send/email', 'SendMailController@mail');
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


     // social Management
    Route::group(['namespace' => 'Social'], function () {
        Route::get('social'         , 'SocialController@index')->name('social.index');
        Route::get('social/create'  , 'SocialController@create')->name('social.create');
        Route::post('social'        , 'SocialController@store')->name('social.store');
        Route::post('delete/social' , 'SocialController@deleteSocial')->name('social.DeleteMuiltsocial');
        // Specific social
        Route::group(['prefix' => 'social/{social}'], function () {
            // social
            Route::get('/'             , 'SocialController@show')->name('social.show');
            Route::get('edit'          , 'SocialController@edit')->name('social.edit');
            Route::post('/'            , 'SocialController@update')->name('social.update');
            Route::delete('/'          , 'SocialController@destroy')->name('social.destroy');
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
            Route::post('/'            , 'CategoriesController@update')->name('categorys.update');
            Route::delete('/'          , 'CategoriesController@destroy')->name('categorys.destroy');
        });
    });


    // tags Management
    Route::group(['namespace' => 'Tags'], function () {
        Route::get('tags'         , 'TagsController@index')->name('tags.index');
        Route::get('tags/create'  , 'TagsController@create')->name('tags.create');
        Route::post('tags'        , 'TagsController@store')->name('tags.store');
        Route::post('delete/tags' , 'TagsController@deleteTgas')->name('tags.DeleteMuiltTags');
        // Specific tags
        Route::group(['prefix' => 'tags/{category}'], function () {
            // tags
            Route::get('/'             , 'TagsController@show')->name('tags.show');
            Route::get('edit'          , 'TagsController@edit')->name('tags.edit');
            Route::post('/'            , 'TagsController@update')->name('tags.update');
            Route::delete('/'          , 'TagsController@destroy')->name('tags.destroy');
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


    // Articles Managementdashboard
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

    // Articles Comments Management
    Route::group(['namespace' => 'Comments','prefix' => 'article/comments/{article_id}'], function () {
        // Articles
        Route::get('/'          ,'CommentsController@CommentsArticle')->name('Comments.CommentsArticle');
        Route::get('/delete'    ,'CommentsController@DeleteComments')->name('Comments.destroy');
    });


    // Logout
    Route::group(['namespace' => 'Login'], function () {
        Route::get('/logout','LoginManagersController@Logout'); //Logout
    });


});