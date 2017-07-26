<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\Qualification;
use App\Models\TeacherEmploymentType;
use Illuminate\Support\Facades\Auth;
use App\Models\FieldOfStudy;
use View;


class TeacherController extends Controller
{
    public function index() {

    	return view('teachers.index');
    }

    public function view() {


    	
    	return view('teachers.view');

    }

    public function create() {

		$subjects = Subject::all();
		$qualifications = Qualification::all();
		$employmenttypes=TeacherEmploymentType::all();
		$fields=FieldOfStudy::all();
		$employmenttype=TeacherEmploymentType::all();

		return View::make('teachers.create')
		->with(compact('subjects'))
		->with(compact('fields'))
		->with(compact('employmenttypes'))
		->with(compact('qualifications'));
    	
    }
    public function store() {



    	$teacher = new Teacher;

    	
    	$userid = Auth::id();

    	$teacher->employee_id = request('employee_id');
    	$teacher->citizenship_id = request('citizenship_id');
    	$teacher->first_name = request('first_name');
    	$teacher->middle_name= request('middle_name');
    	$teacher->last_name = request('last_name');
    	$teacher->citizenship = request('citizenship');
    	$teacher->gender = request('gender');
    	$teacher->date_of_birth = date('Y-m-d',strtotime(request('date_of_birth')));
    	$teacher->position_level = request('position_level');
    	$teacher->position_title = request('position_title');
    	$teacher->employment_type_id = request('employment_type_id');
    	$teacher->initial_appointment_date = date('Y-m-d',strtotime(request('initial_appointment_date')));
    	$teacher->current_appointment_date = date('Y-m-d',strtotime(request('current_appointment_date')));
    	$teacher->qualification_id = request('qualification_id');
    	$teacher->field_of_study_id = request('field_of_study_id');
    	$teacher->school_id = request('school_id');
    	$teacher->class_id = request('class_id');
    	$teacher->core_subject_id = request('core_subject_id');
    	$teacher->elective_subject_one_id = request('elective_subject_one_id');
    	$teacher->elective_subject_two_id = request('elective_subject_two_id');
    	$teacher->elective_subject_three_id = request('elective_subject_three_id');
    	$teacher->employee_status_type_id = request('employee_status_type_id');
    	$teacher->marital_status = request('marital_status');
    	$teacher->user_id = $userid;
    	$teacher->version = 1;


    	$teacher->save();

    	return redirect('/teachers');

    }
}
