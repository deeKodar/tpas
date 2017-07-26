<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolClass;

class SchoolClassController extends Controller
{
    public function index() {
        $school_classes = SchoolClass::all();

        return view('school_class.index', compact('school_classes'));
    }

    //show form for creating new class
    public function create() {
        return view('school_class.create');
    }

    //store new created class in storage
    public function store(Request $request) {
        
        $school_class = new SchoolClass;
        
        $school_class->name = $request['class_name'];
       
        $school_class->save();

        return redirect('/school-classes');
    }

    //display specific class
    public function show($id) {

    }

    //show form for editing class
    public function edit($id) {
        $school_class = SchoolClass::find($id);
        
        return view('school_class.edit', compact('school_class','id'));

    }

    //update the specified class in storage
    public function update(Request $request, $id) {

        $school_class = SchoolClass::find($id);
        $school_class->name = $request->get('name');
        $school_class->save();
        return redirect('index');

    }

    //remove the specified class from storage
    public function destroy($id) {

    }
}
