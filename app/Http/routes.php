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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin','Admin\AdminController@index');
Route::post('admin/signin','Admin\AdminController@postSignIn');
Route::get('admin/logout','Admin\AdminController@logout');

Route::get('admin/getRecover/{code}','Admin\AdminController@getRecover');
Route::post('admin/recover_password','Admin\AdminController@recover_password');

Route::group(['namespace' => 'Admin', 'middleware' => 'auth'], function ()
	{
		//for error pages
	    Route::get('admin/error','ErrorController@index');
	    Route::get('admin/error/show/{page}','ErrorController@show');

		Route::get('admin/dashboard','DashboardController@index');
		Route::controller('admin/general','GeneralController');
		
		Route::resource('admin/module','ModuleController');
		Route::resource('admin/role','RoleController');
		Route::resource('admin/user','UserController');

		
   });
