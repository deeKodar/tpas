<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index() {

    	return view('teachers.index');
    }

    public function view() {

    	return view('teachers.view');

    }

    public function create() {

    	return view('teachers.create');
    }
}
