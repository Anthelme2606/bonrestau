@extends('layouts.html')
@section('body-container')
<link rel="stylesheet"
href="{{ asset('assets/vendor/vendors/mdi/css/materialdesignicons.min.css') }}?v=<?php echo time(); ?> ">
<link rel="stylesheet" href="{{ asset('assets/vendor/vendors/css/vendor.bundle.base.css') }}?v=<?php echo time(); ?>">

<link rel="stylesheet" href="{{ asset('assets/vendor/vendors/jvectormap/jquery-jvectormap.css') }}?v=<?php echo time(); ?> ">
<link rel="stylesheet"
href="{{ asset('assets/vendor/vendors/flag-icon-css/css/flag-icon.min.css') }}?v=<?php echo time(); ?>">
<link rel="stylesheet"
href="{{ asset('assets/vendor/vendors/owl-carousel-2/owl.carousel.min.css') }}?v=<?php echo time(); ?>">
<link rel="stylesheet"
href="{{ asset('assets/vendor/vendors/owl-carousel-2/owl.theme.default.min.css') }}?v=<?php echo time(); ?>">

<link rel="stylesheet" href="{{ asset('assets/vendor/css/style.css') }}?v=<?php echo time(); ?>">

    <div class="container-scroller" style="background:rgb(208,225,231);">
        <!--sidebar-->
        @yield('sidebar')
       
        <div class="container-fluid page-body-wrapper" style="background:rgb(208,225,231);">
            @yield('navbar')
            

             <div class="main-panel bg-dark">
                <div class="content-wrapper bg-dark">
                  @yield('sidebar-container')
                
                </div>
            </div> 

        </div>
        
    </div>
    <script src="{{ asset('assets/vendor/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('assets/vendor/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/misc.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/settings.js') }}"></script>
    
    <script src="{{ asset('assets/vendor/js/dashboard.js') }}"></script>
    @endsection