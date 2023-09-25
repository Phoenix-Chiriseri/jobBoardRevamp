<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $shiftOptions = [
            'morning' => 'Morning Shift',
            'late' => 'Late Shift',
            'night' => 'Night Shift',
            'long' => 'Long Day',
        ];

        $jobs = Job::all();
        /*$jobsAndEntries = Job::leftJoin('job_details', 'job_details.job_id', '=', 'jobs.id')
        ->select(
        'jobs.id as id',
        'jobs.job as job_name', // Use 'jobs.job' instead of 'job.job'
        'job_details.date as jobDate',
        'job_details.num_people as jobNumPeople',
        'job_details.shift as jobShift'
        );
        $jobsAndEntriesData = $jobsAndEntries->get();*/
        return view('home')->with("shiftOptions",$shiftOptions)->with("jobs",$jobs);
    }
}
