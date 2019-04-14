<?php 

    //Articles
    Route::group(['namespace' => 'Articles'], function () {
       Route::get('/dashboard/comments','ArticlesController@Comments');
	       Route::group(['prefix' => 'article/{slug}'], function () {
		     Route::get('/'    ,'ArticlesController@Article');
	       });
    });

     //HomePage
    Route::group(['namespace' => 'Home'], function () {
      Route::get('/' ,'HomePageController@Welcome'); 
		Route::group(['prefix' => 'categorie/{slug}'], function () {
		  Route::get('/','HomePageController@Categorie');
		});
    });


?>