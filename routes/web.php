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


Route::get('/', function () {
    return view('welcome');
});

Route::resource('dashboard/login'       ,'Admin\LoginManagersController');
Route::post('dashboard/login'           ,'Admin\LoginManagersController@LoginManagers');

Route::group(['prefix'=>'dashboard'     ,'middleware'=>'admin:managers'],function(){

Route::resource('/'         			,'Admin\DashboardController');
Route::resource('managers'  			,'Admin\ManagersController'); 
Route::resource('settings'  			,'Admin\SettingsController'); 
////////////////////////////////////////////////////////////////////// Route Category
Route::resource('categorys'         	,'Admin\CategoriesController');
Route::get('delete/categorys/{id}'  	,'Admin\CategoriesController@destroy');
Route::post('delete/categorys'      	,'Admin\CategoriesController@deleteCategorys');
////////////////////////////////////////////////////////////////////// Route Tag
Route::resource('tag'              	    ,'Admin\TagController');
Route::get('delete/tag/{id}'  	        ,'Admin\TagController@destroy');
Route::post('delete/tag'      	        ,'Admin\TagController@deleteTag');
////////////////////////////////////////////////////////////////////// Route Tag
Route::resource('subscribe'             ,'Admin\SubscribeController');
Route::get('delete/subscribe/{id}'  	,'Admin\SubscribeController@destroy');
Route::post('delete/subscribe'      	,'Admin\SubscribeController@deleteSubscribe');
Route::get('email/subscribe'        	,'Admin\SubscribeController@MessageUsers');
////////////////////////////////////////////////////////////////////// Route Tag
Route::resource('contact/us'            ,'Admin\ContactUsController');
Route::get('delete/contact_us/{id}'  	,'Admin\ContactUsController@destroy');
Route::post('delete/contact/us'      	,'Admin\ContactUsController@DeleteContactUs');
////////////////////////////////////////////////////////////////////// Route Artical
Route::resource('articles'              ,'Admin\ArticleController');
Route::get('delete/articles/{id}'    	,'Admin\ArticleController@destroy');
Route::post('delete/articles'        	,'Admin\ArticleController@DeleteArticle');
Route::get('articles/comments/{id}'     ,'Admin\ArticleController@CommentsArticle');
Route::get('comments/delete/{id}'       ,'Admin\ArticleController@DeleteComments');
////////////////////////////////////////////////////////////////////// Route Managers
Route::resource('managers'              ,'Admin\ManagersController');
Route::get('delete/managers/{id}'    	,'Admin\ManagersController@destroy');
Route::post('delete/managers'        	,'Admin\ManagersController@DeleteMangaers');
////////////////////////////////////////////////////////////////////// Route Users
Route::resource('users'                 ,'Admin\UsersController');
Route::get('delete/users/{id}'    	    ,'Admin\UsersController@destroy');
Route::post('delete/users'      	    ,'Admin\UsersController@DeleteUsers');

//////////////////////////////////////////////////////////////////// Chat
Route::get('chat'    	                ,'Admin\ChatController@index');
});


Auth::routes();

Route::get('/'                                  , 'Front\HomePageController@Welcome');
Route::get('/home'                              , 'HomeController@index')->name('home');
Route::get('/logout'                            , 'HomeController@logout');
Route::get('/add/friend/{id_seen}/{id_send}'    , 'HomeController@AddFriend');
Route::get('/accept/friend/{id_seen}/{id_send}' , 'HomeController@AcceptFriend');
Route::get('/delete/friend/{id_seen}/{id_send}' , 'HomeController@DeleteFriend');
Route::get('/categorie/{slug}'    				, 'Front\HomePageController@Categorie');
Route::get('/article/{slug}'      				, 'Front\HomePageController@Article');
Route::get('/tags/{slug}'         				, 'Front\HomePageController@Tags');
Route::get('/search'              				, 'Front\HomePageController@Search');
Route::post('/subscribe/ajax'     				, 'Front\HomePageController@Subscribe');
Route::get('/dashboard/comments' 				, 'Front\HomePageController@Comments');
