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


//Route entries for School Class CRUD
Route::get('school-classes', 'SchoolClassController@index');
Route::get('school-classes/create', 'SchoolClassController@create');
Route::post('/school-classes/store', [
	'uses' => 'SchoolClassController@store',
	'as' => 'storeSchoolClass'
	]);
Route::get('school-classes/{id}', 'SchoolClassController@show');
Route::get('school-classes/{id}/edit', 'SchoolClassController@edit');
Route::patch('school-classes/{id}', 'SchoolClassController@update');
Route::delete('school-classes/{id}', 'SchoolClassController@destroy');

Route::post('/teachers/store', [
	'uses' => 'TeacherController@store',
	'as' => 'storeTeacher'
	]);
Route::get('/teachers/{id}/edit', [
	'uses' => 'TeacherController@edit',
	'as' => 'editTeacher'
	]);
Route::get('/teachers', 'TeacherController@index');
Route::patch('/teachers/{id}/update', [
	'uses'=>'TeacherController@update',
	'as' => 'updateTeacher'
]);
Route::get('/teachers/{id}/view', 'TeacherController@view');

Route::get('/roles/','RoleController@index');
Route::get('/roles/{id}/edit','RoleController@edit');
Route::patch('/roles/{id}/update','RoleController@update');
Route::delete('/roles/{id}/delete','RoleController@delete');
Route::post('/roles/store','RoleController@store');
Route::get('/roles/create','RoleController@create');

Route::get('/users','UserController@index');




