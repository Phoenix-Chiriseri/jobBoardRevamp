<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Container wrapper -->
    <div class="container-fluid">
      <!-- Toggle button -->
      <button
        class="navbar-toggler"
        type="button"
        data-mdb-toggle="collapse"
        data-mdb-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="fas fa-bars"></i>
      </button>
      <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Navbar brand -->
        <a class="navbar-brand mt-2 mt-lg-0" href="/">
          <img
            src="{{ asset('assets') }}/img/weKareLogo.png"
            height="50"
            alt="MDB Logo"
            loading="lazy"
          />
        </a>
        <!-- Left links -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="/">View All Jobs</a>
          </li>
        </ul>
        <!-- Left links -->
      </div>
      <!-- Collapsible wrapper -->
  
      <!-- Right elements -->
      <div class="d-flex align-items-center">
        <!-- Icon -->
        <a class="text-reset me-3" href="{{route('login')}}">
          <i class="fas fa-user"> Login </i>
        </a>
        <!-- Notifications -->
        <!-- Avatar -->
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->
<x-layout bodyClass="bg-gray-200" style="margin-top: 22px;">
    <div class="container" style="margin-top: 100px;">
        <div class="row mx-auto">
            <div class="col-md-6 offset-md-2">
                <form action="{{ route('search-job') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control border border-2 p-2" id="textbox" name="search_job" placeholder="Search Job">
                    </div>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-success btn-sm">Search</button>
                </div>
                </form>
            </div>
        </div>
    </div> 
    <br><br> 
    <div class="main-content d-flex justify-content-center align-items-center bg-gray-100 min-vh-100" style="margin-top: -200px;">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 mt-4">
                    <div class="mb-5 ps-3 text-center">
                    </div>
                    <div class="row justify-content-center">
                        @foreach ($jobs as $job)
                        <div class="col-xl-4 col-md-6 mb-xl-4 mb-4">
                            <div class="card card-cascade narrower">
                                <!-- Card image -->
                                <div class="view view-cascade overlay">      
                                    <a>
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>
                                <!-- Card content -->
                                <div class="card-body card-body-cascade">
                                    <p class="mb-0 text-sm">Job Name</p>
                                    <a href="javascript:;">
                                        <h5>{{ $job->job }}</h5>
                                    </a>
                                    <p class="mb-2 text-sm"></p>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                           
                                        </div>
                                        <a type="button" href="{{ '/viewJob/'. $job->id }}" class="btn btn-success btn-sm mb-0"><i class="fa fa-users fa-2x"></i>View Workers</a>
                                    </div>
                                    <div class="avatar-group mt-2">
                                        <!-- Add your avatar images here -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>

<style>
    .main-content {
        min-height: 100vh;
    }

    .card-blog {
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        border: none;
    }
</style>
