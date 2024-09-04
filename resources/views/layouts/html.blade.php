<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta property="og:title" content="GREEN DETOX">
    <meta property="og:description" content="Rejoignez notre communauté.">
    <meta property="og:image" content="{{ asset('assets/images/logo-bonr.png') }}">
    <meta property="og:url" content="{{ route('home') }}">
    <meta property="og:type" content="website">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    
    <meta name="google-site-verification" content="XlL6Hde6-hJL2HiYzL6ZvmvO6hfxLShfCHASRxhIUrc" />
    <title>{{ config('app.name') }} | @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flag-icon-css@4.1.7/css/flag-icons.min.css"
    integrity="sha256-8qup5VqQKcE2cLILwBU2zpXUkT+eW5tI1ZLzJjh/TdY=" crossorigin="anonymous">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    @if (!Route::is('dashboard'))
        @include('layouts.head')
    @endif
    @if (Route::is('dashboard'))
        @include('layouts.dash-head')
    @endif
    <!--CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .content-global{
            display:none;
        }
    </style>

</head>

<body style="background:rgba(245,251,252,1)">
    <x-loader />
    <div class="content-global">
        @yield('body-container')
    </div>
  


    <x-toastr />

</body>

</html>
