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

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/', 'HomeController@index');
Route::get('teachers','TeacherController@index');
Route::get('/teachers/create','TeacherController@create');
Route::get('/import/master','ImportMasterTables@index');
Route::post('/teachers/store', [
	'uses' => 'TeacherController@store',
	'as' => 'storeTeacher'
	]);
