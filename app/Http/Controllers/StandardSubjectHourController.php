<?php

namespace App\Http\Controllers;

use App\Models\StandardSubjectHour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use View;

class StandardSubjectHourController extends Controller
{
    //get all subjects
    public function getStandardSubjectHourIndex() {

        //'subjectType' is the name of relation defined in Subject Model Class
        $standardSubjectHours = StandardSubjectHour::with('schoolClass', 'subject')->get();

        return view('standard_subject_hour.index')
            ->with(compact('standardSubjectHours'));
    }

    //get the detail of single subject
    public function getStandardSubjectHourShow($id) {
        $subject = School::find($id);
        return view('subject.show', ['school' => $subject]);
    }

    //show form for creating new subject
//    public function getStandardSubjectHourCreate() {
//
//        $subjectTypes = SubjectType::pluck('name', 'id')->all();
//
//        $schoolClasses = SchoolClass::pluck('name', 'id')->all();
//
//        return view('subject.create')
//            ->with(compact('subjectTypes'))
//            ->with(compact('schoolClasses'));
//    }

    //store newly created subject in storage
//    public function postStandardSubjectHourStore(Request $request) {
//
//        $subject = new Subject([
//            'name' => $request->input('subject_name'),
//            'subject_type_id' => $request->input('subject_type_id'),
//        ]);
//
//        $schoolClasses = $request->input('schoolClassIds');
//
//        $subject->save();
//
//        foreach ($schoolClasses as $schoolClass) {
//
//            $subject->schoolClasses()->attach($schoolClass);
//
//        }
//
//        return redirect()->route('subject.index')->with('info', 'Subject: ' . $request->input('subject_name') . 'created successfully');
//
//    }

    //show form for editing Subject
    public function getStandardSubjectHourEdit($id) {

        $standardSubjectHour = StandardSubjectHour::with('schoolClass', 'subject')->find($id);

        return view('standard_subject_hour.edit', ['standardSubjectHour' => $standardSubjectHour, 'standardSubjectHourId' => $id]);

    }

    //update the particular subject in storage
    public function postStandardSubjectHourUpdate(Request $request) {
        //$userId = Auth::id();

        $standardSubjectHour = StandardSubjectHour::find($request->input('id'));

        $standardSubjectHour->standard_hour = $request->input('standard_hour');
        $standardSubjectHour->standard_minute = $request->input('standard_minute');
        $standardSubjectHour->save();

        return redirect()->route('standard_subject_hour.index')->with('info', 'Standard Subject Hour updated successfully');

    }

    //remove the specified subject from storage
    public function getStandardSubjectHourDelete($id) {

        $subject = Subject::find($id);
        $subject->delete();

        return redirect()->route('subject.index')->with('info', 'Subject deleted successfully');
    }

}
