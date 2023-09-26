<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $jobs = Job::orderBy('id', 'desc')->get();
        return view("welcome")->with("jobs",$jobs);
    }

    public function createJobDetails()
    {
        $shiftOptions = [
            'morning' => 'Morning Shift',
            'late' => 'Late Shift',
            'night' => 'Night Shift',
            'long' => 'Long Day',
        ];
        //select all the patients from the table where the house is equal to the hous of the authenticated user
        $jobs = DB::select("SELECT * FROM jobs");
        //collect all the patients from the database
        $jobs = collect($jobs);
        //return all the patients to the daily entry view where the house is equal to the authenticated users house
        return view('createJobsDetails')->with("jobs",$jobs)->with("shiftOptions",$shiftOptions);
    }

    //view the jobs on the client side by their id
    public function viewJobById($id){
        
        $job = Job::find($id);
    
        if (!$job) {
           echo "no jobs found";
        }
        
        $today = Carbon::today();
        $endDate = $today->copy()->addDays(7);
        
        $jobsWithDetails = Job::leftJoin('job_details', 'jobs.id', '=', 'job_details.job_id')
            ->select(
                'job_details.date as date',
                DB::raw('SUM(CASE WHEN job_details.shift = "morning" THEN 1 ELSE 0 END) as morning_jobs'),
                DB::raw('SUM(CASE WHEN job_details.shift = "night" THEN 1 ELSE 0 END) as night_jobs'),
                DB::raw('SUM(CASE WHEN job_details.shift = "late" THEN 1 ELSE 0 END) as late_jobs'),
                DB::raw('SUM(CASE WHEN job_details.shift = "long" THEN 1 ELSE 0 END) as long_jobs')
            )
            ->where('jobs.id', '=', $job->id) // Use $job->id here to access the job ID.
            ->where('job_details.date', '>=', $today)
            ->where('job_details.date', '<=', $endDate)
            ->groupBy('date')
            ->get();

        return view('viewJobById')->with('jobsWithDetails', $jobsWithDetails);
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'job' => 'required|string',
        ]);
        // Create a new Job instance and fill it with the validated data
        $job = new Job();
        $job->job = $validatedData['job'];
        // Save the job to the database
        $job->save();
        // Redirect to a success page or do something else after saving
        //return redirect()->route('jobs.index')->with('success', 'Job created successfully');
        echo "job saved";
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        //
    }
}
