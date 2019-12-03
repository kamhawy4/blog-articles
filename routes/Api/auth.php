<?php

// All route names are prefixed with 'dashboard'.
Route::group(['middleware' => 'auth:api' ],function () {

    // Comments Article
    Route::group(['prefix' => '/article/comments/','namespace' => 'Comments'], function () {
         Route::post('/store'      ,'CommentsController@StoreComments'); // store Comments 
         Route::post('/update/{id}','CommentsController@UpdateComments'); // update Comments 
         Route::get('/show/{id}'   ,'CommentsController@ShowComments'); // store Comments 
         Route::get('/delete/{id}' ,'CommentsController@DeleteComments'); // Delete Comments 
    });

    // Logout
    Route::group(['namespace' => 'Login'], function () {
        Route::get('logout', 'AuthController@logout');
        Route::get('user'  , 'AuthController@user');
    });

});