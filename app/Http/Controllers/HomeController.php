<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sonam = ['name' => 'Sonam', 'wins' => '50'];
        $darshan = ['name' => 'Darshan', 'wins' => '8'];
        return view('home', compact('sonam', 'darshan'));
    }
}
