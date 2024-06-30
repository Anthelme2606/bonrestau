<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} | @yield('tittle')</title>
    <link rel="stylesheet" href="{{asset('assets/layouts/css/style.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('build/assets/app-CGTGA1v5.js') }}" defer></script> 

    {{-- <link rel="stylesheet" href="{{ asset('build/assets/app-B35vxE7q.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('build/assets/app-D8Jz5B4_.css') }}"> 
    <script src="{{asset('assets/layouts/js/script.js')}}"></script> 
     
    <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
 
    <div class="text">
        @yield('navbar')
    </div>
    <div class="aside">
        @yield('sidebar')
    </div>
 <section class="home small-screen text">
   @yield('content')
</section>

   
  
        @if(session('error'))
            toastr.error("{{ session('error') }}");
        @endif

        @if(session('success'))
            toastr.success("{{ session('success') }}");
        @endif

        
        
</body>

</html>