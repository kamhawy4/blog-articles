<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




// Route  dashboard login
Route::get('dashboard/login'    ,'Admin\LoginManagersController@index'); 
Route::post('dashboard/login'   ,'Admin\LoginManagersController@LoginManagers'); 
// Route group dashboard


Route::group(['namespace' => 'Admin', 'prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
    /*
     * These routes need view-backend permission
     * (good if you want to allow more than one group in the backend,
     * then limit the backend features by different roles or permissions)
     *
     * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
     * These routes can not be hit if the password is expired
     */
    include_route_files(__DIR__.'/backend/');
});





















// Route::group(['prefix'=>'dashboard'       ,'middleware'=>'admin:managers'],function(){
// 	Route::resource('/'         			,'Admin\DashboardController'); // Home Page
// 	Route::get('/logout'              	    ,'Admin\LoginManagersController@Logout'); // Home Page
// 	Route::resource('settings'  			,'Admin\SettingsController'); //  Settings 
// 	//////////////////////////// Route Category ////////////////////////////
// 	Route::resource('categorys'         	,'Admin\CategoriesController');
// 	Route::get('delete/categorys/{id}'  	,'Admin\CategoriesController@destroy');
// 	Route::post('delete/categorys'      	,'Admin\CategoriesController@deleteCategorys');
// 	//////////////////////////// Route Articals ////////////////////////////
// 	Route::resource('articles'              ,'Admin\ArticleController');
// 	Route::get('delete/articles/{id}'    	,'Admin\ArticleController@destroy');
// 	Route::post('delete/articles'        	,'Admin\ArticleController@DeleteArticle');
// 	Route::get('articles/comments/{id}'     ,'Admin\ArticleController@CommentsArticle');
// 	Route::get('comments/delete/{id}'       ,'Admin\ArticleController@DeleteComments');
// 	/////////////////////////// Route Managers //////////////////////////
// 	Route::resource('managers'              ,'Admin\ManagersController');
// 	Route::get('delete/managers/{id}'    	,'Admin\ManagersController@destroy');
// 	Route::post('delete/managers'        	,'Admin\ManagersController@DeleteMangaers');
// 	////////////////////////// Route Users ////////////////////////////// 
// 	Route::resource('users'                 ,'Admin\UsersController');
// 	Route::get('delete/users/{id}'    	    ,'Admin\UsersController@destroy');
// 	Route::post('delete/users'      	    ,'Admin\UsersController@DeleteUsers');
// });
/*
 * Route Front End
*/
// Route::get('/'                                  , 'Front\HomePageController@Welcome'); 
// Route::get('/logout'                            , 'HomeController@logout');
// Route::get('/categorie/{slug}'    				, 'Front\HomePageController@Categorie');
// Route::get('/article/{slug}'      				, 'Front\ArticlesController@Article');
// Route::get('/dashboard/comments' 				, 'Front\ArticlesController@Comments');
