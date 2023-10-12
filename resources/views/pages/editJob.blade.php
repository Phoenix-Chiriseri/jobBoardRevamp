<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="user-profile"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='User Profile'></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid px-2 px-md-4">
            <div class="page-header min-height-300 border-radius-xl mt-4"
                style="background-image: url('{{ asset('assets/img/mybanna.png') }}');">

            </div>
            <div class="card card-body mx-3 mx-md-4 mt-n6">
                <div class="row gx-4 mb-2">
                   
                
                <div class="card card-plain h-100">
                 
                    <div class="card-body p-3">
                        @if (session('status'))
                        <div class="row">
                            <div class="alert alert-success alert-dismissible text-white" role="alert">
                                <span class="text-sm">{{ Session::get('status') }}</span>
                                <button type="button" class="btn-close text-lg py-3 opacity-10"
                                    data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                        @endif
                        @if (Session::has('demo'))
                                <div class="row">
                                    <div class="alert alert-danger alert-dismissible text-white" role="alert">
                                        <span class="text-sm">{{ Session::get('demo') }}</span>
                                        <button type="button" class="btn-close text-lg py-3 opacity-10"
                                            data-bs-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                        @endif
                        <form method='POST' action='{{ route('submitJobDetails') }}'>
                            @csrf
                            <div class="row"> 
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Date</label>
                                    <input type="date" name="date" class="form-control border border-2 p-2" required>
                                    @error('date')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>  
                            </div>
                            <p class = "text-center"><strong class = "text-center">For Adding Users:</strong> Put any positive number.</p>
                            <p class = "text-center"><strong class = "text-center">For Removing Users:</strong> Select a negative number of users from the dropdown.</p>
                            <div class="row"> 
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Number Of People</label>
                                    <input type="text" name="num_people" class="form-control border border-2 p-2" required>
                                    @error('num_people')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>  
                            </div>
                            <div class="form-group">
                                <label for="shift">{{ __('Shift') }}</label>
                                <select class="form-control border border-2 p-2" id="shift" name="shift">
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
                            <input type="hidden" value = "{{$job->id}}" name="id">
                            <br>
                            <button type="submit" class="btn bg-gradient-dark">Submit</button>
                            <a href="{{ route('dashboard') }}" class="btn btn-outline-dark">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <x-footers.auth></x-footers.auth>
    </div>
    <x-plugins></x-plugins>

</x-layout>
