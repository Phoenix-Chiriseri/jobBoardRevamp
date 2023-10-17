<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {

        $numberOfJobs = DB::table('jobs')->count();
        $lastEnteredJob = DB::table('jobs')->latest()->first();
        $jobs = Job::orderBy('id', 'desc')->paginate(5);
        $name= Auth::user()->name;
        return view('dashboard.index')
        ->with("jobs",$jobs)->with("numberOfJobs",$numberOfJobs)
        ->with("latest",$lastEnteredJob)->with("name",$name);
    }

    
    public function welcome(){

        $jobs = Job::orderBy('id', 'desc')->get();
        return view("welcome")->with("jobs",$jobs);
    }
}
