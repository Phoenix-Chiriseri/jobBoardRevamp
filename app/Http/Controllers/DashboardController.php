<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\RealJobs;
use Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {

        $numberOfJobs = DB::table('real_jobs')->count();
        $lastEnteredJob = DB::table('real_jobs')->latest()->first();
        $jobs = RealJobs::orderBy('id', 'desc')->paginate(5);
        $name= Auth::user()->name;
        return view('dashboard.index')
        ->with("jobs",$jobs)->with("numberOfJobs",$numberOfJobs)
        ->with("latest",$lastEnteredJob)->with("name",$name);
    }

    
    public function welcome(){

        $jobs = RealJobs::orderBy('id', 'desc')->get();
        return view("welcome")->with("jobs",$jobs);
    }
}
