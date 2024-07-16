@extends('layouts.index')
@include('layouts.dash-head')
@section('title','Validation')
@section('sidebar')
<x-sidebar/>

@endsection
@section('navbar')
<x-navbar/>
@endsection 
<style>
   .side-container-bg {
            background: rgba(245, 251, 252, 1);
        } .sidebar-bg{
        background:rgba(245,251,252,1);
    }
    .margin-top{
        margin-top: 65px;
    }
    
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

</style>
@section('sidebar-container')
@php 
if(Auth::check())
{
    $user=Auth::user();
}
@endphp
<div class="w-100 margin-top side-container-bg">
    <div class="login-container d-flex justify-center justify-content-center align-content-center align-items-center">
        <div class="login-card">
            
            <div class="image">
              <img src="{{asset('assets/images/logo-bonr.png')}}" alt="bon">
            </div>
            <h3 class="login-header">Modification du mot de passe</h3>
            <form  method="post" action="{{ route('post_update') }}">
              @csrf
              @method('POST')
              <div class="form-group">
                <i class="mdi mdi-account text-primary"></i>
                <input type="email" class="form-control" value="{{$user['email']}}" name="email" id="email"
                required readonly>
            </div>
                <div class="form-group">
                    <i class="mdi mdi-account text-primary"></i>
                    <input type="text" class="form-control" name="password" id="password"
                    placeholder="nouveau mot de passe" required>
                </div>
                <div class="form-group">
                    <i class="mdi mdi-lock text-primary"></i>
                    <input type="text" class="form-control" id="confirm" placeholder="confirmation du mot de passe" name="confirm" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block submiting w-100">Modifier</button>
            </form>
          
        </div>
      </div>
      
</div>

@endsection