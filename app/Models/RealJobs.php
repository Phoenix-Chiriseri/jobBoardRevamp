<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealJobs extends Model
{
    use HasFactory;

    protected $fillable = [
     'job_name',
     'job_description',
     'num_of_people',
     'shift',
     'location',
     'date'
    ];
}
