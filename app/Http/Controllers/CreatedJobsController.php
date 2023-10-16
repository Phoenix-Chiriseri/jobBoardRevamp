<?php

namespace App\Http\Controllers;

use App\Models\CreatedJobs;
use App\Models\User;
use App\Models\Job;
use App\Models\JobDetails;
use App\Models\UserVerify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Notifications\NewJobRequest;
use Hash;
use Illuminate\Support\Str;
use Mail;
use DB;

class CreatedJobsController extends Controller
{
    
    public function index()
    {
        $requestedJobs = CreatedJobs::whereNull('approved_at')->get();

        return view('pages.submitteddetails', compact('requestedJobs'));
    }

    public function approval()
{
    return view('pages.approval');
}

    public function approve($job_id)
    {
        $job = CreatedJobs::findOrFail($job_id);
        

        $job->update(['approved_at' => now()]);

        return redirect()->route('admin.requestedjobs.index')->withMessage('Job request approved successfully');
    }

    public function approveJobs()
    {
        $requestedJobs  = DB::select("SELECT * FROM `created_jobs` WHERE `approved_at` IS NULL");
        return view('admin.approve_job_requests', compact('requestedJobs'));
    }

    public function approvedJobs()
    {
        $approved_jobs  = DB::select("SELECT * FROM `created_jobs` WHERE `approved_at` IS NOT NULL");
        $approved  = DB::select("SELECT * FROM `created_jobs` WHERE `approved_at` IS NOT NULL");
        return view('admin.viewapproved_jobrequests',compact('approved_jobs','approved'));
    }

    /**
     * Display a listing of the resource.
     */
    public function requestedJobs()
    {
        $requestedJobs  = CreatedJobs::all();
        return view('pages.submitteddetails', compact('requestedJobs'));
    }

    public function allJobRequests()
    {
        $requestedJobs  = CreatedJobs::all();
        return view('pages.submitteddetails', compact('requestedJobs'));
    }

    public function updateJobRequests(){

        $numberOfJobs = DB::table('jobs')->count();
        $lastEnteredJob = DB::table('jobs')->latest()->first();
        $jobs = Job::orderBy('id', 'desc')->paginate(5);

        return view('admin.updatejobs',compact('numberOfJobs','lastEnteredJob','jobs'));
    }

    public function updateJob($id){
     
        $jobs = Job::findOrFail($id);
        $job_details = JobDetails::findOrFail($id);
       // $shifts = JobDetails::findOrFail($id);

        $shiftOptions = [
            'Morning' => 'Morning Shift',
            'Late Shift' => 'Late Shift',
            'Night' => 'Night Shift',
            'Long' => 'Long Day',
        ];

        $num_of_people = JobDetails:: 
                          leftJoin('job_details','job_details.job_id','=','jobs.id')
                          ->select(
                            'jobs.job as jobname',
                            'job_details.num_people',
                          );
       
        return view('admin.update',compact('num_of_people','jobs','shiftOptions','job_details'));   
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'phone_number'  => 'required',
            'job_name' => 'required',
            'shift' => 'required',
           
        ]);
           
        $data = $request->all();
        $createUser = $this->create($data);

        $token = Str::random(64);
        UserVerify::create([
              'user_id' => $createUser->id, 
              'token' => $token
            ]);
  
        Mail::send('mail.email_verification', ['token' => $token], function($message) use($request){
              $message->to($request->email);
              $message->subject('Email Verification Mail');
          });
         
        return redirect('/jobsubmitted');
    }

    protected function create(array $data)
    {
        $requested_job = CreatedJobs::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'job_name' => $data['job_name'],
            'shift' => $data['shift'],
        ]);
    
        $admin = User::where('admin', 1)->first();
        if ($admin) {
            $admin->notify(new NewJobRequest($requested_job));
        }
    
        return $requested_job;
    }

    public function submittedJobMessage(){
        return view('pages.jobsubmitted');
    }

    public function verifyAccount($token)
    {
        $verifyUser = UserVerify::where('token', $token)->first();
  
        $message = 'Sorry your email cannot be identified.';
  
        if(!is_null($verifyUser) ){
            $user = $verifyUser->user;
              
            if(!$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->save();
                $message = "Your e-mail is verified. You can now login.";
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
        }
  
      return redirect()->route('login')->with('message', $message);
    }


    
    /**
     * Display the specified resource.
     */
    public function show(CreatedJobs $createdJobs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CreatedJobs $createdJobs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CreatedJobs $createdJobs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CreatedJobs $createdJobs)
    {
        //
    }

}
