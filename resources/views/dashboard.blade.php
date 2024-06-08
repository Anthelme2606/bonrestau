@extends('layouts.page')
@section('tittle', 'Dashboard')
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('content')
    <style>
        @keyframes blinking {
            0% {
                background: linear-gradient(to right, rgba(245, 250, 250, 0.96), white);
            }

            25% {
                background: linear-gradient(to right, rgba(255, 250, 250, 0.96), white);
            }

            50% {
                background: white;
                box-shadow: 0 0 10px white;
            }

            100% {
                opacity: 1;
            }

        }

        .card-blink {
            animation: blinking 4.25s ease-in-out infinite;
        }

        .dashboard {
            padding: 10px;
            background: var(--body-color);
            color: var(--text-color);
        }

        .dashboard .card {
            color: var(--text-color);
            border: none;
            border-bottom-style: solid;
            border-bottom-color: rgb(240, 20, 20);
            border-left-style: solid;
            border-left-color: rgb(20, 2, 250);

        }

        .card .card-icon {
            font: bold;
            background-color: white;
            color: blue;
        }

        .card:hover {
            transition: var(--tran-03);
        }

        .card-icon {
            color: blue;
        }
    </style>
    <div class="container">
        <div class="dashboard">
            <div class="row">
                @if (Auth::user()->user_type == 'admin')
                    <div class="col-md-4">
                        <div class="card card-blink">
                            <div class="card-body text-center">
                                <i class="bx bx-user card-icon"></i>
                                <h5 class="card-title mt-3"> Clients inscrits</h5>
                            </div>
                            <div class="card-footer text-center">
                                @if(isset($clients))
                                <span class="card-footer-number fw-2">{{$clients->count()}}</span>
                                 @else
                                 <span class="card-footer-number fw-2">0</span>
                                
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
                <!-- Card card-blink2 -->

                <div class="col-md-4">
                    <div class="card card-blink">
                        <div class="card-body text-center">
                            <i class="bx bx-group card-icon"></i>
                            <h5 class="card-title mt-3"> Comptes parrainés</h5>
                        </div>
                        <div class="card-footer text-center">
                            <span class="card-footer-number">{{Auth::user()->referrals->count()}}</span>
                        </div>
                    </div>
                </div>
                <!-- Card card-blink3 -->
                <div class="col-md-4">
                    <div class="card card-blink">
                        <div class="card-body text-center">
                            <i class="bx bx-bar-chart card-icon"></i>
                            <h5 class="card-title mt-3">Gain Journalier</h5>
                        </div>
                        <div class="card-footer text-center">
                            <span class="card-footer-number">{{Auth::user()->daily_percent}}%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (Auth::check() && Auth::user()->user_type == 'admin')
            <hr />
            @include('coupons.list',['coupons'=>$coupons])

        @endif
        <hr />
        @include('footer')
    </div>



@endsection
