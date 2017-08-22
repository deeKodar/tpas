<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\ClassProjection;
use App\Models\SchoolLevel;
use App\Models\User;
use App\Models\School;
use App\Models\SchoolClass;
use App\Models\ProjectionType;

class ClassProjectionControllerOld extends Controller
{
    public function __construct() {

        $this->middleware('auth');

    }

    function getUserId() {

        return $userId = Auth::id();

    }

    function getSchoolId() {

        return User::where('id','=', $this->getUserId())->pluck('school_id')->first();

    }

    function getSchoolLevelId() {

        return School::where('id', '=', $this->getSchoolId())->pluck('school_level_id')->first();

    }

    //get all projections
    public function getClassProjectionIndex() {

        // $userId = Auth::id();

        //$schoolId = User::where('id','=', $userId)->pluck('school_id')->first();
        $schoolName = School::where('id', $this->getSchoolId())->pluck('name')->first();
        //dd($schoolName);

        $classProjections = ClassProjection::with('schoolClass', 'projectionType', 'school')->get();

        return view('class_projection.index')
            ->with(compact('classProjections'))
            ->with(compact('schoolName'));

    }

    //get the detail of single school
    public function getClassProjectionShow($id) {

        $school = School::find($id);
        return view('school.show', ['school' => $school]);

    }

    //show form for creating new school
    public function getClassProjectionCreate() {

        // $userId = Auth::id();

        //$schoolId = User::where('id','=', $userId)->pluck('school_id')->first();
        //$schoolLevelId = School::where('id', '=', $schoolId)->pluck('school_level_id')->first();
        $schoolLevel = SchoolLevel::find($this->getSchoolLevelId());
        $schoolLevelClasses = $schoolLevel->schoolClasses()->pluck('name', 'id')->all();

        $projectionTypes = ProjectionType::pluck('name', 'id')->all();

        return view('class_projection.create')
            ->with(compact('schoolLevelClasses'))
            ->with(compact('projectionTypes'));
    }

    //store new created school in storage
    public function postClassProjectionStore(Request $request) {

        //$userId = Auth::id();

        // $schoolId = \DB::table('users')->where('id','=', $userId)->pluck('school_id')->first();
        //$schoolId = User::where('id','=', $userId)->pluck('school_id')->first();

        $classProjection = new ClassProjection([
            'school_class_id' => $request->input('school_class_id'),
            'student_count' => $request->input('student_count'),
            'section_count' => $request->input('section_count'),
            'curriculum_year' => $request->input('curriculum_year'),
            'projection_type_id' => $request->input('projection_type_id'),
            'user_id' => $this->getUserId(),
            'school_id' => $this->getSchoolId(),
            'version' => 1
        ]);

        $classProjection->save();

        return redirect()->route('class_projection.index')->with('info', 'Class Projection created successfully');

    }

    //show form for editing school
    public function getClassProjectionEdit($id) {

        $classProjection = ClassProjection::find($id);

//        $schoolClasses = SchoolClass::pluck('name', 'id')->all();
//        $selectedSchoolClass = SchoolClass::where('id', $classProjection->school_class_id)->pluck('id')->first();
        // $userId = Auth::id();

        //$schoolId = User::where('id','=', $userId)->pluck('school_id')->first();

        //$schoolLevelId = School::where('id', '=', $schoolId)->pluck('school_level_id')->first();
        $schoolLevel = SchoolLevel::find($this->getSchoolLevelId());
        $schoolLevelClasses = $schoolLevel->schoolClasses()->pluck('name', 'id')->all();
        //$selectedSchoolLevelClass = $schoolLevel->schoolClasses()->where('id', $classProjection->school_class_id)->first();
        $selectedSchoolLevelClass = SchoolClass::where('id', $classProjection->school_class_id)->pluck('id')->first();

        $projectionTypes = ProjectionType::pluck('name', 'id')->all();
        $selectedProjectionType = ProjectionType::where('id', $classProjection->projection_type_id)->pluck('id')->first();

        return view('class_projection.edit', ['classProjection' => $classProjection, 'classProjectionId' => $id])
            ->with(compact('schoolLevelClasses'))
            ->with(compact('selectedSchoolLevelClass'))
            ->with(compact('projectionTypes'))
            ->with(compact('selectedProjectionType'));

    }

    //update the particular school in storage
    public function postClassProjectionUpdate(Request $request) {

        //$userId = Auth::id();

        //$schoolId = User::where('id','=', $userId)->pluck('school_id')->first();

        $classProjection = ClassProjection::find($request->input('id'));
        //$classProjection->id = $request->input('id');
        $classProjection->school_class_id = $request->input('school_class_id');
        $classProjection->student_count = $request->input('student_count');
        $classProjection->section_count = $request->input('section_count');
        $classProjection->curriculum_year = $request->input('curriculum_year');
        $classProjection->projection_type_id = $request->input('projection_type_id');
        $classProjection->user_id = $this->getUserId();
        $classProjection->school_id = $this->getSchoolId();
        $classProjection->version = request('version') + 1;
        $classProjection->save();

        return redirect()->route('class_projection.index')->with('info', 'Class Projection updated successfully!');

    }

    //remove the specified school from storage
    public function getClassProjectionDelete($id) {

        $classProjection = ClassProjection::find($id);
        $classProjection->delete();

        return redirect()->route('class_projection.index')->with('info', 'Class Projection deleted successfully');
    }
}
