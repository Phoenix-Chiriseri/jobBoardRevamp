<?php

namespace App\Http\Controllers;

use App\Models\JobDetails;
use App\Models\Job;
use Illuminate\Http\Request;

class JobDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
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
        return redirect('/home');
    }


    public function deleteJob($id){
        $job = Job::find($id);
        if ($job) {
            $job->delete();      
            // Optionally, you can redirect to a page after deletion
            return redirect()->route('home')->with('success', 'Job deleted successfully');
        } else {
            // Handle the case where the job with the given ID was not found
            return redirect()->route('jobs.index')->with('error', 'Job not found');
        }
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
    public function editJob($id)
    {
        $job = Job::find($id);
        $shiftOptions = [
            'morning' => 'Morning Shift',
            'late' => 'Late Shift',
            'night' => 'Night Shift',
            'long' => 'Long Day',
        ];
        return view('editJob')->with("shiftOptions",$shiftOptions)->with("job",$job);        
        //echo $id;
          /*$jobsAndEntries = Job::leftJoin('job_details', 'job_details.job_id', '=', 'jobs.id')
        ->select(
        'jobs.id as id',
        'jobs.job as job_name', // Use 'jobs.job' instead of 'job.job'
        'job_details.date as jobDate',
        'job_details.num_people as jobNumPeople',
        'job_details.shift as jobShift'
        );
        $jobsAndEntriesData = $jobsAndEntries->get();*/
        
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
