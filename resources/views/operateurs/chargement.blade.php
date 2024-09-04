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

      
 h5{
    color:black !important;
 }
 
      

       
    </style>
@php 
$user=Auth::user();
@endphp
<div class="w-100 side-container-bg">
    <div class="w-100 flex-column">
    
  <style>
        
        .card {
            background-color: #fff;
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #ffa500;
            color: #fff;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
        .btn-primary {
            background-color: #ffa500;
            border-color: #ffa500;
        }
        .btn-primary:hover, .btn-primary:focus {
            background-color: #ff8c00;
            border-color: #ff8c00;
        }
        .form-control:focus {
            border-color: #ffa500;
            box-shadow: 0 0 0 0.2rem rgba(255, 165, 0, 0.25);
        }
    </style>

    
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mb-0">Chargement de Compte</h3>
                    </div>
                    <div class="card-body">
                        <form id="loadingForm" action="{{route('coin-chargemnt')}}" method="POST">
                            @method('POST')
                            @csrf
                            <div class="mb-3">
                                <label for="identifiant" class="form-label">Identifiant</label>
                                <input type="text" name="identifiant" class="form-control" id="identifiant" required>
                            </div>
                            <div class="mb-3">
                                <label for="somme" class="form-label">Somme à charger</label>
                                <input type="number" name="valeur" class="form-control" id="somme" required min="0" step="0.01">
                            </div>
                            <button type="submit" class="btn btn-primary w-100" id="submitBtn">
                                Charger le compte
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    

   
   <script>
        document.getElementById('loadingForm').addEventListener('submit', function(e) {
           // e.preventDefault();
            const submitBtn = document.getElementById('submitBtn');
            const originalText = submitBtn.innerHTML;
            //submitBtn.disabled = true;
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Chargement en cours...';

            // setTimeout(function() {
            //     const identifiant = document.getElementById('identifiant').value;
            //     const somme = document.getElementById('somme').value;
                

            //     submitBtn.disabled = false;
            //     submitBtn.innerHTML = originalText;
            //     document.getElementById('loadingForm').reset();
            // }, 2000);
        });
    </script>
    
                  
    </div>
    </div>


@endsection
