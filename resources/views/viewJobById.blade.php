@extends('layouts.app') <!-- Use your layout file if you have one -->

@section('content')
<div class="container">
    <div class="row">
        @foreach ($jobsWithDetails as $jobDetail)
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">{{ $jobDetail->job }}</h5>
                    <p class="card-text">Date: {{ $jobDetail->date }}</p>
                    <p class="card-text">Number of People: {{ $jobDetail->people }}</p>
                    <p class="card-text">Shift: {{ $jobDetail->shift }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
