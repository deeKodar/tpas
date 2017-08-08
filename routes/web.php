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

//Route group entries for Subjects
Route::group(['prefix' => 'subject'], function() {
    Route::get('', [
        'uses' => 'SubjectController@getSubjectIndex',
        'as' => 'subject.index'
    ]);
    Route::get('create', [
        'uses' => 'SubjectController@getSubjectCreate',
        'as' => 'subject.create'
    ]);

    Route::post('store', [
        'uses' => 'SubjectController@postSubjectStore',
        'as' => 'subject.store'
    ]);

    Route::get('edit/{id}', [
        'uses' => 'SubjectController@getSubjectEdit',
        'as' => 'subject.edit'
    ]);

    Route::get('delete/{id}', [
        'uses' => 'SubjectController@getSubjectDelete',
        'as' => 'subject.delete'
    ]);

    Route::post('update', [
        'uses' => 'SubjectController@postSubjectUpdate',
        'as' => 'subject.update'
    ]);

});


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




