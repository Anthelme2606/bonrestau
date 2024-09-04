@extends('layouts.index')
@include('layouts.dash-head')
@section('title', 'utilisateurs.actifs')
@section('sidebar')
    <x-sidebar />

@endsection
@section('navbar')
    <x-navbar />
@endsection

@section('sidebar-container')
    <style>
        .side-container-bg {
            background: rgba(245, 251, 252, 1);
        }

      

        

        body {
            background-color: #f8f9fa;
        }
        .card {
            border: none;
            border-radius: 4px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            color: orange;
            font-weight: bold;
        }

        .card-text {
            color: #333;
        }

        .card-footer {
            background-color: #f7f7f7;
            border-top: none;
            color: #555;
        }

        .card-body {
            padding: 20px;
        }

       
      

       
    </style>
@php
$user =Auth::user();
@endphp
    <div class="w-100 side-container-bg">
        <div class="w-100">
            @if(isset($user->client->transactions))
            <div class="row row-cols-1 row-cols-md-4 g-4">
                <!-- Card 1 -->
                @foreach($user->client->transactions as $tr)
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Retrait Réussi</h5>
                            <p class="card-text">Vous venez de retirer <strong>:{{$tr['sommes']}}</strong> chez <strong>:{{$tr['operator']->identifiant.','.$tr['operator']->location}}</strong> à <strong>:{{$tr->interaction_date}}</strong>.</p>
                            <p class="card-text">Il vous reste <strong>:{{$user['balance']}}</strong>.</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Identifiant de transaction : <strong>:{{$tr['identifiant']}}</strong></small>
                        </div>
                    </div>
                </div>
                @endforeach
    
               
              
            </div> 
            @endif
    </div>
    </div>


@endsection
