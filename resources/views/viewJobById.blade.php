@extends('layouts.app') <!-- Use your layout file if you have one -->
@section('content')
@foreach($jobsWithDetails as $jobDetail)
    Date: {{ $jobDetail->date }}
    Morning Jobs: {{ $jobDetail->morning_jobs }}
    Night Jobs: {{ $jobDetail->night_jobs }}
    Late Jobs: {{ $jobDetail->late_jobs }}
    Long Jobs: {{ $jobDetail->long_jobs }}
@endforeach
@endsection
