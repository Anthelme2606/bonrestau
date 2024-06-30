<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} | @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
    @if (!Route::is('dashboard'))
        @include('layouts.head')
    @endif
    @if (Route::is('dashboard'))
        @include('layouts.dash-head')
    @endif
    <!--CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body style="background:rgba(245,251,252,1)">
    
    <div class="content-global">
        @yield('body-container')
    </div>
    <x-spinner/>
    
    
    <x-toastr />

</body>

</html>
