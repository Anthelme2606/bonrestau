@extends('layouts.page')
@section('tittle', 'Bon-Creation')
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('content')
<link rel="stylesheet" href="{{asset('assets/auth/css/auth.css')}}">
<style>
    
    
</style>
<style>
        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            max-width:500px;
          
        }
        .form-box {
            border:none;
            outline:none;
            width:100%;
            
            padding: 20px;
            background-color: white;
        }
      
        .form-label {
            margin-top: 10px;
        }
        .btn-primary {
            background-color: gold;
            border-color: gold;
            margin-top: 20px;
        }
        .btn-primary:hover {
            background-color: #d4af37;
            border-color: #d4af37;
        }
    </style>
   
    <div class="container form-container">
        <div class="form-box">
            <form id="myForm" action="{{route('trans-store')}}" method="POST">
                @csrf
                @method("POST")
                <div class="mb-3 d-flex justify-content-center align-items-center">
                    <h4>Génerer un lien de parrainage ici</h4>
               </div>
               
                    <label for="code" class="form-label">Lien de parrainage</label>
                    <input type="text" class="" id="code" name="user_code" required>
                
               
                   
                
               
        
               
                    
                <button type="button" class="px-2 px-md-5 bg-valider rounded">Générer</button>
            </form>
        </div>
    </div>
   

@endsection