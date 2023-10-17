<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobDetailsController;
use App\Http\Controllers\CreatedJobsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\WelcomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/',[WelcomeController::class,'index'])->name('index');
Route::get('/sign-in', function () {return redirect('sign-in');})->middleware('guest');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('/viewJob/{id}', [JobController::class, 'viewJobById'])->name('viewjob');
 //Manage client job request
Route::get('/adddetails/{id}', [JobController::class, 'addJob'])->name('addjob');
Route::post('/addjobdetails', [CreatedJobsController::class, 'store'])->name('add.job.details');
Route::get('/jobsubmitted',[CreatedJobsController::class,'submittedJobMessage'])->name('jobsubmitted');
Route::get('/requestedjob', [CreatedJobsController::class, 'requestedJob'])->name('requestedjob');
Route::get('account/verify/{token}', [CreatedJobsController::class, 'verifyAccount'])->name('user.verify'); 
Route::get('sign-up', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('sign-up', [RegisterController::class, 'store'])->middleware('guest');
Route::get('sign-in', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('sign-in', [SessionsController::class, 'store'])->middleware('guest');
Route::post('verify', [SessionsController::class, 'show'])->middleware('guest');
Route::post('search-job', [SearchController::class, 'searchJob'])->name("search-job");
Route::post('reset-password', [SessionsController::class, 'update'])->middleware('guest')->name('password.update');
Route::get('verify', function () {
	return view('sessions.password.verify');
})->middleware('guest')->name('verify'); 
Route::get('/reset-password/{token}', function ($token) {
	return view('sessions.password.reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');
//routes for the application tied to the auth middleware

Route::middleware(['auth'])->group(function () {
    
	Route::get('/createJob', [JobController::class, 'index'])->name("createJob");
    Route::post('/submitJob', [JobController::class, 'store'])->name("submitJob");
    Route::get('/deleteJob/{id}', [JobDetailsController::class, 'deleteJob']);
	Route::get('/editJob/{id}', [JobDetailsController::class, 'editJob']);
	Route::get('/changeName/{id}', [JobController::class, 'changeJobName']);
	Route::post('/submitJobDetails', [JobDetailsController::class, 'createJobDetails'])->name('submitJobDetails');
	Route::put('/submitChangeJobName/{$id}', [JobController::class, 'submitChangeJobName'])->name('submitChangeJobName');
	Route::put('/submitChangeJobName/{$id}', [JobController::class, 'submitChangeJobName'])->name('submitChangeJobName');
	Route::post('sign-out', [SessionsController::class, 'destroy'])->middleware('auth')->name('logout');
	Route::get('profile', [ProfileController::class, 'create'])->middleware('auth')->name('profile');
	Route::post('user-profile', [ProfileController::class, 'update']);
	Route::get('/approval',[CreatedJobsController::class,'approval'])->name('approval');
	Route::get('/requested-jobs',[CreatedJobsController::class,'requestedJobs'])->name('requested-jobs');
	Route::get('/approvejobs',[CreatedJobsController::class,'approveJobs'])->name('approvejobs');
	Route::get('/created-jobs',  [CreatedJobsController::class,'index'])->name('admin.requestedjobs.index');
	Route::get('/created-jobs/{job_id}/approve', [CreatedJobsController::class,'approve'])->name('admin.requestedjobs.approve');
	Route::get('/approvedjobs',[CreatedJobsController::class,'approvedJobs'])->name('approvedjobs');
	Route::get('/alljobrequests',[CreatedJobsController::class,'allJobRequests'])->name('alljobrequests');
	Route::get('/updatejobrequests',[CreatedJobsController::class,'updateJobRequests'])->name('updatejobrequests');
	Route::get('/updateJob/{id}', [CreatedJobsController::class, 'updateJob'])->name('updatedjobrequest');
    Route::middleware(['approved'])->group(function () {
        Route::get('/home', 'HomeController@index')->name('home');
    });
});

