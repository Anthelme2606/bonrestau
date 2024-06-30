@extends('layouts.html')
@section('body-container')
<link href="{{ asset('assets/vendor/vendors/mdi/css/materialdesignicons.min.css') }}?v=<?php echo time(); ?> ">
<link rel="stylesheet"
href="{{ asset('assets/vendor/vendors/mdi/css/materialdesignicons.min.css') }}?v=<?php echo time(); ?> ">
<link rel="stylesheet" href="{{ asset('assets/vendor/vendors/css/vendor.bundle.base.css') }}?v=<?php echo time(); ?>">

<style>
  body, html {
      height: 100%;
    
     
  }
  .login-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100%;
  }
  .login-card {
      width: 100%;
      max-width: 400px;
      padding: 20px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      background: #18170b;
      border-radius: 8px;
  }
  .login-header {
      text-align: center;
      margin-bottom: 20px;
      color: #007bff;
  }
  .form-group {
      position: relative;
      margin-bottom: 1.5rem;
  }
  .form-group .mdi {
      position: absolute;
      left: 10px;
      top: 50%;
      transform: translateY(-50%);
      color: #007bff;
  }
  a{
    text-decoration: none;
  }
  .form-control {
      padding-left: 40px;
      border: none;
      border-bottom: 2px solid #007bff;
      border-radius: 0;
      transition: border-color 0.3s;
  }
  .form-control:focus {
      box-shadow: none;
      border-color: #0056b3;
  }
  .login-footer {
      text-align: center;
      margin-top: 20px;
  }
  .image {
    display: flex;
    justify-content: center;
    align-items: center;
}

.image img {
    width: 100px;
    height: 100px;
    animation: rotate 5s linear infinite;
}

@keyframes rotate {
    from {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(360deg);
    }
}

</style>
<div class="login-container">
  <div class="login-card">
      
      <div class="image">
        <img src="{{asset('assets/images/logo-bonr.png')}}" alt="bon">
      </div>
      <h3 class="login-header">Connexion</h3>
      <form  method="post" action="{{ route('post_login') }}">
        @csrf
        @method('POST')
          <div class="form-group">
              <i class="mdi mdi-account text-primary"></i>
              <input type="text" class="form-control" name="email"
              placeholder="Email">
          </div>
          <div class="form-group">
              <i class="mdi mdi-lock text-primary"></i>
              <input type="password" class="form-control" placeholder="Password" name="password">
          </div>
          <button type="submit" class="btn btn-primary btn-block w-100">Se connecter</button>
      </form>
      <div class="login-footer">
          <a href="#">Mot de passe oublié ?</a><br>
          <span class="text-white">Vous n'aviez pas de compte? <a href="{{route('sign-up')}}">S'inscrire</a></span>
      </div>
  </div>
</div>


  @endsection
