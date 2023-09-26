@extends('layouts.app')
@section('content')
<div class="row">
    @foreach($jobsWithDetails as $jobDetail)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Date: {{ $jobDetail->date }}</h5>
                    <p class="card-text">Morning {{ $jobDetail->morning_jobs }}</p>
                    <p class="card-text">Night  {{ $jobDetail->night_jobs }}</p>
                    <p class="card-text">Late  {{ $jobDetail->late_jobs }}</p>
                    <p class="card-text">Long  {{ $jobDetail->long_jobs }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
