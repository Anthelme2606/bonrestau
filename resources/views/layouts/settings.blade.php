@extends('layouts.page')
@section('tittle', 'Settings')
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('content')
    <style>
        .settings-container {
            border: none;
            color: var(--text-color);
            /* Text color */
        }

        .card {
            outline: none;
            border: none;
            display: flex;
            color: var(--text-color);
            flex-direction: column;
        }

        .card .card-body {
            border: none;
        }

        .modify-tool {
            outline: none;
            border: none;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-color: var(--primary-color-light);
            color: var(--text-color);
            /* Text color */

        }

        .modify-tool input {
            border: none;
        }

        .form {
            display: flex;
            /* Use flexbox for layout */
            flex-direction: column;
            /* Arrange elements in a column */
            align-items: center;
            /* Center align items */
            justify-content: center;
            /* Center items */
            padding: 20px;
            /* Add padding around the form */
            border: none;
            border-radius: 10px;
            /* Rounded corners */
            background-color: var(--primary-color-light);
            /* Background color */
            /*animation: slideIn 0.5s ease-in-out; /* Animation for form elements */
        }

        .form label {
            padding: 14px 10px;
            border-radius: 10%;
            font-weight: bold;
        }

        .form input {
            height: 40px;
            /* Set a fixed height */
            width: 100%;
            /* Full width of the form */
            padding: 0 10px;
            /* Padding inside the input */
            outline: none;
            /* Remove default outline */
            border: none;
            /* Remove all borders */
            border-bottom: 2px solid #ccc;
            /* Add only a bottom border */
            background-color: var(--primary-color-light);
            /* Background color */
            color: var(--text-color);
            /* Text color */
            font-size: 17px;
            /* Font size */
            font-weight: 500;
            /* Font weight */
            transition: var(--tran-05);
            /* Smooth transition for changes */
            margin-bottom: 20px;
            /* Space between inputs */
        }

        .block-tool {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .My-info {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            border: none;
            padding: 10px;
        }

        .My-info input {
            outline: none;
            border-style: solid;
            border-bottom-color: rgba(12, 12, 14, 0.5);

            border: none;

        }

        .bg-card {
            background-color: rgb(205, 205, 255);
            color: var(--text-color);
        }
    </style>

    <div class="container">
        <div class="settings-container">
            <div class="row ">
                <div class="col-md-9 modify-tool">
                    <div class="card mb-0">
                        <div class="card-header">
                            <h3>Recuperation Tool</h3>
                        </div>
                        <div class="card-body">
                            <form class="form">
                                <div class="mb-1">
                                    <label for="user-email-phone">Email</label>
                                    <input type="text" id="email" name="email" placeholder="***">
                                </div>
                                <div class="mb-1">

                                    <button type="button" id="user-email-phone" name="phone-email" class="btn btn-primary">
                                        Send
                                    </button>
                                </div>

                            </form>
                        </div>
                        
                        <div class="card-footer">
                            @if(Auth::check())
                            <h5 class="mt-2">Validate Bon</h5>
                            <div class="row">
                                @if(isset(Auth::user()->transactions))
                                @foreach(Auth::user()->transactions as $transactions)
                            
                                @foreach($transactions->bons as $bons)
                                <div class="col-md-6 my-4">
                                    <div class="card bg-card shadow">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <img class="rounded-circle px-2 py-2 mx-1 my-2" alt="card-img"
                                                    src="{{ asset('assets/images/bon-logo.png') }}" width="50"
                                                    height="50">
                                            </div>
                                            
                                            <p class="card-text">Expiration: <span class="text-danger">{{$bons->date}}</span></p>
                                            <p class="card-text">Valeur : <span class="font-weight-bold">{{$bons->price}} Fcfa</span>
                                                <p class="card-text">Code : <span class="font-weight-bold">{{$bons->code}}</span>
                                            
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endforeach
                                @endif
                                
                            </div>
                             @else
                             Any validate Bon
                            @endif
                        </div>

                        
                    </div>
                </div>
                @if(Auth::check())
                <div class="col-md-3 auth-info">
                    <div class="card">
                        <div class="card-header">
                            <img src="{{ asset('assets/images/logo.jpg') }}" class=" rounded-circle " alt="user"
                                style="width: 60px; height:60px;">
                            <span class="fw-4">{{Auth::user()->user_type}}</span>
                        </div>
                        <hr />
                        <div class="card-body">
                            <div class="My-info block-tool">
                                <h5>My information</h5>
                                <span class="fw-3">Email: {{Auth::user()->email}}</span>
                                <span class="">PhoneNumber: {{Auth::user()->phone}}</span>
                                <span class="text-success">ReferralCode: {{Auth::user()->referral_code}}</span>
                            </div>
                            <hr />
                            <div class="My-parrain block-tool">
                                <h5>My Parrain</h5>
                                @if(isset(Auth::user()->referrer))
                                <span class="fw-3">{{Auth::user()->referrer->email}}</span>

                                <span class="">{{Auth::user()->referrer->referral_code}}</span>
                                @else
                                <span>You do not have referrer</span>
                                @endif

                            </div>

                        </div>
                        <hr />
                        <div class="card-footer">

                            <div class="Account-parent">
                                <h4>My clients</h4>
                                <h5 class="fw-3"><span class="text-success">{{Auth::user()->referrals->count()}}</span> inscrit(s) avec mon code: {{Auth::user()->referral_code}}</h6>

                            </div>
                            <div class="solde mt-2 block-tool justify-content-center" style="width:100%;">

                                <h4>My Account</h4>
                                <span class="-content bg-light text-center"
                                    style="
                                display: flex;
            align-items: center;
            justify-content: center;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);">
                                    <span class="currency-text"
                                        style="font-size: 0.8em; 
                                word-wrap: break-word;">{{Auth::user()->balance}}
                                        FCFA</span>
                                </span>

                            </div>
                        </div>
                    </div>

                </div>
                @endif

            </div>

        </div>
        <hr />
        @include('layouts.footer')
    </div>

@endsection
