<?php


// Login
Route::group(['namespace' => 'Login'], function () {
	// Route  dashboard login
	Route::get('login'    ,'LoginManagersController@index'); 
	// Route group dashboard
	Route::post('login'   ,'LoginManagersController@LoginManagers'); 
});




?>