<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RealJobs;

class WelcomeController extends Controller
{
    public function index(){
        $jobs  = RealJobs::orderBy('id','desc')->get();
         
        return view('welcome',compact('jobs'));
    }
}
