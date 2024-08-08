@extends('layouts.html')
<style>
    :root {
        --side-bg: bg-dark;
    }
    
    .side-container-bg {
        background: var(--side-bg);
        width: 100%;
    }

    .container-fluid.page-body-wrapper {
        display: flex;
    }

    .main-panel {
        flex-grow: 1;
    }

    .content-wrapper {
        width: 100%;
        padding: 20px; /* Ajustez si nécessaire */
    }
    .container-fluid.page-body-wrapper,
.container-fluid.page-body-wrapper  {
    margin-right: 0 !important;
    padding-right: 0 !important;
    margin-left: 0 !important;
    padding-left: 0 !important;
    display: flex;
    justify-content:center;
    align-items: center
    flex-direction:column;
   
}

</style>

@section('body-container')

    <div class="container-scroller" style="background: rgb(208, 225, 231);">
        <!--sidebar-->
        @yield('sidebar')

        <div class="container-fluid page-body-wrapper" style="background: rgb(208, 225, 231);">
            @yield('navbar')

            <div class="main-panel side-container-bg">
                <div class="content-wrapper side-container-bg w-100">
                    @yield('sidebar-container')
                </div>
            </div>

        </div>

    </div>

    <script src="{{ asset('assets/vendor/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('assets/vendor/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/settings.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/dashboard.js') }}"></script>
@endsection
