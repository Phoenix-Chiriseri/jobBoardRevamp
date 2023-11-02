<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'job_name',
        'shift',
        'num_of_people',
        'updated_people',
        'available_people'
    ];

}
