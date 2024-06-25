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
        
           <div class="row">
            <div class="col-md-5">
              <div class="image-container">
                <img class="w-100 h-100" src="{{asset('assets/images/image.png')}}">
              </div>
           </div>
           <div class="col-md-7">
            <div class="form-side">
                <form class="form" id="myForm" method="post" action="{{ route('post_login') }}">
                    @csrf
                    @method('POST')
                    <div class="mb-1 d-flex justify-content-center align-items-center">
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
                    <div class="mb-1 d-flex flex-column justify-content-center align-items-center form-footer ">
                        <button type="submit" value="Login" id="validate" class=" submit xc bg-valider px-2 px-md-5 text-center rounded  py-2" id="button">Login</button>
                        
                    </div>
    
                </form>
                
            </div>
          
           </div>
       
        </div>
        <hr/>
        @include('layouts.footer')
    </div>
    
@endsection
