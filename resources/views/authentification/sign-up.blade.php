@extends('layouts.page')
@section('tittle', 'Sign-up')
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('content')
    <!--Place the css and js here for loadind correctly the file-->
    <style>
      form .bottom_border_error{
            border:none;
            outline: none;
            border-bottom-style:solid;
            border-bottom-color:red; 
        }
    </style>
    <link rel="stylesheet" href="{{ asset('assets/auth/css/auth.css') }}">
    <script src="{{ asset('assets/auth/js/auth.js') }}"></script>
    <div class="container">
        <div class="form-container">
            <form class="form signup-form" id="ajaxForm" method="post" action="{{ route('post_sign_up') }}">
                @csrf
                @method('POST')
                <div class="mb-1">
                    <h2 class="">Sign Up</h2>
                </div>
                <div class="mb-1  ">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="name" placeholder="amah" required>
                </div>
                <div class="mb-1  ">
                    <label for="phone">Phone Number</label>
                    <input type="phone" id="phone" name="phone" placeholder="97******" required>
                </div>
                <div class="mb-1  ">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="bon@gmail.com" required>
                </div>

                <div class="mb-1  ">
                    <label for="password">Password (min 8)</label>
                    <input type="password" id="password" name="password" placeholder="***" required>
                </div>
                <div class="mb-1  ">
                    <label for="confirm">confirm your password</label>
                    <input type="password" id="confirm" name="confirm" placeholder="***" required>
                </div>
                <div class="mb-1  ">
                    <label for="referral">referral code</label>
                    <input type="text" id="referral" name="referrer_code" required>
                </div>
                <div class="mb-1 form-footer ">
                    <button type="submit" class="login-btn" id="button">Sign Up</button>
                    <div class="signup-text">
                        <span>Vous avez compte déja?</span>
                        <a href="{{ route('login') }}" class="signup-link">Login</a>
                    </div>
                </div>

            </form>
        </div>
        <hr />
        @include('footer')
    </div>

@endsection
