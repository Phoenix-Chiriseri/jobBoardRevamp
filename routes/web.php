<?php

use Illuminate\Support\Facades\Route;
use App\Controllers\JobController;

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
Auth::routes();
Route::get('/', [App\Http\Controllers\JobController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/createJob', [App\Http\Controllers\JobController::class, 'store'])->name('createJob');
Route::get('/createJobDetails', [App\Http\Controllers\JobController::class, 'createJobDetails'])->name('createJobDetails');
Route::post('/submitJobDetails', [App\Http\Controllers\JobDetailsController::class, 'store'])->name('submitJobDetails');
Route::get('/editJob/{id}', [App\Http\Controllers\JobDetailsController::class, 'editJob']);
Route::post('/submitJob', [App\Http\Controllers\JobDetailsController::class, 'store'])->name('submitJob');
Route::get('/viewJob/{id}', [App\Http\Controllers\JobController::class, 'viewJobById']);