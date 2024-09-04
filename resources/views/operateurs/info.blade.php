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
        

        body {
            background-color: #f8f9fa;
        }
        .card-header {
            background-color: #fd7e14;
            color: rgb(186, 177, 177);
        }
        .table th {
            color: #fd7e14;
        }
        .icon-orange {
            color: #fd7e14;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input, select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: #fd7e14;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: orange;
        }
        .card {
            background-color: #f9f9f9;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
       
        .card {
            border-color: #ffa500;
        }
        .card-title {
            color: #ff8c00;
        }
        .table th {
            background-color: #fff5e6;
            color: #ff8c00;
        }
        .table-hover tbody tr:hover {
            background-color: #fff5e6;
        }
        .badge-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .badge-warning {
            background-color: #fff3cd;
            color: #856404;
            border: 1px solid #ffeeba;
        }
        .badge-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

       
    </style>
@php 
$user=Auth::user();
@endphp

    <div class="w-100 side-container-bg">
        <div class="w-100 flex-column">
            @if($user->operateur)
           

    
  @if($user->operateur->status==="active")
        <h1 class="mb-4 text-orange">Tableau de bord de l'opérateur</h1>
        
        <div class="row mb-4">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title d-flex justify-content-between align-items-center">
                            Balance
                            <i class="fas fa-credit-card text-muted"></i>
                        </h5>
                        <p class="card-text fs-4 fw-bold text-orange">
                            {{$user->operateur->balance}}Gr
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title d-flex justify-content-between align-items-center">
                            Retraits validés
                            <i class="fas fa-users text-muted"></i>
                        </h5>
                        <p class="card-text fs-4 fw-bold text-orange">
                            {{$user->operateur->transactions->count()}}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title d-flex justify-content-between align-items-center">
                            Commission
                            <i class="fas fa-dollar-sign text-muted"></i>
                        </h5>
                        <p class="card-text fs-4 fw-bold text-orange">
                            {{$user->operateur->commissions}}
                            Gr</p>
                    </div>
                </div>
            </div>
        </div>
       
        @if(isset($user->operateur->transactions))
       
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4">Détails des validations de retrait</h5>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Transaction ID</th>
                                <th>Client</th>
                                <th>Somme</th>
                                <th>Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user->operateur->transactions as $trans)
                            <tr>
                                <td>{{$trans['identifiant']}}</td>
                                <td>
                                    {{$user->nom .','.$user->prenom}}

                                </td>
                                <td>
                                    {{$trans['sommes']}}Gr
                                </td>
                                <td><span class="badge badge-success">Validé</span></td>
                            </tr>
                            @endforeach
                           
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        @endif
    </div>
    @endif

  
            <div class="card">
                <h4>Informations Personnelles</h4>
                @if($user->operateur->status!=='active')
                <p>Veuillez Modifier si possible votre localité avant activation de votre demande</p>
                @endif
                <form id="personalInfoForm" action="{{route('post-update-localite')}}" method="POST">
                  @method('POST')
                    @csrf
                    <div class="form-group">
                      
                        <input type="text"  hidden name="id" value="{{$user->operateur->id}}" readonly >
                    </div>
                    <div class="form-group"> 
                        <label for="nom">Nom</label>
                        <input type="text" id="nom" value="{{$user->nom}}" readonly >
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <input type="text" id="prenom" value="{{$user->prenom}}"  readonly>
                    </div>
                    @if($user->operateur->status!=='active')
                    <div class="form-group">
                        <label for="localite">Localité</label>
                        <input type="text" id="localite" value="{{$user->operateur->location}}" name="location" required >
                    </div>
                    @else
                    <div class="form-group">
                        <label for="localite">Localité</label>
                        <input type="text" id="localite" readonly value="{{$user->operateur->location}}" name="location" required >
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="identifiant">Identifiant</label>
                        <input type="text" id="identifiant" value="{{$user->operateur->identifiant}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="statut">Statut</label>
                        <select id="statut"  readonly>
                            <option selected disabled value="{{$user->operateur->status}}">
                                {{$user->operateur->status}}
                            </option>
                        </select>
                    </div>
                    @if($user->operateur->status!=='active')
                    <button type="submit">Modifier</button>
                    @endif
                </form>
            </div>
            @endif
    </div>
    </div>


@endsection
