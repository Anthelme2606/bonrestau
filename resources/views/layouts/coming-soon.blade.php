@extends('layouts.html')
@section('title','Coming-soon')
@section('body-container')
<div class="container d-flex justify-content-center align-items-center min-vh-100 bg-body">
    <div class="row">
        <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <div class="card bg-body border-0 shadow-lg position-relative">
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{ asset('assets/images/coming-soon.png') }}" alt="Coming Soon" class="img-fluid">
                    </div>
                </div>
                <div class="card-border-animation"></div>
            </div>
        </div>
    </div>
</div>

<style>
    .card-border-animation {
    position: absolute;
    top: -10px;
    left: -10px;
    right: -10px;
    bottom: -10px;
    border: 5px solid #ffd700;
    border-radius: 10px;
    animation: cardBorderAnimation 5s linear infinite;
}

@keyframes cardBorderAnimation {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}

    .bg-body{
        background:rgb(208,225,231);
    }
    body{
        background:rgb(208,225,231);
    }
</style>
@endsection