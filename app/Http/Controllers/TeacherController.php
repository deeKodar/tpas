<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\Qualification;
use App\Models\TeacherEmploymentType;
use App\Models\FieldOfStudy;
use App\Models\TeacherStatusType;
use App\Models\School;
use App\Models\SchoolClass;
use App\Models\PositionLevel;
use App\Models\PositionTitle;
use App\Models\Nationality;
use App\Models\Dzongkhag;
use App\Models\Hometown;
use Illuminate\Support\Facades\Auth;
use View;


class TeacherController extends Controller
{

	 public function __construct()
    {
        $this->middleware('auth');
        
    }

    public function index() {


	      $teachers = Teacher::with('school','dzongkhag')->get();

          

    	 return view('teachers.index', compact('teachers'));
    }

   

    public function edit($id) {
        
        $subjects = Subject::all();
        $classes=SchoolClass::all();
        $schools=School::all();
        $qualifications = Qualification::all();
        $employmenttypes=TeacherEmploymentType::all();
        $fields=FieldOfStudy::all();
        $teacherstatus=TeacherStatusType::all();
        $positionlevels=PositionLevel::all();
        $positiontitles=PositionTitle::all();
        $dzongkhags=Dzongkhag::all();
        $nationalities=Nationality::all();
        $hometowns=Hometown::all();
    	return View::make('teachers.edit')
    	->with('teacher', Teacher::find($id))
            ->with(compact('subjects'))
            ->with(compact('fields'))
            ->with(compact('dzongkhags'))
            ->with(compact('schools'))
            ->with(compact('classes'))
            ->with(compact('employmenttypes'))
            ->with(compact('qualifications'))
            ->with(compact('teacherstatus'))
            ->with(compact('positionlevels'))
            ->with(compact('positiontitles'))
            ->with(compact('nationalities'))
            ->with(compact('classes'))
            ->with(compact('hometowns'));

    }

    public function create() {

		$subjects = Subject::all();
		$classes=SchoolClass::all();
		$schools=School::all();
		$qualifications = Qualification::all();
		$employmenttypes=TeacherEmploymentType::all();
		$fields=FieldOfStudy::all();
		$teacherstatus=TeacherStatusType::all();
		$positionlevels=PositionLevel::all();
		$positiontitles=PositionTitle::all();
		$nationalities=Nationality::all();
        $dzongkhags=Dzongkhag::all();
        $hometowns=Hometown::all();

		return View::make('teachers.create')
		->with(compact('subjects'))
		->with(compact('fields'))
		->with(compact('schools'))
		->with(compact('classes'))
		->with(compact('employmenttypes'))
		->with(compact('qualifications'))
		->with(compact('teacherstatus'))
		->with(compact('positionlevels'))
		->with(compact('positiontitles'))
		->with(compact('nationalities'))
        ->with(compact('dzongkhags'))
		->with(compact('classes'))
        ->with(compact('hometowns'));
    	
    }
    public function store() {



    	$teacher = new Teacher;

    	
    	$userid = Auth::id();

    	$teacher->employee_id = request('employee_id');
    	$teacher->name = request('name');
    	$teacher->gender = request('gender');
    	$teacher->date_of_birth = date('Y-m-d',strtotime(request('date_of_birth')));
    	$teacher->position_level = request('position_level');
    	$teacher->position_title = request('position_title');
    	$teacher->employment_type_id = request('employment_type_id');
    	$teacher->initial_appointment_date = date('Y-m-d',strtotime(request('initial_appointment_date')));
    	$teacher->current_appointment_date = date('Y-m-d',strtotime(request('current_appointment_date')));
    	$teacher->initial_qualification_id = request('initial_qualification_id');
        $teacher->current_qualification_id = request('current_qualification_id');
    	$teacher->field_of_study_id = request('field_of_study_id');
        $teacher->dzongkhag_id = request('dzongkhag_id');
    	$teacher->school_id = request('school_id');
    	$teacher->core_subject_id = request('core_subject_id');
    	$teacher->subject_one_id = request('subject_one_id');
    	$teacher->subject_two_id = request('subject_two_id');
    	$teacher->subject_three_id = request('subject_three_id');
        $teacher->contract_from = date('Y-m-d',strtotime(request('contract_from')));;
        $teacher->contract_to = date('Y-m-d',strtotime(request('contract_to')));
        $teacher->remarks = request('remarks');
        $teacher->hometown = request('hometown');
    	$teacher->employee_status_type_id = request('employee_status_type_id');
    	$teacher->marital_status = request('marital_status');
    	$teacher->user_id = $userid;
    	$teacher->version = 1;


    	$teacher->save();

    	return redirect('/teachers');

    }

