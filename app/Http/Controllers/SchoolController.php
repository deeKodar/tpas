<?php

namespace App\Http\Controllers;

use App\Models\Dzongkhag;
use Illuminate\Http\Request;
use App\Models\SchoolClass;
use App\Models\School;
use App\Models\SchoolLevel;
use App\Models\SchoolStatusType;
use Illuminate\Support\Facades\Auth;
use View;

class SchoolController extends Controller
{
    public function __construct() {

        $this->middleware('auth');

    }

    public function getSchoolClassIndex() {

        $schoolClasses = SchoolClass::orderBy('id', 'asc')->get();

        return view('school_class.index', ['schoolClasses' => $schoolClasses]);
    }

    //get the detail of single school class
    public function getSchoolClassShow($id) {
        $school_class = SchoolClass::find($id);
        return view('school_class.show', ['school_class' => $school_class]);
    }

    //show form for creating new class
    public function getSchoolClassCreate() {

        return view('school_class.create');
    }

    //store new created class in storage
    public function postSchoolClassStore(Request $request) {
        
//        $this->validate($request, [
//            'name' => 'required|min|:6'
//        ]);

        $schoolClass = new SchoolClass([
            'name' => $request->input('class_name')
        ]);

        $schoolClass->save();

        return redirect()->route('school_class.index')->with('info', 'Class ' . $request->input('class_name') . 'created successfully');

    }

    //show form for editing class
    public function getSchoolClassEdit($id) {

        $schoolClass = SchoolClass::find($id);

        return view('school_class.edit', ['schoolClass' => $schoolClass, 'classId' => $id]);

    }

    //update the specified class in storage
    public function postSchoolClassUpdate(Request $request) {

//        $this->validate($request, [
//            'name' => 'required|min:6'
//        ]);

        $schoolClass = SchoolClass::find($request->input('id'));
        $schoolClass->name = $request->input('class_name');
        $schoolClass->save();

        return redirect()->route('school_class.index')->with('info', 'Class name updated as: ' . $request->input('class_name'));

    }

    //remove the specified class from storage
    public function getSchoolClassDelete($id) {

        $schoolClass = SchoolClass::find($id);
        $schoolClass->delete();

        return redirect()->route('school_class.index')->with('info', 'Class deleted successfully');
    }

    //get all schools
    public function getSchoolIndex() {
        //$schools = School::orderBy('name', 'asc')->get();

        $schools = School::with('dzongkhag', 'schoolLevel', 'schoolStatusType')->get();

//        dd($schools);

        return view('school.index')
            ->with(compact('schools'));
    }

    //get the detail of single school
    public function getSchoolShow($id) {
        $school = School::find($id);
        return view('school.show', ['school' => $school]);
    }

    //show form for creating new school
    public function getSchoolCreate() {

       $schoolLevels = \DB::table('school_levels')->pluck('name', 'id')->all();
       $dzongkhags = \DB::table('dzongkhags')->pluck('name', 'id')->all();
       $schoolStatusTypes = \DB::table('school_status_types')->pluck('name', 'id')->all();

       return view('school.create')
            ->with(compact('schoolLevels'))
            ->with(compact('dzongkhags'))
            ->with(compact('schoolStatusTypes'));
    }

    //store new created school in storage
    public function postSchoolStore(Request $request) {

//        $this->validate($request, [
//            'name' => 'required|min|:6'
//        ]);

        $userId = Auth::id();

        $school = new School([
            'school_code' => $request->input('school_code'),
            'name' => $request->input('school_name'),
            'school_level_id' => $request->input('school_level_id'),
            'dzongkhag_id' => $request->input('dzongkhag_id'),
            'school_status_type_id' => $request->input('school_status_type_id'),
            'user_id' => $userId,
            'version' => 1
        ]);

       // dd($school);

        $school->save();

        return redirect()->route('school.index')->with('info', 'School: ' . $request->input('school_name') . 'created successfully');

    }

    //show form for editing school
    public function getSchoolEdit($id) {

        $school = School::find($id);

        $schoolLevels = \DB::table('school_levels')->pluck('name', 'id')->all();
        $selectedSchoolLevel = \DB::table('school_levels')->where('id', $school->school_level_id)->pluck('name', 'id')->first();

        $dzongkhags = \DB::table('dzongkhags')->pluck('name', 'id')->all();
        $selectedDzongkhag = \DB::table('dzongkhags')->where('id', $school->dzongkhag_id)->pluck('name', 'id')->first();

        $schoolStatusTypes = \DB::table('school_status_types')->pluck('name', 'id')->all();
        $selectedSchoolStatusType = \DB::table('school_status_types')->where('id', $school->school_status_type_id)->pluck('name', 'id')->first();

        //dd($selectedSchoolLevel, $selectedDzongkhag, $selectedSchoolStatusType);

        //return view('school.edit', ['school' => $school, 'schoolId' => $id]);
        return view('school.edit', ['school' => $school, 'schoolId' => $id])
            ->with(compact('schoolLevels'))
            ->with(compact('selectedSchoolLevel'))
            ->with(compact('dzongkhags'))
            ->with(compact('selectedDzongkhag'))
            ->with(compact('schoolStatusTypes'))
            ->with(compact('selectedSchoolStatusType'));
    }

    //update the particular school in storage
    public function postSchoolUpdate(Request $request) {

//        $this->validate($request, [
//            'name' => 'required|min:6'
//        ]);

        $userId = Auth::id();

        $school = School::find($request->input('id'));
        $school->id = $request->input('id');
        $school->school_code = $request->input('school_code');
        $school->name = $request->input('school_name');
        $school->school_level_id = $request->input('school_level_id');
        $school->dzongkhag_id = $request->input('dzongkhag_id');
        $school->school_status_type_id = $request->input('school_status_type_id');
        $school->user_id = $userId;
        $school->version = request('version') + 1;
        $school->save();

        return redirect()->route('school.index')->with('info', 'School name updated as: ' . $request->input('school_name'));

    }

    //remove the specified school from storage
    public function getSchoolDelete($id) {

        $school = School::find($id);
        $school->delete();

        return redirect()->route('school.index')->with('info', 'School deleted successfully');
    }

}
