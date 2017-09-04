<?php

namespace App\Http\Controllers;

use App\Models\Dzongkhag;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Teacher;
use App\Models\ClassProjection;
use App\Models\StandardSubjectHour;
use App\Models\User;
use View;

class ReportChartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function getUserId() {

        return Auth::id();

    }

    function getUserRoleId() {

        return  User::where('id', '=', $this->getUserId())->pluck('role_id')->first();

    }

    function getUserSchoolId() {

        //return User::where('id','=', $this->getUserId())->pluck('school_id')->first();
        return User::where('id','=', $this->getUserId())->pluck('school_id')->first();

    }

    public function index()
    {
        $dzongkhags = Dzongkhag::all();
        $schools = School::all();
        return View::make('home')
            ->with(compact('dzongkhags'))
            ->with(compact('schools'));
    }

    public function getClassSection($id)
    {
        //dd($this->getUserId());
        //dd($this->getUserSchoolId());
        //$classProjections = ClassProjection::with('schoolClass', 'projectionType', 'school', 'dzongkhag')->where('school_id', $this->getUserSchoolId())->get();
        $classProjections = ClassProjection::with('schoolClass', 'projectionType', 'school', 'dzongkhag')->where('school_id', $id)->get();

        $labels = [];
        $rows = [];
        $rows2 = [];

        foreach ($classProjections as $classSection) {

            $labels[] = $classSection->schoolClass->name;
            $rows[] = $classSection->section_count;
            $rows2[] = $classSection->student_count;

        }

        $data = [
            'labels' => $labels,
            'rows' => $rows,
            'rows2' => $rows2
        ];

        //$jsonData = json_encode($data);

        //return view('home', compact('jsonData'));
        return response()->json(['data' => $data], 200);
    }

}
