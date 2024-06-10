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
                <div class="alert alert-info">
                    <h4 class="alert-heading">Create Your Restaurant Voucher</h4>
                    <p>
                        Welcome! You are just a few steps away from creating a voucher for your restaurant. 
                        Please fill in the required details to generate a personalized voucher that your customers can use to enjoy discounts and special offers.
                    </p>
                    <hr>
                    <p class="mb-0">
                        <strong>Instructions:</strong>
                        <ul>
                            <li>Enter the voucher value (price) that customers can redeem.</li>
                            <li>Specify the expiration date for the voucher.</li>
                            <li>Once completed, click on the 'Create Voucher' button to finalize.</li>
                        </ul>
                    </p>
                    <p>
                        Need help? Contact our support team at <a href="mailto:christianedorh@gmail.com">support</a>.
                    </p>
                </div>
            </div>
            <div class="col-md-6">
            <div class=" form-container">
            <form class="form" id="ajaxForm" method="post" action="{{ route('bon-store') }}">
                 @csrf
                @method('POST')
                <div class="mb-1">
                    <h2 class="">Bon</h2>
                </div>

                <div class="mb-1">
                    <label for="valeur">Value</label>
                    <input type="number" id="valeur" name="price" placeholder="2000">
                </div>
                <div class="mb-1  ">
                    <label for="date">Expiration Date</label>
                    <input type="date" id="date" name="date">
                </div>
                <div class="mb-1 form-footer ">
                    <button type="submit" class="login-btn" id="button">Create Voucher</button>
                </div>

            </form>
        </div>
            </div>
        </div>
        
        <hr />
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
      
        

        <hr />
        @include('footer')
    </div>


@endsection
