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
        <div class="row  mx-auto">
            <div class="col-md-6 offset-md-2">
                <form  action="{{ route('add.job.details') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control border border-2 p-2" id="textbox" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label class="form-label">User email</label>
                        <input type="email" class="form-control border border-2 p-2" id="textbox" name="email" placeholder="Email address">
                    </div>
                    <div class="form-group">
                        <label class="form-label">User Phone-number</label>
                        <input type="text" class="form-control border border-2 p-2" id="textbox" name="phone_number" placeholder="Phone-number">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Job name</label>
                        <input type="text" class="form-control border border-2 p-2" id="textbox" name="job_name" placeholder="job_name" value="{{$available_jobs->job}}" readonly>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Work Shift</label>
                      <input type="text" class="form-control border border-2 p-2" id="textbox" name="shift" placeholder="shift" value="{{$shifts->shift}}" readonly>
                  </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-success btn-sm">Submit</button>
                        <a href="/" class="btn btn-success btn-sm">Back</a>
                    </div>
              </div>
            </form>
            </div>
        </div>
    </div> 
    <br><br> 
   
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
