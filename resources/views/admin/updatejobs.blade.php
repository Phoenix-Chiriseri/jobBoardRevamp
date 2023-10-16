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
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0"  id = "pdf-content">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase  text-xxs font-weight-bolder" style="color:black;">Name</th>
                                        <th class="text-uppercase  text-xxs font-weight-bolder" style="color:black;">Created At</th>
                                        <th class="text-uppercase  text-xxs font-weight-bolder" style="color:black;">Update Job</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jobs as $job)
                                        <tr>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0" style="color:black;">{{ $job->job }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs  mb-0" style="color:black;">{{ $job->created_at }}</p>
                                            </td>
                                           
                                            <td class="align-middle">
                                                <a href="javascript:;" class="text-secondary font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit user" style="color:black;">
                                                    <a href="{{ '/updateJob/'. $job->id }}" class = "btn btn btn-outline-dark"><i class = "fa fa-plus"></i>Updated Job Request</a>
                                                </a>
                                            </td>
                                          
                                        </tr>
                                    @endforeach
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-footers.auth></x-footers.auth>
    </div>
    <x-plugins></x-plugins>

</x-layout>
