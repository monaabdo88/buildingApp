<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*route admin*/
Route::group(['middlewareGroups'=>['web','admin']],function(){
    #dataTable Ajax
    Route::get('/adminPanel/users/data',['as'=>'adminPanel.users.data','uses'=>'usersController@anyData']);
    Route::get('/adminPanel/bu/data',['as'=>'adminPanel.bu.data','uses'=>'BuController@anyData']);
    Route::get('/adminPanel/contact/data',['as'=>'adminPanel.contact.data','uses'=>'ContactController@anyData']);
    #main Admin
    Route::get('/adminPanel','AdminController@index');
    #users routes
    Route::resource('/adminPanel/users','UsersController');
    Route::get('/adminPanel/users/{id}/del','UsersController@destroy');
    #siteSettings
    Route::get('/adminPanel/siteSettings','SiteSettingController@index');
    Route::post('/adminPanel/siteSettings','SiteSettingController@store');
    #Building
    Route::resource('/adminPanel/bu','BuController',['except'=>['index','show']]);
    Route::get('/adminPanel/bu/{id}/del','BuController@destroy');
    Route::get('/adminPanel/bu/{id?}','BuController@index');
    #contact
    Route::resource('/adminPanel/contact','ContactController');
    Route::get('/adminPanel/contact/{id}/del','ContactController@destroy');
});
/*route user*/
//Route::group(['middleware' => 'web'],function(){
    Route::auth();
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/show_all','BuController@show_all_enable');
    Route::get('/forrent','BuController@for_rent');
    Route::get('/forbuy','BuController@for_buy');
    Route::get('/type/{type}','BuController@showByType');
    Route::get('/search','BuController@search');
    Route::get('/build/{id}','BuController@show_bu');
    Route::get('/ajax/getBuild','BuController@getAjaxInfo');
    Route::get('/contact','HomeController@contact');
    Route::get('/user/create/bu','BuController@userAddView');
    Route::post('/user/create/bu','BuController@userStore');
    Route::post('/contact','ContactController@store');
    Route::get('/home', 'HomeController@index');
    Route::get('/user/showBu/{bu_status}','BuController@showBu')->middleware('auth');
    Route::get('/user/editInfo','UsersController@editInfo')->middleware('auth');
    Route::patch('/user/editInfo',['as'=>'user.editInfo','uses'=>'UsersController@saveInfo'])->middleware('auth');
    Route::get('/user/editbu/{id}','BuController@editBu')->middleware('auth');
    Route::patch('/user/saveChanges/','BuController@saveChanges')->middleware('auth');
//});
