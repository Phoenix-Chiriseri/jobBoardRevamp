<?php

namespace App\Http\Controllers;

use App\Models\JobDetails;
use App\Models\Job;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class JobDetailsController extends Controller
{

    public function deleteJob($id){
        $job = Job::find($id);
        if ($job) {
            $job->delete();      
            // Optionally, you can redirect to a page after deletion
            return redirect()->route('dashboard')->with('success', 'Job deleted successfully');
        } else {
            // Handle the case where the job with the given ID was not found
            return redirect()->route('jobs.index')->with('error', 'Job not found');
        }
    }

    public function editJob($id)
    {
        $name = Auth::user()->name;
        $job = Job::find($id);
        $shiftOptions = [
            'morning' => 'Morning Shift',
            'late' => 'Late Shift',
            'night' => 'Night Shift',
            'long' => 'Long Day',
        ];
        return view('pages.editJob')->with("shiftOptions",$shiftOptions)->with("job",$job)->with(
        "name",$name
        );   
        
    }
    /**
     * Store a newly created resource in storage.
     */
    public function createJobDetails(Request $request)
    {
        //
        // Validate the form data
        //store the job with the details
        $validatedData = $request->validate([
            // Ensure that the selected job exists
           'date' => 'required|date',
           'num_people' => 'required|integer',
           'shift' => 'required|string',
       ]);

       // Create a new job detail
       $jobDetail = new JobDetails();
       $jobDetail->job_id = $request->input('id');
       $jobDetail->date = $validatedData['date'];
       $jobDetail->num_people = $validatedData['num_people'];
       $jobDetail->shift = $validatedData['shift'];
       // Save the job detail to the database
       $jobDetail->save();
       return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(JobDetails $jobDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobDetails $jobDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JobDetails $jobDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobDetails $jobDetails)
    {
        //
    }
}
