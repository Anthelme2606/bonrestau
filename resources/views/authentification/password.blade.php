@extends('layouts.html')
@section('title','Nouveau mot de passe')
@section('body-container')
<link 
rel="stylesheet" 
href="{{ asset('assets/vendor/vendors/mdi/css/materialdesignicons.min.css') }}?v=<?php echo time(); ?> ">

<style>
        
   
  
        .login-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
  .login-card {
    
      width: 100%;
      max-width: 400px;
      padding: 20px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      background: rgb(245, 248, 250);
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
input{
    background:white;
    color:black;
}
@keyframes rotate {
    from {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(360deg);
    }
}
.invalid{
    border:1px solid red;
}
.valid{
    border:1px solid green;
}
.error {
            color: red;
        }

</style>
<div class="login-container d-flex justify-center justify-content-center align-content-center align-items-center">
  <div class="login-card">
      
      <div class="image">
        <img src="{{asset('assets/images/logo-bonr.png')}}" alt="bon">
      </div>
      <h3 class="login-header">Réinitialiser le mot de passe</h3>
      <form  method="post" action="{{ route('password.reset') }}" id="passwordForm">
        @csrf
        @method('POST')
          <div class="form-group">
              <i class="mdi mdi-lock text-primary"></i>
              @php
               $email = session('email');
               @endphp

              <input type="text" class="form-control" value="{{$email ?? old('email')}}" name="email" id="email" hidden readonly>
              <input type="text" class="form-control" name="password" id="password"
              placeholder="password" required>
          </div>
          <div class="form-group">
            <i class="mdi mdi-lock text-primary"></i>
            <input type="text" class="form-control" name="confirm" id="confirm"
            placeholder="confirmation" required>
        </div>
        <div class="form-group">
            <div id="error-message" class="error"></div>
        </div>
          <button type="submit" class="btn btn-primary btn-block submiting w-100">Réinitialiser</button>
      </form>
   
  </div>
</div>

<script>
    document.getElementById('passwordForm').addEventListener('submit', function(event) {
        var password = document.getElementById('password').value;
        var confirm = document.getElementById('confirm').value;
        var errorMessage = document.getElementById('error-message');
        errorMessage.textContent = ''; // Clear previous error messages

        if (password.length < 8) {
            errorMessage.textContent = 'Le mot de passe doit contenir au moins 8 caractères.';
            event.preventDefault(); // Prevent form submission
        } else if (password !== confirm) {
            errorMessage.textContent = 'Les mots de passe ne correspondent pas.';
            event.preventDefault(); // Prevent form submission
        }
    });
</script>

  @endsection
