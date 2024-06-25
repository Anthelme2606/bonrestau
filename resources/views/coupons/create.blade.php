@extends('layouts.page')
@section('tittle', 'Bon-Creation')
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/auth/css/auth.css') }}">
    <script src="{{ asset('assets/auth/js/auth.js') }}"></script>
   <link rel="stylesheet" href="{{asset('assets/css/bon.css')}}">
<script src="{{asset('assets/js/bon.js')}}"></script>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
               <div class="image-container">
                <img class="w-100 h-100" src="{{asset('assets/images/bon.png')}}"/>
               </div>
            </div>
            <div class="col-md-6">
            <div class=" form-container">
            <form class="form" id="ajaxForm" method="post" action="{{ route('bon-store') }}">
                 @csrf
                @method('POST')
                <div class="mb-1 d-flex justify-content-center align-items-center">
                    <h2 class="" style="color:orange">Bon</h2>
                </div>

                
                    <label for="valeur">Valeur</label>
                    <input type="number" id="valeur" name="price" placeholder="2000">
                    <label for="qte">Quantité</label>
                    <input type="number" id="qte" name="quantite" placeholder="4">
                    <label for="date">Date Expiration </label>
                    <input type="date" id="date" name="date">
               
                <div class="mb-1 form-footer ">
                    <button type="submit" class="rounded px-2 px-md-5 bg-valider" id="button">Créer un bon</button>
                </div>

            </form>
        </div>
            </div>
        </div>
        
        
         <!--
        <div class="row">
            <div class="col-md-3">
                <select class="price-select form-select px-2 py-2 mb-2 rounded shadow text-center">
                    <option selected>Filter Bon per price</option>
                    @if(isset($coupons))
                    @foreach($coupons as $coupon)
                    <option class="option-price" id="{{$coupon->id}}" value="{{$coupon->price}}" data-price="{{$coupon->price}}">{{$coupon->price}}</option>
                    
                    @endforeach
                    @endif
                </select>
                <select class=" date-select form-select px-2 py-2 mb-2  rounded shadow text-center">
                    <option selected>Filter Bon per date</option>
                    @if(isset($coupons))
                                    @foreach($coupons as $coupon)
                                    <option class=" option-date"value="{{$coupon->date}}">{{$coupon->date}}</option>
                                    
                                    @endforeach
                                    @endif
                </select>
                <div class="form-container">
                        <form class="form" action="{{route('bon-update')}}" method="post">
                           @csrf
                           @method('POST')
                           <div class="mb-1">
                            Update Bon
                        </div>
                            <div class="mb-1 w-100">
                                <select class="form-up-select form-select text-center rounded px-2 py-2 w-100">
                                    <option selected @readonly(true)>Price</option>
                                    @if(isset($coupons))
                                    @foreach($coupons as $coupon)
                                    <option id="{{$coupon->id}}" class="selection" value="{{$coupon->price}}" data-price="{{$coupon->price}}" data-date="{{$coupon->date}}" data-id="{{$coupon->id}}">{{$coupon->price}}</option>
                                    
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            
                            <div class="mb-1">
                                
                                <input type="number" id="up-id" value="" placeholder=" price" name="id" hidden readonly  required>
                            </div>
                            <div class="mb-1">
                                <label for="price">Valeur</label>
                                <input type="number" id="up-price" name="price" placeholder=" price" readonly  required>
                            </div>
                            <div class="mb-1">
                                <label for="up-date">Expiration Date</label>
                                <input type="date" id="up-date" name="date" required >
                            </div>
                            <div class="mb-1 form-footer ">
                                <button type="submit" class="login-btn" id="button">Update</button>
                            </div>
                        </form>
    
                    </div>
            </div>
           
            <div class="col-md-9">
                @if(isset($transactions))
                <div class="card historique-card">
                    <div class="card-header">
                        Historique
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Bon-coode</th>
                                        <th>Bon-price</th>
                                        <th>Bon-Date</th>
                                        <th>Bon-percent</th>
                                        <th>User-code</th>
                                        <th>Date-validation</th>
                                        <th>status</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($transactions as $trans)
                                    <tr class="line-transaction opacity_1 " data-price="{{$trans->bon->price}}" data-bondate="{{$trans->bon->date}}" >
                                        <td>{{$trans->bon->code}}</td>
                                        <td>{{$trans->bon->price}}</td>
                                        <td>{{$trans->bon->date}}</td>
                                        <td class="text-center">{{$trans->percent}}%</td>
                                        <td title="{{$trans->user->name}}">{{$trans->user->referral_code}}</td>
                                        <td>{{$trans->created_at}}</td>
                                        <td class="status">{{$trans->bon->status($trans)}}</td>
                                    </tr>
                                    @endforeach
                                    
                                    
                                </tbody>
                            </table>
                            
                        </div>
                        
                    </div>
                    
                    <div class="card-footer">
                        <a href="#" class="btn button-green"><i class="material-icons">cloud_download</i> Download Historique</a>
                    </div>
                </div> 
                @endif
                
            </div>
        </div>
      -->
        
    </div>


@endsection
