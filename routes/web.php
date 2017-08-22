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

//Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
 Route::post('login', 'Auth\LoginController@login');
 Route::post('logout', 'LoginController@logout')->name('logout');


// Authentication Routes...
Route::group(['prefix' => 'admin', 'namespace' => 'Auth'], function () {
        
        // Registration Routes...
        //$this->get('register', 'RegisterController@showRegistrationForm')->name('register');
        //$this->post('register', 'RegisterController@register');

        // Password Reset Routes...
        $this->get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
        $this->post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        $this->get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
        $this->post('password/reset', 'ResetPasswordController@reset');

});
        
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

    Route::get('','TeacherController@index')->middleware('can:view_teachers,Auth::user()');

    Route::post('store', [
    	'uses' => 'TeacherController@store',
    	'as' => 'teachers.store'
    	]);
    Route::get('edit/{id}', [
    	'uses' => 'TeacherController@edit',
    	'as' => 'teachers.edit'
    	]);

    Route::group(['prefix' => 'transfer'], function() {

            Route::get('allocate/', [
                'uses' => 'TeacherController@transferAllocateIndex',
                'as' => 'teachers.transfer.allocate.index'
            ])->middleware('can:allocate_teachers,Auth::user()');

            Route::get('allocate/{id}', [
                'uses' => 'TeacherController@transferAllocate',
                'as' => 'teachers.transfer.allocate'])->middleware('can:allocate_teachers, Auth::user()');
            Route::patch('allocate/{id}', [
                'uses' => 'TeacherController@transferAllocateUpdate',
                'as' => 'teachers.transfer.allocate'])->middleware('can:allocate_teachers, Auth::user()');

            Route::get('intra', [

                'uses' => 'TeacherController@transferIntraIndex',
                'as' => 'teachers.transfer.intra.index'])->middleware('can:transfer_intra, Auth::user()');
            Route::get('intra/{id}', [
                'uses' => 'TeacherController@transferIntra',
                'as' => 'teachers.transfer.intra'])->middleware('can:transfer_intra, Auth::user()');
            Route::patch('intra/{id}', [
                'uses' => 'TeacherController@transferIntraUpdate',
                'as' => 'teachers.transfer.intra'])->middleware('can:transfer_intra, Auth::user()');

            Route::get('inter', [

                'uses' => 'TeacherController@transferInterIndex',
                'as' => 'teachers.transfer.inter.index'])->middleware('can:transfer_inter, Auth:user()');
            Route::get('inter/{id}', [
                'uses' => 'TeacherController@transferInter',
                'as' => 'teachers.transfer.inter'])->middleware('can:transfer_inter, Auth:user()');
            Route::patch('inter/{id}', [
                'uses' => 'TeacherController@transferInterUpdate',
                'as' => 'teachers.transfer.inter'])->middleware('can:transfer_inter, Auth:user()');

    });
    


    Route::patch('update/{id}', [
    	'uses'=>'TeacherController@update',
    	'as' => 'teachers.update'
    ]);
    Route::get('view/{id}', [
        'uses'=>'TeacherController@view',
        'as' => 'teachers.view'
    ]);


    Route::get('create','TeacherController@create');

});


//Route list Roles
Route::group(['prefix' => 'roles'], function() {

    Route::get('','RoleController@index');
    Route::get('edit/{id}','RoleController@edit');
    Route::patch('update/{id}','RoleController@update');
    Route::delete('delete/{id}','RoleController@delete');
    Route::post('store','RoleController@store');
    Route::get('create','RoleController@create');
    Route::get('view/{id}','RoleController@view');

    

});
//Route for users
Route::group(['prefix' => 'users'], function() {

    Route::get('','UserController@index')->middleware('can:view_users,Auth::user()');
    Route::get('create', 'UserController@create');
    Route::post('store','UserController@store');
    Route::get('edit/{id}','UserController@edit');
    Route::patch('update/{id}','UserController@update');
    Route::get('schoolfromdzongkhag/{id}','UserController@schoolFromDzongkhag');

});

Route::group(['prefix' => 'permissions'], function() {

    Route::get('','PermissionController@index');
    Route::get('create', 'PermissionController@create');

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

//Route group entries for Standard Subject Hours
Route::group(['prefix' => 'standard_subject_hour'], function() {
    Route::get('', [
        'uses' => 'StandardSubjectHourController@getStandardSubjectHourIndex',
        'as' => 'standard_subject_hour.index'
    ]);
    Route::get('create', [
        'uses' => 'StandardSubjectHourController@getStandardSubjectHourCreate',
        'as' => 'standard_subject_hour.create'
    ]);

    Route::post('store', [
        'uses' => 'StandardSubjectHourController@postStandardSubjectHourStore',
        'as' => 'standard_subject_hour.store'
    ]);

    Route::get('edit/{id}', [
        'uses' => 'StandardSubjectHourController@getStandardSubjectHourEdit',
        'as' => 'standard_subject_hour.edit'
    ]);

    Route::get('delete/{id}', [
        'uses' => 'StandardSubjectHourController@getStandardSubjectHourDelete',
        'as' => 'standard_subject_hour.delete'
    ]);

    Route::post('update', [
        'uses' => 'StandardSubjectHourController@postStandardSubjectHourUpdate',
        'as' => 'standard_subject_hour.update'
    ]);

});

//Route group entries for Standard Subject Hours
Route::group(['prefix' => 'class_projection'], function() {

    Route::get('', [
        'uses' => 'ClassProjectionController@getClassProjectionIndex',
        'as' => 'class_projection.index'
    ]);

    Route::get('create', [
        'uses' => 'ClassProjectionController@getClassProjectionCreate',
        'as' => 'class_projection.create'
    ]);

    Route::post('store', [
        'uses' => 'ClassProjectionController@postClassProjectionStore',
        'as' => 'class_projection.store'
    ]);

    Route::get('edit/{id}', [
        'uses' => 'ClassProjectionController@getClassProjectionEdit',
        'as' => 'class_projection.edit'
    ]);

    Route::get('delete/{id}', [
        'uses' => 'ClassProjectionController@getClassProjectionDelete',
        'as' => 'class_projection.delete'
    ]);

    Route::post('update', [
        'uses' => 'ClassProjectionController@postClassProjectionUpdate',
        'as' => 'class_projection.update'
    ]);

});






