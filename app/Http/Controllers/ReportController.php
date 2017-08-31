<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Teacher;
use App\Models\ClassProjection;
use App\Models\StandardSubjectHour;
use App\Models\SchoolClass;
use App\Models\Subject;
use App\Models\School;
use App\Models\Dzongkhag;
use App\Models\User;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function getSchoolProjection($school_id,$projection_type,$year) {

    	$class_projections = ClassProjection::get()->where('school_id',$school_id)
    	->where('projection_type_id',$projection_type)
    	->where('curriculum_year',$year);
    	

    	$subjects = Subject::all();
    	$school = School::find($school_id);
    	
		echo "<h1> School Name : ".$school->name."</h1>";
		foreach($subjects as $subject) {
			if($subject->hasClass($class_projections)) {

			echo "<table class='table table-bordered'>";
			echo "<tr><th><h2>Subject</h2></th><th colspan=2><h2>".$subject->name."</h2></th></tr>";
			$total_sections=0;
			$total_minutes=0;
            $class_total_minutes=0;
			$hours=0;
			$minutes=0;
			$teachers= $school->teacherCount($subject->id);
			foreach($class_projections as $class_projection) {
				
				$class = SchoolClass::find($class_projection->school_class_id);
	    		if($class->hasSubject($subject->id)) {
	    		
	    		$total_sections+=$class_projection->section_count;
	    		$standards=StandardSubjectHour::get()->where('school_class_id',$class_projection->school_class_id)
	    		->where('subject_id',$subject->id);
	    		$standard=$standards->first();
	    		// $total_minutes+=(($standard->standard_hour)*60);
	    		// $total_minutes+=$standard->standard_minute;
       //          $total_minutes=$total_minutes*$class_projection->section_count;
	    		$class_total_minutes=(($standard->standard_hour*60)+$standard->standard_minute)*$class_projection->section_count;
                $total_minutes+=$class_total_minutes;
	    		echo "<tr>";
	    		echo "<td>";
	    		echo "Class ID : ".$class_projection->school_class_id;
	    		echo "</td>";
	    		echo "<td>";
	    		echo "Class Name: ".$class->name;
	    		echo "</td>";
	    		echo "<td>";
	    		echo "No. of section(s): ".$class_projection->section_count;
	    		
	    		echo "</td>";
	    		
	    		echo "</tr>";
	    		
	    		}
	    		
	    		
    		}

    		
    		$hours=floor($total_minutes/60);
    		$minutes=($total_minutes%60);
    		$required_teachers=round($total_minutes/(18*60));
    		$teacher_gap=$teachers-$required_teachers;
    		echo "<tr><td colspan=2>Total Section(s):</td><td >".$total_sections."</td></tr>";
    		echo "<tr><td>Total hour(s):</td><td colspan=2>".$hours." hours, ".$minutes." minutes</td></tr>";
    		echo "<tr><td>Required teacher(s):</td><td colspan=2>".$required_teachers."</td></tr>";
    		echo "<tr><td>Actual teacher(s):</td><td colspan=2>".$teachers."</td></tr>";
    		if($teacher_gap<0) {
    			echo "<tr><td>Teacher Gap:</td><td colspan=2 class='btn-danger'>".$teacher_gap."(deficit)</td></tr>";
    		} elseif($teacher_gap>0){
    			echo "<tr><td>Teacher Gap:</td><td colspan=2 class='btn-danger'>".$teacher_gap."(surplus)</td></tr>";
    		} else {
    			echo "<tr><td>Teacher Gap:</td><td colspan=2 class='btn-success'>".$teacher_gap."</td></tr>";
    		}
    		
    		echo "<tr><td>Year:</td><td colspan=2>".$year."</td></tr>";
    		
    		echo "</table>";
		}
    	
    }
    	// echo "<h1>".$school_id."</h1>";

    }

    protected function viewProjection() {



    	$dzongkhags=Dzongkhag::all();
    	$year = ClassProjection::distinct()->pluck('curriculum_year');
    	$projection_type=DB::table('projection_types')->get();
    	
    	
    	$user=User::find(Auth::id());
    	return view('report.projections.view', compact('dzongkhags','year','projection_type','user'));


    }

}
