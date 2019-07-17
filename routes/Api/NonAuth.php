<?php


// Login
Route::group(['prefix' => 'user/','namespace' => 'Login','middleware' => 'api'], function () {
	// Route  Api group dashboard
	Route::post('login'   ,'LoginManagersController@LoginManagers'); 
});


?>