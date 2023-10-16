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
            //return view('pages.nojobsfound');
            return redirect()->route('nojobsfound')->with('success', 'No jobs Found');
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

        $num_of_people = JobDetails:: 
                          leftJoin('job_details','job_details.job_id','=','jobs.id')
                          ->select(
                            'jobs.job as jobname',
                            'job_details.num_people',
                            
                          );
       
        return view('pages.editJob',compact('num_of_people'))->with("shiftOptions",$shiftOptions)->with("job",$job)->with(
        "name",$name
        );   
        
    }
    /**
     * Store a newly created resource in storage.
     */
    public function createJobDetails(Request $request)
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
       return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     */
}
