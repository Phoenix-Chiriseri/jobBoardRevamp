@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Welcome to the Job Board</h1>

    <div class="row">
        @foreach ($jobs as $job)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $job->job }}</h5>
                        <p class="card-text">
                            
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection


