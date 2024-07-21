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
    <meta name="google-site-verification" content="XlL6Hde6-hJL2HiYzL6ZvmvO6hfxLShfCHASRxhIUrc" />
    <title>{{ config('app.name') }} | @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
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
    <x-spinner />


    <x-toastr />

</body>

</html>
