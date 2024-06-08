@extends('layouts.page')
@section('tittle', 'Dashboard')
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('content')
    <div class="container">
        <div class="row">
            @if(isset($clients))
            @foreach($clients as $client)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header bg-white">
                       <span class="text-black fw-2">{{$client->name}}</span>
                    </div>
                    <div class="card-body shadow bg-primary text-white">
                        <span class="px-2 py-2 rounded mx-2 my-2">{{$client->referral_code}}</span>
                    </div>
                    <div class="card-footer">
                         comptes parrainés
                    </div>
                </div>
            </div>
            @endforeach
            @endif

        </div>

        <hr />
        @include('footer')
    </div>


@endsection
