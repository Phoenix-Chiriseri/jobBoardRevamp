<?php

namespace App\Http\Controllers;

use App\Models\JobDetails;
use App\Models\RealJobs;
use App\Models\Job;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use DB;


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
            'Morning' => 'Morning Shift',
            'late' => 'Late Shift',
            'Night' => 'Night Shift',
            'Long' => 'Long Day',
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
    public function updateJobDetails(Request $request)
    {
        $numberOfJobs = DB::table('real_jobs')->count();
        $lastEnteredJob = DB::table('real_jobs')->latest()->first();
        $jobs = RealJobs::orderBy('id', 'desc')->paginate(5);
        $validator = Validator::make($request->all(), [
            'job_name' => 'required|string|max:255',
            'num_of_people' => 'required|string|max:255',
            'updated_people' => 'required|string|max:255',
            'shift' => 'required|string|max:255',
        ],
            [
                'job_name.required'  => 'Job name is required.',
                'num_of_people.required' => 'Number of people is required',
                'updated_people.required' => 'Number of people is required',
                'shift.required' => 'Shift is required'
            ]
        );

        $num_of_people = $request->input('num_of_people');
        $required_people = $request->input('updated_people');
        $available_people = $num_of_people - $required_people;

  


        if ($validator->fails()) {
            
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $jobs = JobDetails::create([
            'job_name'          => $request->input('job_name'),
            'num_of_people'     => $num_of_people,
            'updated_people'   =>  $required_people,
            'available_people'  => $available_people,
            'shift'             => $request->input('shift'),
            'job_id'            => $request->input('job_id')
        ]);
        
        $jobs->save();

        return redirect()->back()->with('success','Job updated successfully');
    }

    /**
     * Display the specified resource.
     */
}
