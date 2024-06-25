<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} | @yield('tittle')</title>
    <link rel="stylesheet" href="{{asset('assets/layouts/css/style.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @vite(['resources/css/app.css','resources/js/app.js'])
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

        <script src="{{asset('assets/layouts/js/script.js')}}"></script>  
</body>

</html>