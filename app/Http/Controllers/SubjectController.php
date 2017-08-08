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

        $subjectTypes = \DB::table('subject_types')->pluck('name', 'id')->all();

        return view('subject.create')
            ->with(compact('subjectTypes'));
    }

    //store newly created subject in storage
    public function postSubjectStore(Request $request) {

        //$userId = Auth::id();

        $subject = new Subject([
            'name' => $request->input('name'),
            'subject_type_id' => $request->input('subject_type_id'),
        ]);

        $subject->save();

        return redirect()->route('subject.index')->with('info', 'Subject: ' . $request->input('subject_name') . 'created successfully');

    }

    //show form for editing Subject
    public function getSubjectEdit($id) {

        $subject = Subject::find($id);

        $subjectTypes = \DB::table('subject_types')->pluck('name', 'id')->all();
        $selectedSubjectType = \DB::table('subject_types')->where('id', $subject->subject_type_id)->pluck('name', 'id')->first()->toString();

        return view('subject.edit', ['school' => $subject, 'subjectId' => $id])
            ->with(compact('subjectTypes'))
            ->with(compact('selectedSubjectType'));
    }

    //update the particular subject in storage
    public function postSubjectUpdate(Request $request) {

        //$userId = Auth::id();

        $subject = Subject::find($request->input('id'));

        $subject->id = $request->input('id');
        $subject->name = $request->input('subject_name');
        $subject->subject_type_id = $request->input('subject_type_id');
        $subject->save();

        return redirect()->route('subject.index')->with('info', 'Subject name updated as: ' . $request->input('subject_name'));

    }

    //remove the specified subject from storage
    public function getSubjectDelete($id) {

        $subject = Subject::find($id);
        $subject->delete();

        return redirect()->route('subject.index')->with('info', 'Subject deleted successfully');
    }

}