    public function update($id) {

        $teacher=Teacher::find($id);

        $userid = Auth::id();

       $teacher->employee_id = request('employee_id');
        $teacher->name = request('name');
        $teacher->gender = request('gender');
        $teacher->date_of_birth = date('Y-m-d',strtotime(request('date_of_birth')));
        $teacher->position_level = request('position_level');
        $teacher->position_title = request('position_title');
        $teacher->employment_type_id = request('employment_type_id');
        $teacher->initial_appointment_date = date('Y-m-d',strtotime(request('initial_appointment_date')));
        $teacher->current_appointment_date = date('Y-m-d',strtotime(request('current_appointment_date')));
        $teacher->initial_qualification_id = request('initial_qualification_id');
        $teacher->current_qualification_id = request('current_qualification_id');
        $teacher->field_of_study_id = request('field_of_study_id');
        $teacher->dzongkhag_id = request('dzongkhag_id');
        $teacher->school_id = request('school_id');
        $teacher->core_subject_id = request('core_subject_id');
        $teacher->subject_one_id = request('subject_one_id');
        $teacher->subject_two_id = request('subject_two_id');
        $teacher->subject_three_id = request('subject_three_id');
        $teacher->contract_from = request('contract_from');
        $teacher->contract_to = request('contract_to');
        $teacher->remarks = request('remarks');
        $teacher->hometown = request('hometown');
        $teacher->employee_status_type_id = request('employee_status_type_id');
        $teacher->marital_status = request('marital_status');
        $teacher->user_id = $userid;
        $teacher->version = request('version')+1;


        $teacher->save();

        return redirect('/teachers');


    }

    public function view($id){

        $teacher = Teacher::find($id);

         $subjects = Subject::all();
        $classes=SchoolClass::all();
        $schools=School::all();
        $qualifications = Qualification::all();
        $employmenttypes=TeacherEmploymentType::all();
        $fields=FieldOfStudy::all();
        $teacherstatus=TeacherStatusType::all();
        $positionlevels=PositionLevel::all();
        $positiontitles=PositionTitle::all();
        $nationalities=Nationality::all();
        $dzongkhags=Dzongkhag::all();
        $hometowns=Hometown::all();
        return View::make('teachers.view')
        ->with('teacher', Teacher::find($id))
            ->with(compact('subjects'))
            ->with(compact('fields'))
            ->with(compact('schools'))
            ->with(compact('classes'))
            ->with(compact('employmenttypes'))
            ->with(compact('qualifications'))
            ->with(compact('teacherstatus'))
            ->with(compact('positionlevels'))
            ->with(compact('positiontitles'))
            ->with(compact('nationalities'))
            ->with(compact('classes'))
            ->with(compact('hometowns'))
            ->with(compact('dzongkhags'));

    }

    public function transferAllocateIndex() {

        $this->user =  \Auth::user();

        $teachers = Teacher::with('school')->get()
        ->where('school_id',0)
        ->where('dzongkhag_id',$this->user->dzongkhag_id);
        $dzongkhag = Dzongkhag::find($this->user->dzongkhag_id);
          

         return view('teachers.transfers.allocate.index', compact('teachers', 'dzongkhag'));

    }


