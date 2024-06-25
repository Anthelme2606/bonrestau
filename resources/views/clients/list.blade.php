@extends('layouts.page')
@section('tittle', 'Parrains')
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('content')
<style>
    .card{
        border:none;
        outline:none;

    }
</style>
    <div class="container">
        <div>
            <h4 class="tittle">Bienvenue au menu des parrains</h4>
            <p> Veuillez copiez et coller le code de l'un de ses utilisateurs pour les prendre en tant que parrain pour pourvoir s'inscrire merci.</p>
             <p>Vous pouvez voir aussi vos codes ici apres avoir été inscrit sur la plateform. </p>
             <p> Vous connaissez peut etre quelqu'un; amis de vous , proche..</p>
             <p><span  class="alert alert-info px-1 py-1 mx-4 my-4">Rappel !</span>un parrain est quelqu'un qui devient le sponsor d'un nouveau client nouvellement connecté</p>
             <p>Tappp!!!! c'est parti...</p>
            </div>
        <div class="row d-flex justify-content-center align-content-center">
            @if(isset($clients))
            @foreach($clients as $client)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header bg-white shadow rounded">
                       <span class="text-black fw-2">{{$client->name}}</span>
                    </div>
                    <div class="card-body shadow bg-dark text-white">
                        <span class="px-2 py-2 rounded mx-2 my-2">{{$client->referral_code}}</span>
                    </div>
                    <div class="card-footer">
                         {{$client->referrals->count()}} client(s)
                    </div>
                </div>
            </div>
            @endforeach
            @endif

        </div>

        <hr />
        @include('layouts.footer')
    </div>


@endsection
 <!--  @if (Auth::check() && Auth::user()->user_type == 'admin')-->
 <hr />
 @include('coupons.list',['coupons'=>$coupons])

@endif-->
<hr />
