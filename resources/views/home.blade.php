@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Jobs and Entries</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Job Name</th>
                <th>Update Job</th>
                <th>Delete Job</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jobs as $job)
                <tr>
                    <td>{{ $job->job }}</td>
                    <td>
                        <a href="{{ '/editJob/'. $job->id }}">Edit Job</a>
                    </td>
                    <td>
                        <a href="{{ '/deleteJob/'. $job->id }}">Delete Job</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
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
                    <form method="POST" action="{{ route('createJob') }}">
                        @csrf
                        <div class="form-group">
                            <label for="date">{{ __('Job') }}</label>
                            <input id="job" type="text" class="form-control @error('job') is-invalid @enderror" name="job" required>
                            @error('job')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <hr>
                        <br>
                        <button type="submit" class="btn btn-secondary">
                            <i class="fa-regular fa-user"></i>{{ __('Add Job ') }}</button>
                    </form>
                    <br>
                    </button>
            </div>
        </div>
    </div>
@endsection
