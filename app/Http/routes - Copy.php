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

Route::group(array('prefix' => 'admin', 'middleware' => 'csrf'), function(){
	Route::post('categories/create', 'CategoriesController@postCreate');
});

Route::get('admin/categories', 'CategoriesController@index');

Route::get('admin/categories/index', 'CategoriesController@index');

Route::group(array('prefix' => 'admin', 'middleware' => 'csrf'), function(){
	Route::post('categories/delete', array('uses' => 'CategoriesController@postDestroy', 'as' => 'admin.categories.delete'));	
});

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController'
]);
