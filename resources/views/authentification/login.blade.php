@extends('layouts.page')
@section('tittle', 'Login')
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('content')
<link rel="stylesheet" href="{{ asset('assets/auth/css/auth.css') }}">
    <script src="{{ asset('assets/auth/js/auth.js') }}"></script>
    <div class="container">
        <div class="form-container ">
            <form class="form" id="ajaxForm" method="post" action="{{ route('post_login') }}">
                @csrf
                @method('POST')
                <div class="mb-1">
                    <h2 class="">Login</h2>
                </div>
                <div class="mb-1  ">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="bon@gmail.com">
                </div>
                <div class="mb-1  ">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="***">
                </div>
                <div class="mb-1 form-footer ">
                    <button type="submit" class="login-btn" id="button">Login</button>
                    <div class="signup-text">
                        <span>Vous n'avez pas de compte?</span>
                        <a href="{{route('sign-up')}}" class="signup-link">Sign Up</a>
                    </div>
                </div>

            </form>
        </div>
        <hr/>
        @include('footer')
    </div>
    
@endsection
