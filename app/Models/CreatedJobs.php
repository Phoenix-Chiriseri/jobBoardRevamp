<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreatedJobs extends Model
{
    use HasFactory;

    protected $table = 'created_jobs';

    protected $fillable = [
        'username',
        'email',
        'phone_number',
        'job_name',
        'shift',
        'is_email_verified',
        'approved_at'
       ];
}
