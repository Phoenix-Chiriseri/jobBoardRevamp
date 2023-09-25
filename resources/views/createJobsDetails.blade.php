@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header texty-center"></div>
                <div class="card-body">
                @if(Session::has('success'))
                <script type="text/javascript">
                function massge() {
                Swal.fire(
                'Success',
                'Done'
                    );
                    }
                    window.onload = massge;
                    </script>
                    @endif
                    <form method="POST" action="{{ route('submitJobDetails') }}">
                        @csrf
                        <div class="form-group">
                            <label for="job_id">Select Job</label>
                            <select name="job_id" class="form-control" required>
                                @foreach ($jobs as $job)
                                    <option value="{{ $job->id }}">{{ $job->job }}</option>
                                @endforeach
                            </select>
                        </div>
                        <hr>
                        <br>
                        <div class="form-group">
                            <label for="date">{{ __('Date') }}</label>
                            <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" required>
                            @error('date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <hr>
                        <div class="alert alert-primary d-flex align-items-center" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                         <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        <div>
                          For Adding Users Put Any Positive Number, For Removing Users Select Negative Number Of Users From DropDown
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="num_people">{{ __('Number of People') }}</label>
                            <input id="num_people" type="number" class="form-control @error('num_people') is-invalid @enderror" name="num_people" required>
                            @error('num_people')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="shift">{{ __('Shift') }}</label>
                            <select class="form-control" id="shift" name="shift">
                            @foreach ($shiftOptions as $value => $text)
                            <option value="{{ $value }}">{{ $text }}</option>
                            @endforeach
                            </select>
                            @error('shift')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <br>
                        <button type="submit" class="btn btn-secondary">
                            <i class="fa-regular fa-user"></i>{{ __('Add/Remove Users ') }}</button>
                        <button type="submit" class="btn btn-secondary">
                            <i class="fa-regular fa-user"></i>{{ __('Add Job ') }}</button>
                    </form>
                    <br>
                    </button>
                    <a href="/createJobDetails" class="btn btn-danger">Create Job Details</a>
            </div>
        </div>
    </div>
@endsection
