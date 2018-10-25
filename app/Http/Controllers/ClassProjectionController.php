<?php

namespace App\Http\Controllers;

use App\Models\ClassProjection;
use App\Models\Dzongkhag;
use App\Models\SchoolLevel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\School;
use App\Models\SchoolClass;
use App\Models\ProjectionType;

use App\Events\ProjectionAdded;

class ClassProjectionController extends Controller
{
    public function __construct() {

        $this->middleware('auth');

    }

    function getUserId() {

        return Auth::id();

    }

    function getUserRoleId() {

        return  User::where('id', '=', $this->getUserId())->pluck('role_id')->first();

    }

    function getUserSchoolId() {

        return User::where('id','=', $this->getUserId())->pluck('school_id')->first();

    }

    function getUserDzongkhagId() {

        return User::where('id', '=', $this->getUserId())->pluck('dzongkhag_id')->first();

    }

    function getUserSchoolLevelId() {

        return School::where('id', '=', $this->getUserSchoolId())->pluck('school_level_id')->first();

    }

    //get all projections
    public function getClassProjectionIndex() {

        if ($this->getUserRoleId() == 1 || $this->getUserRoleId() == 2) {

            $locationName = 'Across the Country';
            $classProjections = ClassProjection::with('schoolClass', 'projectionType', 'school', 'dzongkhag')->get();

        } elseif ($this->getUserRoleId() == 3) {

            $locationName = Dzongkhag::where('id', '=', $this->getUserDzongkhagId())->pluck('name')->first();
            $classProjections = ClassProjection::with('schoolClass', 'projectionType', 'school', 'dzongkhag')->where('dzongkhag_id', $this->getUserDzongkhagId())->get();

        } else {

            $locationName = School::where('id', $this->getUserSchoolId())->pluck('name')->first();
            //$schoolLevel = SchoolLevel::
            $classProjections = ClassProjection::with('schoolClass', 'projectionType', 'school', 'dzongkhag')->where('school_id', $this->getUserSchoolId())->get();
           // dd($classProjections);

        }

        $roleId = $this->getUserRoleId();

        $schoolLevelName = SchoolLevel::where('id', '=', $this->getUserSchoolLevelId())->pluck('name')->first();

        return view('class_projection.index')
            ->with(compact('classProjections'))
            ->with(compact('locationName'))
            ->with(compact('roleId'))
            ->with(compact('schoolLevelName'));

    }

    //get the detail of single school
    public function getClassProjectionShow($id) {

        $school = School::find($id);
        return view('school.show', ['school' => $school]);

    }

    //show form for creating new school
    public function getClassProjectionCreate() {

        //$schoolLevel = SchoolLevel::find($this->getSchoolLevelId());
        //$schoolLevelClasses = $schoolLevel->schoolClasses()->pluck('name', 'id')->all();
        $schoolClasses = SchoolClass::pluck('name', 'id')->all();

        $projectionTypes = ProjectionType::pluck('name', 'id')->all();

        return view('class_projection.create')
            ->with(compact('schoolClasses'))
            ->with(compact('projectionTypes'));
    }

    //store new created school in storage
    public function postClassProjectionStore(Request $request) {

        $classProjection = new ClassProjection([
            'school_class_id' => $request->input('school_class_id'),
            'student_count' => $request->input('student_count'),
            'section_count' => $request->input('section_count'),
            'curriculum_year' => $request->input('curriculum_year'),
            'projection_type_id' => $request->input('projection_type_id'),
            'school_id' => $this->getUserSchoolId(),
            'dzongkhag_id' => $this->getUserDzongkhagId(),
            'user_id' => $this->getUserId(),
            'version' => 1
        ]);

        $projection=$classProjection->save();
        //event(new ProjectionAdded($projection));
        //return redirect()->route('class_projection.index')->with('info', 'Class Projection created successfully');

        return $this->getClassProjectionIndex();
    }

    //show form for editing school
    public function getClassProjectionEdit($id) {

        $classProjection = ClassProjection::find($id);

//        $schoolLevel = SchoolLevel::find($this->getSchoolLevelId());
//        $schoolLevelClasses = $schoolLevel->schoolClasses()->pluck('name', 'id')->all();
//        $selectedSchoolLevelClass = SchoolClass::where('id', $classProjection->school_class_id)->pluck('id')->first();
        $schoolClasses = SchoolClass::pluck('name', 'id')->all();
        $selectedSchoolClass = SchoolClass::where('id', $classProjection->school_class_id)->pluck('id')->first();

        $projectionTypes = ProjectionType::pluck('name', 'id')->all();
        $selectedProjectionType = ProjectionType::where('id', $classProjection->projection_type_id)->pluck('id')->first();

        return view('class_projection.edit', ['classProjection' => $classProjection, 'classProjectionId' => $id])
            ->with(compact('schoolClasses'))
            ->with(compact('selectedSchoolClass'))
            ->with(compact('projectionTypes'))
            ->with(compact('selectedProjectionType'));

    }

    //update the particular school in storage
    public function postClassProjectionUpdate(Request $request) {

        $classProjection = ClassProjection::find($request->input('id'));
        $classProjection->school_class_id = $request->input('school_class_id');
        $classProjection->student_count = $request->input('student_count');
        $classProjection->section_count = $request->input('section_count');
        $classProjection->curriculum_year = $request->input('curriculum_year');
        $classProjection->projection_type_id = $request->input('projection_type_id');
        $classProjection->school_id = $this->getUserSchoolId();
        $classProjection->dzongkhag_id = $this->getUserDzongkhagId();
        $classProjection->user_id = $this->getUserId();
        $classProjection->version = request('version') + 1;
        $projection=$classProjection->save();

        //event(new ProjectionAdded($projection));
        return redirect()->route('class_projection.index')->with('info', 'Class Projection updated successfully!');

    }

    //remove the specified school from storage
    public function getClassProjectionDelete($id) {

        $classProjection = ClassProjection::find($id);
        $classProjection->delete();

        return redirect()->route('class_projection.index')->with('info', 'Class Projection deleted successfully');

    }
}
