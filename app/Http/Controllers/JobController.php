<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\RealJobs;
use App\Models\JobDetails;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $name = Auth::user()->name;
        return view("admin.add_new_job")->with("name",$name);
    }

    /**
     * Show the form for creating a new resource.
     */
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'job' => 'required|string',
        ]);
        // Create a new Job instance and fill it with the validated data
        $job = new Job();
        $job->job = $validatedData['job'];
        // Save the job to the database
        $job->save();
        return redirect('/dashboard');
    }

    public function changeJobName($id){

        $name = Auth::user()->name;
        $job = Job::find($id);
        return view("pages.changeJobName")->with("job",$job)->with("name",$name);

    }

    public function addJob($id){

        $job_details = RealJobs::findOrFail($id);
     
       
        return view("pages.addjobdetails", compact('job_details'));

    }

    public function jobRequestDetails(Request $request){

    }


    public function submitChangeJobName(Request $request,$id){

        
       $validatedData = $request->validate([
            'job' => 'required|string',
        ]);
       $job = Job::find($id);
       $job->update($request->all());
       echo "done";

    }


    //view the job by an id and pass it to the view
    public function viewJobById($id){        
       
        //get the job from the database using the id
        $job = RealJobs::find($id); 
        //Get the job ID from the retrieved Job model
        //get the job name and the job id
        $jobId = $job->id;
        $jobName = $job->job;
        $startDate = now()->toDateString();
        $endDate = now()->addDays(6)->toDateString();
        $jobsWithDetails = DB::table('real_jobs')
        ->select('real_jobs.job_name',
                 'real_jobs.num_of_people', 
                 'real_jobs.shift',
                 'real_jobs.location',
                 'real_jobs.created_at', 
                )
        ->where('real_jobs.id', $jobId)
        ->whereBetween('real_jobs.date', [$startDate, $endDate])
        ->get();
        return view('pages.viewJobById',compact('job'))->with('jobsWithDetails', $jobsWithDetails)->with("jobName",$jobName);
    }

}
