<?php


// Login
Route::group(['prefix' => 'user/','namespace' => 'Login','middleware' => 'api'], function () {
	// Route  Api group dashboard
	Route::post('login'    , 'AuthController@login');
    Route::post('signup'   , 'AuthController@signup');
});


?>