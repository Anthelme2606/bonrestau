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
            <form id="myForm" action="{{route('bon-ravita')}}" method="POST">
                @csrf
                @method("POST")
                <div class="mb-3 d-flex justify-content-center align-items-center">
                    <h4>Ravitailler un bon ici</h4>
               </div>
               
                    
                    <label for="coupon_code" class="form-label">Prix du Coupon</label>
                    <select class="form-control" id="coupon_code" name="coupon_price" required>
                        <option  disabled selected>Selectionnez coupon par  son prix</option>
                       
                        @foreach($coupons as $coupon)
                        <option id="{{$coupon->id}}" value="{{$coupon->price}}">{{$coupon->price}}</option>
                        @endforeach
                        
                    </select>
                
               
                    <label for="qte" class="form-label">Quantitté</label>
                    <input type="number" class="" id="qte" name="quantite"  required>
                
               
                  
                <button type="submit" class="px-2 px-md-5 bg-valider rounded">Ravitailler</button>
            </form>
        </div>
    </div>
   

@endsection