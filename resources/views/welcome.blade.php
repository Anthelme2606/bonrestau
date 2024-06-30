@extends('layouts.page')
@section('tittle','Home')
@section('navbar')
@include('layouts.navbar')
@endsection
@section('sidebar')
@include('layouts.sidebar')
@endsection
@section('content')

<link rel="stylesheet" href="{{asset('assets/css/home.css')}}?v=<?php echo time(); ?>">
<div class="container">
    <div class="content">
    
        <h1 class="bg-span">BIENVENUE DANS VOTRE APPLICATION DE GESTION DES BONS DE RESTAURANT</h1>
        <div class="row row-cols-1 row-cols-md-3 g-1">
            <div class="col">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="step">
                            <i class='bx bx-user'></i>
                            <p>1. Créez votre compte</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="step">
                            <i class='bx bx-log-in'></i>
                            <p>2. Se connecter</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="step">
                            <i class='bx bx-food-menu'></i>
                            <p>3. Suivre l'état de votre bon</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="step">
                            <i class='bx bx-money'></i>
                            <p>4. Profiter de votre bon</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="step">
                            <i class='bx bx-support'></i>
                            <p>5.Contacter le support en cas d'aide</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <x-login-modal/>
        <x-list-scroll/>
        <x-rotatings-cards />

        <hr />
        @include('layouts.footer')
    </div>
</div>

@endsection