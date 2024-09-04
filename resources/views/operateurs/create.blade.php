@extends('layouts.index')
@include('layouts.dash-head')
@section('title','Demande')
@section('sidebar')
<x-sidebar/>

@endsection
@section('navbar')
<x-navbar/>
@endsection 

@section('sidebar-container')

<style>
     .side-container-bg {
        background-color: #fff9c4;
    }
    .card {
        background-color: #fff59d;
        border: none;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .card-header {
        background-color: #f57f17;
        color: white;
        text-align: center;
        font-size: 1.25rem;
        font-weight: bold;
    }
    .btn-submit {
        background-color: #fbc02d;
        color: white;
        border: none;
        transition: background-color 0.3s ease;
    }
    .btn-submit:hover {
        background-color: #f57f17;
    }
</style>

<div class="side-container-bg d-flex justify-content-center align-items-center vh-100">
    <div class="card w-50">
        <div class="card-header">
            Demande d'Opérateur
        </div>
        <div class="card-body">
            <form action="{{route('post-operateur')}}" method="POST" enctype="multipart/form-data">
                @method('POST')
                @csrf
                <div class="form-group">
                    <label for="localite">Votre email</label>
                    <input type="text" class="form-control" id="localite" value="{{Auth::user()->email}}" readonly placeholder="Entrez votre localité" required>
                </div>
                <div class="form-group">
                    <label for="localite">Votre nom & prénom</label>
                    <input type="text" class="form-control" id="localite" value="{{Auth::user()->nom .','. Auth::user()->prenom}}" readonly placeholder="Entrez votre localité" required>
                </div>

                <div class="form-group">
                    <label for="localite">Votre localité</label>
                    <input type="text" class="form-control" id="localite" name="localite" placeholder="Ville - quartier" votre localité required>
                </div>
                {{-- <div class="form-group">
                    <label for="image">Image de votre localité</label>
                    <input type="file" class="form-control-file" id="image" name="image" required>
                </div> --}}
                <button type="submit" class="btn btn-submit w-100 mt-3">Soumettre la Demande</button>
            </form>
        </div>
    </div>
</div>
@endsection