    protected function transferAllocate($id) {

        

        $teacher=Teacher::find($id);

        

        $schools=School::all();
        
        $teacherstatus=TeacherStatusType::all();
        $positionlevels=PositionLevel::all();
        
        $dzongkhags=Dzongkhag::all();
        $nationalities=Nationality::all();
        return View::make('teachers.transfers.allocate.allocate')
        ->with('teacher', Teacher::find($id))
            ->with(compact('subjects'))
            ->with(compact('fields'))
            ->with(compact('dzongkhags'))
            ->with(compact('schools'))
            ->with(compact('classes'))
            ->with(compact('employmenttypes'))
            ->with(compact('qualifications'))
            ->with(compact('teacherstatus'))
            ->with(compact('positionlevels'))
            ->with(compact('positiontitles'))
            ->with(compact('nationalities'))
            ->with(compact('classes'));

    }


    protected function transferAllocateUpdate($id)  {

       $teacher=Teacher::find($id);

        $userid = Auth::id();

       
        $teacher->school_id = request('school_id');
        
        $teacher->user_id = $userid;
        $teacher->version = request('version')+1;


        $teacher->save();

        return redirect('/teachers/transfer/allocate');


    }

    protected function transferIntraIndex() {

         $this->user =  \Auth::user();

        $teachers = Teacher::with('school')->get()
        ->where('dzongkhag_id',$this->user->dzongkhag_id);
        $dzongkhag = Dzongkhag::find($this->user->dzongkhag_id);
          

         return view('teachers.transfers.intra.index', compact('teachers', 'dzongkhag'));


    }

     protected function transferIntra($id) {

        

        $teacher=Teacher::find($id);

        

        $schools=School::all();
        
        $teacherstatus=TeacherStatusType::all();
        $positionlevels=PositionLevel::all();
        
        $dzongkhags=Dzongkhag::all();
        $nationalities=Nationality::all();
        return View::make('teachers.transfers.intra.transfer')
        ->with('teacher', Teacher::find($id))
            ->with(compact('subjects'))
            ->with(compact('fields'))
            ->with(compact('dzongkhags'))
            ->with(compact('schools'))
            ->with(compact('classes'))
            ->with(compact('employmenttypes'))
            ->with(compact('qualifications'))
            ->with(compact('teacherstatus'))
            ->with(compact('positionlevels'))
            ->with(compact('positiontitles'))
            ->with(compact('nationalities'))
            ->with(compact('classes'));

    }


    protected function transferIntraUpdate($id)  {

       $teacher=Teacher::find($id);

        $userid = Auth::id();

       
        $teacher->school_id = request('school_id');
        
        $teacher->user_id = $userid;
        $teacher->version = request('version')+1;


        $teacher->save();

        return redirect('/teachers/transfer/intra');


    }

    protected function transferInterIndex() {

         $this->user =  \Auth::user();

        $teachers = Teacher::with('school','teacherStatusType')->get()
        ->where('dzongkhag_id',$this->user->dzongkhag_id);
        $dzongkhag = Dzongkhag::find($this->user->dzongkhag_id);

         return view('teachers.transfers.inter.index', compact('teachers','dzongkhag'));


    }

     protected function transferInter($id) {

        

        $teacher=Teacher::find($id);

        

        $schools=School::all();
        
        $teacherstatus=TeacherStatusType::all();
        $positionlevels=PositionLevel::all();
        
        $dzongkhags=Dzongkhag::all();
        $nationalities=Nationality::all();
        return View::make('teachers.transfers.inter.transfer')
        ->with('teacher', Teacher::find($id))
            ->with(compact('dzongkhags'))
            ->with(compact('schools'))
            ->with(compact('nationalities'));

    }


    protected function transferInterUpdate($id)  {

       $teacher=Teacher::find($id);

        $userid = Auth::id();

       
        $teacher->dzongkhag_id = request('dzongkhag_id');
        $teacher->school_id=0;
        
        $teacher->user_id = $userid;
        $teacher->version = request('version')+1;


        $teacher->save();

        return redirect('/teachers/transfer/inter');


    }

    protected function delete() {

        $id = request('teacher_id');

        $teacher = Teacher::find($id);

        $teacher->delete();

        return redirect('/teachers/');
    }
}
