<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Teacher;
use App\Models\ClassProjection;
use App\Models\StandardSubjectHour;
use App\Models\User;

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
        return User::where('id','=', 2)->pluck('school_id')->first();

    }

    public function index()
    {
//        $classProjections = ClassProjection::with('schoolClass', 'projectionType', 'school', 'dzongkhag')->where('school_id', $this->getUserSchoolId())->get();
//
//        $labels = [];
//        $rows = [];
//
//        foreach ($classProjections as $classSection) {
//
//            $labels[] = $classSection->schoolClass->name;
//            $rows[] = $classSection->section_count;
//
//        }
//
//        $data = [
//            'labels' => $labels,
//            'rows' => $rows
//        ];
//
//        $jsonData = json_encode($data);
//
//        return view('home', compact('jsonData'));
        return view('home');
    }

    public function getClassSection()
    {
        $classProjections = ClassProjection::with('schoolClass', 'projectionType', 'school', 'dzongkhag')->where('school_id', $this->getUserSchoolId())->get();

        $labels = [];
        $rows = [];

        foreach ($classProjections as $classSection) {

            $labels[] = $classSection->schoolClass->name;
            $rows[] = $classSection->section_count;

        }

        $data = [
            'labels' => $labels,
            'rows' => $rows
        ];

        //$jsonData = json_encode($data);

        //return view('home', compact('jsonData'));
        return response()->json(['data' => $data], 200);
    }

}
