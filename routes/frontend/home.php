<?php 

    
    // language
    Route::get('locale/{locale}', function ($locale){
        Session::put('locale', $locale);
        return redirect()->back();
    });

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

      Route::group(['prefix' => 'tag/{slug}'], function () {
        Route::get('/','HomePageController@Tag');
      });

    });


?>