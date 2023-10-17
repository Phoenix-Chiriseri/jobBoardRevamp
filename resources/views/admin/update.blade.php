<script>
   console.log('How are you');
</script>
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
                                
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Required People</label>
                                    <input type="text" name="num_people" class="form-control border border-2 p-2" id="num_people" value="{{$job_details->num_people}}"  onkeyup="calculate()"  required readonly>
                                    @error('num_people')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>  
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Requested People</label>
                                    <input type="text" name="requested_people" class="form-control border border-2 p-2" id="requested_people" onkeyup="calculate()" required>
                                    @error('requested_people')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div> 
                            </div>
                            <div class="row"> 
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Remaining People</label>
                                    <input type="text" name="remaining_people" class="form-control border border-2 p-2" id="remaining_people" required readonly>
                                    @error('remaining_people')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>  
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Shift</label>
                                    <input type="text" name="shift" class="form-control border border-2 p-2" id="shift" value="{{$job_details->shift}}" required readonly>
                                    @error('shift')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div> 
                              
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Date</label>
                                    <input type="date" name="date" class="form-control border border-2 p-2" required>
                                    @error('date')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>  
                            </div>
                     
                            {{-- <input type="hidden" value = "{{$jobs->id}}" name="id"> --}}
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
