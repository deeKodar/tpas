<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use View;
use App\Models\SubjectType;
use App\Models\SchoolClass;

class SubjectController extends Controller
{
    //get all subjects
    public function getSubjectIndex() {

        //'subjectType' is the name of relation defined in Subject Model Class
        $subjects = Subject::with('subjectType')->get();

        return view('subject.index')
            ->with(compact('subjects'));
    }

    //get the detail of single subject
    public function getSubjectShow($id) {
        $subject = School::find($id);
        return view('subject.show', ['school' => $subject]);
    }

    //show form for creating new subject
    public function getSubjectCreate() {

        $subjectTypes = SubjectType::pluck('name', 'id')->all();

        $schoolClasses = SchoolClass::pluck('name', 'id')->all();

        //dd($schoolClasses);

        return view('subject.create')
            ->with(compact('subjectTypes'))
            ->with(compact('schoolClasses'));
    }

    //store newly created subject in storage
    public function postSubjectStore(Request $request) {

        //$userId = Auth::id();

        $subject = new Subject([
            'name' => $request->input('subject_name'),
            'subject_type_id' => $request->input('subject_type_id'),
        ]);

       // $schoolClasses
        //$schoolClasses[] = $request->input('schoolClassId[]');
        $schoolClasses = $request->input('schoolClassIds');

       // dd($schoolClasses);


        $subject->save();

        //$subject->schoolClasses()->attach($schoolClassId);

        foreach ($schoolClasses as $schoolClass) {

            $subject->schoolClasses()->attach($schoolClass);

        }

        return redirect()->route('subject.index')->with('info', 'Subject: ' . $request->input('subject_name') . 'created successfully');

    }

    //show form for editing Subject
    public function getSubjectEdit($id) {

        $subject = Subject::find($id);

        $subjectTypes = SubjectType::pluck('name', 'id')->all();
        $schoolClasses = SchoolClass::pluck('name', 'id')->all();
        //dd($schoolClasses);

        //pass only the 'id' value to view so that laravel Form::select() third arg can understand it as a id for default selected dropdown value
        $selectedSubjectType = SubjectType::where('id', $subject->subject_type_id)->pluck('id')->first();
        $selectedSchoolClasses = $subject->schoolClasses()->where('subject_id', $subject->id)->pluck('id');

        //dd($selectedSchoolClasses);

        return view('subject.edit', ['subject' => $subject, 'subjectId' => $id])
            ->with(compact('subjectTypes'))
            ->with(compact('selectedSubjectType'))
            ->with(compact('schoolClasses'))
            ->with(compact('selectedSchoolClasses'));
    }

    //update the particular subject in storage
    public function postSubjectUpdate(Request $request) {

        //$userId = Auth::id();

        $subject = Subject::find($request->input('id'));

        //$subject->id = $request->input('id');
        $subject->name = $request->input('subject_name');
        $subject->subject_type_id = $request->input('subject_type_id');

        $schoolClasses = $request->input('schoolClassIds');
        //dd($schoolClasses);

        $subject->save();

        $subject->schoolClasses()->detach();

        foreach ($schoolClasses as $schoolClass) {
            $subject->schoolClasses()->attach($schoolClass);
            //$subject->schoolClasses()->updateExistingPivot($schoolClasses, ['updated_at' => `NOW()`]);
        }

        return redirect()->route('subject.index')->with('info', 'Subject name updated as: ' . $request->input('subject_name'));

    }

    //remove the specified subject from storage
    public function getSubjectDelete($id) {

        $subject = Subject::find($id);

        $schoolClasses = Subject::find ($id)->schoolClasses();

        $schoolClasses->detach();

        //$subject->schoolClasses()->detach($id);

        $subject->delete();

        return redirect()->route('subject.index')->with('info', 'Subject deleted successfully');
    }

}
