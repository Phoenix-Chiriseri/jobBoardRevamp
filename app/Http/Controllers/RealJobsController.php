<?php

namespace App\Http\Controllers;

use App\Models\RealJobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RealJobsController extends Controller
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
    public function createJob(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'job_name' => 'required|string|max:255',
            'job_description' => 'required|string|max:255',
            'num_of_people' => 'required|string|max:255',
            'shift' => 'required|string|max:255',
            'location' => 'required|max:255',
            'date' => 'required|max:255',
            
        ],
            [
                'job_name.required'  => 'Job name is required.',
                'job_description.required'  => ' Job description  is required.',
                'num_of_people.required' => 'Number of people is required',
                'shift.required' => 'Shift is required',
                'location.required' => 'Location is required', 
                'date.required' => 'Date is required', 
            ]
        );
        

        if ($validator->fails()) {
            
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $jobs = RealJobs::create([
            'job_name'    => $request->input('job_name'),
            'job_description'   => $request->input('job_description'),
            'num_of_people'     => $request->input('num_of_people'),
            'shift'             => $request->input('shift'),
            'location'          => $request->input('location'),
            'date'              => $request->input('date')
        ]);
        

        $jobs->save();

        return redirect()->back()->with('success', 'Job created successfully');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
