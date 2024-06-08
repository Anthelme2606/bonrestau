@extends('layouts.page')
@section('tittle','Home')
@section('navbar')
@include('layouts.navbar')
@endsection
@section('sidebar')
@include('layouts.sidebar')
@endsection
@section('content')


<div class="container">
    <div class="content">
        <h1 class="bg-span">WELCOME TO YOUR RESTAURANT  VOUCHER MANAGEMENT</h1>
        <div class="row grid-content">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="step">
                            <i class='bx bx-user'></i>
                            <p>1. Create your account</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="step">
                            <i class='bx bx-log-in'></i>
                            <p>2. Log in</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="step">
                            <i class='bx bx-food-menu'></i>
                            <p>3. Track your voucher</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="step">
                            <i class='bx bx-money'></i>
                            <p>4. Redeem your voucher</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="step">
                            <i class='bx bx-support'></i>
                            <p>5. Contact support</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <hr />
        @include('footer')
    </div>
</div>

<link rel="stylesheet" href="{{asset('assets/css/home.css')}}"></link>
@endsection