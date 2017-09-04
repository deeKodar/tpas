<?php



namespace App\Observers;

use App\Models\ClassProjection;
use App\Models\Projection;
use App\Models\Subject;
use App\Models\School;
use App\Models\SchoolClass;
use App\Models\StandardSubjectHour;




class ClassProjectionObserver {
	


	public function created(ClassProjection $classProjection) {

		$this->calculateSchoolProjection($classProjection->school_id,$classProjection->projection_type_id,$classProjection->curriculum_year);
	}


	public function saved(ClassProjection $classProjection) {

		$this->calculateSchoolProjection($classProjection->school_id,$classProjection->projection_type_id,$classProjection->curriculum_year);


	}

	public function deleted(ClassProjection $classProjection) {



		$this->calculateSchoolProjection($classProjection->school_id,$classProjection->projection_type_id,$classProjection->curriculum_year);	

	}


protected function calculateSchoolProjection($school_id,$projection_type,$year) {

    	$class_projections = ClassProjection::get()->where('school_id',$school_id)
    	->where('projection_type_id',$projection_type)
    	->where('curriculum_year',$year);
    	

    	$subjects = Subject::all();
    	$school = School::find($school_id);
    	
		
		foreach($subjects as $subject) {

			if($subject->hasClass($class_projections)) {

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
	    		
	    		$class_total_minutes=(($standard->standard_hour*60)+$standard->standard_minute)*$class_projection->section_count;
                $total_minutes+=$class_total_minutes;
	    		
	    		}
	    		
	    		
    		}

    		$hours=floor($total_minutes/60);
    		$minutes=($total_minutes%60);
    		$required_teachers=round($total_minutes/(18*60));
    		$teacher_gap=$teachers-$required_teachers;
    		

    		$projection = Projection::where('school_id',$school_id)
    		->where('subject_id',$subject->id)
    		->where('projection_type_id',$projection_type)
    		->where('curriculum_year',$year)
    		->first();

    		if($projection==null)
    		{
    			$projection= new Projection;
    		}
    		// $projection = Projection::firstOrNew(
    		// 	 ['school_id' => $school_id], 
    		// 	 ['subject_id' => $subject->id], 
    		// 	 ['projection_type_id' => $projection_type], 
    		// 	 ['curriculum_year'=> $year]
    		// );

    		$projection->school_id=$school_id;
    		$projection->subject_id=$subject->id;
    		$projection->curriculum_year=$year;
    		$projection->projection_type_id=$projection_type;
    		$projection->required_teachers=$required_teachers;
    		$projection->actual_teachers=$teachers;
    		$projection->teacher_gap=$teacher_gap;
    		$projection->dzongkhag_id=$school->dzongkhag->id;
    		// $projection->curriculum_year=$year;
    		// $projection->projection_type_id=$projection_type;
    		$projection->save();

    		
    		
		}
    	
    }
   //  		$projection = Projection::firstOrNew(
   //   			 ['school_id' => $school_id], ['subject_id' => 1], ['projection_type_id' =>$projection_type], ['curriculum_year'=>$year ] );
			// $projection->school_id=1;
			// $projection->subject_id=1;
			// $projection->projection_type_id=1;
			// $projection->curriculum_year=2017;
   //  		$projection->required_teachers=1;
   //  		$projection->actual_teachers=1;
   //  		$projection->teacher_gap=1;
   //  		$projection->dzongkhag_id=1;
   //  		$projection->save();

    }



}