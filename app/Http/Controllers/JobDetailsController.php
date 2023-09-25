<?php

namespace App\Http\Controllers;

use App\Models\JobDetails;
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
            'job_id' => 'required|exists:jobs,id', // Ensure that the selected job exists
            'date' => 'required|date',
            'num_people' => 'required|integer',
            'shift' => 'required|string',
        ]);

        // Create a new job detail
        $jobDetail = new JobDetails();
        $jobDetail->job_id = $validatedData['job_id'];
        $jobDetail->date = $validatedData['date'];
        $jobDetail->num_people = $validatedData['num_people'];
        $jobDetail->shift = $validatedData['shift'];
        // Save the job detail to the database
        $jobDetail->save();
        return redirect('/home');
        
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

        echo $id;
        
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
