@extends('layouts.html')
<style>
    :root{
        --side-bg:bg-dark;
    }
    .side-container-bg{
        background:var(--side-bg);
    }
</style>
@section('body-container')

    <div class="container-scroller" style="background:rgb(208,225,231);">
        <!--sidebar-->
        @yield('sidebar')
       
        <div class="container-fluid page-body-wrapper" style="background:rgb(208,225,231);">
            @yield('navbar')
            

             <div class="main-panel side-container-bg">
                <div class="content-wrapper side-container-bg">
                  @yield('sidebar-container')
                
                </div>
            </div> 

        </div>
        
    </div>
    <script src="{{ asset('assets/vendor/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('assets/vendor/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/hoverable-collapse.js') }}"></script>
    {{-- <script src="{{ asset('assets/vendor/js/misc.js') }}"></script> --}}
    <script src="{{ asset('assets/vendor/js/settings.js') }}"></script>
    
    <script src="{{ asset('assets/vendor/js/dashboard.js') }}"></script>
    @endsection