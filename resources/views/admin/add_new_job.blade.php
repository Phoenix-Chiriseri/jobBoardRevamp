<x-layout bodyClass="g-sidenav-show bg-gray-200">

    <x-navbars.sidebar activePage="create-job"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='Create Job'></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid px-2 px-md-4">
            <div class="page-header min-height-300 border-radius-xl mt-4"
            style="background-image: url('{{ asset('assets/img/banna.png') }}'); background-size: cover;">

            </div>
            <div class="card card-body mx-3 mx-md-4 mt-n6" style="box-shadow:2px 2px 4px 4px; black;">
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
                        <form method='POST' action='{{ route('submitjob') }}'>
                            @csrf
                            <div class="row"> 
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Job Name</label>
                                    <input type="text" name="job_name" class="form-control border border-2 p-2">
                                    @error('job_name')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>  
                            </div>
                            <div class="row"> 
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Job Description</label>
                                    <input type="text" name="job_description" class="form-control border border-2 p-2">
                                    @error('job-description')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>  
                            </div>
                            <div class="row"> 
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Required People</label>
                                    <input type="text" name="num_of_people" class="form-control border border-2 p-2">
                                    @error('num_of_people')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>  
                            </div>
                            <div class="row"> 
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Shift</label>
                                    <select class="form-control  border border-2 p-2" name="shift" id="shift">
                                        <option class="form-group" value="MorningShift">Morning Shift</option>
                                        <option class="form-group" value="LateShift">Late Shift</option>
                                        <option class="form-group" value="LongDayShift">LongDay Shift</option>
                                        <option class="form-group" value="NightShift">Night Shift</option>
                                       </select>
                                    @error('num_of_people')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>  
                            </div>
                            <div class="row"> 
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Job Location</label>
                                    <input type="text" name="location" class="form-control border border-2 p-2">
                                    @error('location')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>  
                            </div>
                            <div class="row"> 
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Date</label>
                                    <input type="date" name="date" class="form-control border border-2 p-2">
                                    @error('date')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>  
                            </div>
                            <button type="submit" class="btn bg-gradient-dark">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <x-footers.auth></x-footers.auth>
    </div>
    <x-plugins></x-plugins>

</x-layout>
