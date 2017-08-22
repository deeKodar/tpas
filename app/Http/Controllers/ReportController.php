<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Teacher;
use App\Models\ClassProjection;
use App\Models\StandardSubjectHour;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

}
