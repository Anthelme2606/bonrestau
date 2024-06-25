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
            height: 100vh;
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
                    <h4>Créer une transaction ici</h4>
               </div>
               
                    <label for="user_code" class="form-label">Code d'utilisateur</label>
                    <input type="text" class="" id="user_code" name="user_code" required>
                
               
                    <label for="coupon_code" class="form-label">Code du Coupon</label>
                    <select class="form-control" id="coupon_code" name="coupon_price" required>
                        <option value="" disabled selected>Selectionnez coupon par son prix..</option>
                       @if(isset($coupons))
                       @foreach($coupons as $coupon)
                       <option value="{{$coupon->price}}">{{$coupon->price}}</option>
                     
                       @endforeach
                       @endif
                    </select>
                
               
                    <label for="qte" class="form-label">quantité</label>
                    <input type="number" step="0.01" class="" id="qte" name="quantite" value="1"  required>
                
               
                    <label for="percent" class="form-label">Gain pourcent(%)</label>
                    <input type="number" step="0.01" class="" id="percent" value="5" name="percent" required>
                
                <button type="submit" class="px-2 px-md-5 bg-valider rounded">Lancer la transaction</button>
            </form>
        </div>
    </div>
   

@endsection