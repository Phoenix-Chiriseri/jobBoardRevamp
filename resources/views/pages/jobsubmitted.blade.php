<x-layout bodyClass="bg-gray-200">

    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <!-- Navbar -->
                <x-navbars.navs.guest signin='login' signup='register'></x-navbars.navs.guest>
                <!-- End Navbar -->
            </div>
        </div>
    </div>
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-100"
            style="background-image: url('https://unsplash.com/photos/9g_8xy_d1ds');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container mt-5">
                <div class="row signin-margin">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                              
                            </div>
                            <div class="card-body">
                               <span class="form-class" style="padding-top: 3%"> Your details have been submitted successfully. Please check your email for approval</span>
                            </div>
                            <hr>
                            <a class="btn btn-success" href="/" style="margin-left: 5%;margin-bottom:5%"> Back Home</a>
                        </div>
                    </div>
                </div>
            </div>
            <x-footers.guest></x-footers.guest>
        </div>
    </main>
    @push('js')
<script src="{{ asset('assets') }}/js/jquery.min.js"></script>
<script>
$(function() {

var text_val = $(".input-group input").val();
if (text_val === "") {
  $(".input-group").removeClass('is-filled');
} else {
  $(".input-group").addClass('is-filled');
}
});
</script>
@endpush
</x-layout>
