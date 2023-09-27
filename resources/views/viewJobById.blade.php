@extends('layouts.app')
@section('content')
<div class="container">
    @if ($jobsWithDetails->isEmpty())
        <p>No job records found.</p>
    @else
        @foreach ($jobsWithDetails->groupBy('date') as $date => $records)
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title">Date: {{ $date }}</h5>
                </div>
                <div class="card-body">
                    @foreach ($records as $record)
                        <h6 class="card-subtitle mb-2 text-muted">{{ $record->job }}</h6>
                        <p class="card-text">Shift: {{ $record->shift }}</p>
                        <p class="card-text">Total Number of People: {{ $record->total_num_people }}</p>
                    @endforeach
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection