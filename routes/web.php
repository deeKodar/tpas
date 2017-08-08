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



//Route group entries for School Class CRUD
Route::group(['prefix' => 'school_class'], function() {
    Route::get('', [
        'uses' => 'SchoolController@getSchoolClassIndex',
        'as' => 'school_class.index'
    ]);
    Route::get('create', [
        'uses' => 'SchoolController@getSchoolClassCreate',
        'as' => 'school_class.create'
    ]);

    Route::post('store', [
        'uses' => 'SchoolController@postSchoolClassStore',
        'as' => 'school_class.store'
    ]);

    Route::get('edit/{id}', [
        'uses' => 'SchoolController@getSchoolClassEdit',
        'as' => 'school_class.edit'
    ]);

    Route::get('delete/{id}', [
        'uses' => 'SchoolController@getSchoolClassDelete',
        'as' => 'school_class.delete'
    ]);

    Route::post('update', [
        'uses' => 'SchoolController@postSchoolClassUpdate',
        'as' => 'school_class.update'
    ]);

});

// Route Entries for Schools
Route::group(['prefix' => 'school'], function() {
    Route::get('', [
        'uses' => 'SchoolController@getSchoolIndex',
        'as' => 'school.index'
    ]);

    Route::get('create', [
        'uses' => 'SchoolController@getSchoolCreate',
        'as' => 'school.create'
    ]);

    Route::post('store', [
        'uses' => 'SchoolController@postSchoolStore',
        'as' => 'school.store'
    ]);

    Route::get('edit/{id}', [
        'uses' => 'SchoolController@getSchoolEdit',
        'as' => 'school.edit'
    ]);

    Route::get('delete/{id}', [
        'uses' => 'SchoolController@getSchoolDelete',
        'as' => 'school.delete'
    ]);

    Route::post('update', [
        'uses' => 'SchoolController@postSchoolUpdate',
        'as' => 'school.update'
    ]);
});

//Route list teachers
Route::group(['prefix' => 'teachers'], function() {

    Route::get('','TeacherController@index');

    Route::post('store', [
    	'uses' => 'TeacherController@store',
    	'as' => 'storeTeacher'
    	]);
    Route::get('edit/{id}', [
    	'uses' => 'TeacherController@edit',
    	'as' => 'editTeacher'
    	]);

    Route::get('/teachers', 'TeacherController@index');
    Route::patch('update/{id}', [
    	'uses'=>'TeacherController@update',
    	'as' => 'updateTeacher'
    ]);
    Route::get('view/{id}', 'TeacherController@view');


    Route::get('create','TeacherController@create');

});


//Route list Roles
Route::group(['prefix' => 'roles'], function() {

    Route::get('','RoleController@index');
    Route::get('{id}/edit','RoleController@edit');
    Route::patch('{id}/update','RoleController@update');
    Route::delete('{id}/delete','RoleController@delete');
    Route::post('store','RoleController@store');
    Route::get('create','RoleController@create');

    

});

Route::group(['prefix' => 'users'], function() {

    Route::get('','UserController@index');
    Route::get('create', 'UserController@create');
    Route::post('store','UserController@store');
    Route::get('edit/{id}','UserController@edit');
    Route::patch('update/{id}','UserController@update');

});





