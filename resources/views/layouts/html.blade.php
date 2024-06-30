<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} | @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
    <link rel="stylesheet" href="{{ asset('build/assets/app-B35vxE7q.css') }}">
   <link rel="stylesheet" href="{{ asset('build/assets/app-D8Jz5B4_.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body style="background:rgba(245,251,252,1)">
@yield('body-container')
<x-toastr/>
<script src="{{ asset('build/assets/app-CGTGA1v5.js') }}" defer></script>
</body>
</html>    