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
        .btn-activate {
            background-color: #28a745;
            color: white;
        }
        .btn-deactivate {
            background-color: #dc3545;
            color: white;
        }
        .btn-activate:hover, .btn-deactivate:hover {
            color: white;
            /* opacity: 0.9; */
        }
       

       
    </style>

    <div class="w-100 side-container-bg">
        <div class="w-100">
        <div class="card shadow">
            <div class="card-header">
                <h2 class="card-title text-black mb-0">Liste des Opérateurs</h2>
            </div>
            <div class="card-body">
                <!-- Table pour grands écrans -->
                <div class="table-responsive d-none d-md-block">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Localité</th>
                                {{-- <th>Description</th> --}}
                                {{-- <th>Téléphone</th> --}}
                                <th>Identifiant</th>
                                <th>Balance</th>
                                <th>Commission</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        @if(isset($operateurs))
                        <tbody>
                            @foreach($operateurs as $op)
                            <tr>
                                <td><i class="bi bi-person icon-orange me-2"></i>
                                    {{$op->user->nom .','.$op->user->prenom }}
                                </td>
                                <td><i class="bi bi-envelope icon-orange me-2"></i>{{
                                    $op->user->email 
                                }}</td>
                                <td><i class="bi bi-geo-alt icon-orange me-2"></i>
                                    {{$op->location }}
                                </td>
                                {{-- <td>Ville, 8ème arrondissement, près de la Tour Eiffel</td> --}}
                                
                                <td><i class="bi bi-credit-card icon-orange me-2"></i>
                                {{$op->identifiant}}
                                </td>
                                <td><i class="bi bi-coin icon-orange me-2"></i>
                                {{$op->balance}}Gr
                                </td>
                                <td>

                                    {{$op->commissions}}Gr
                                </td>
                                <td>
                                    {{$op->status}}

                                </td>
                                @if($op->status=='inactive')

                                <td>
                                    <form action="{{route('post-activer')}}" method="post" action="" >
                                        @method('POST')

                                        @csrf
                                        <input required type="text" hidden name="operateur" value="{{$op->id}}">
                                        <button type="submit" class="btn btn-sm btn-activate">Activer</button>
                               
                                    </form>
                                    
                                </td>
                                @else
                                <td>
                                    <form action="{{route('post-deactiver')}}" method="post" action="" >
                                        @method('POST')

                                        @csrf
                                        <input required type="text" hidden name="operateur" value="{{$op->id}}">
                                        <button type="submit" class="btn btn-sm btn-deactivate">Désactiver</button>
                               
                                    </form>
                                   
                                </td>
                                @endif
                            </tr>
                            @endforeach
                         
                        </tbody>
                        @endif
                    </table>
                </div>

                <!-- Cartes pour petits écrans -->
                <div class="d-md-none">
                    @if(isset($operateurs))
                    @foreach($operateurs as $op)
                    <div class="card mb-3 bg-light">
                        <div class="card-body">
                            <h5 class="card-title text-black"><i class="bi bi-person icon-orange me-2"></i>
                                {{$op->user->nom .','.$op->user->prenom }}
                            </h5>
                            <p class="card-text"><i class="bi bi-envelope icon-orange me-2"></i>
                                {{$op->user->email}}
                            </p>
                            <p class="card-text"><i class="bi bi-geo-alt icon-orange me-2"></i>
                                {{$op->location}}
                            </p>
                            <p class="card-text"><i class="bi bi-credit-card icon-orange me-2"></i>
                                {{$op->identifiant }}
                            </p>
                            <p class="card-text"><i class="bi bi-coin icon-orange me-2"></i>Balance:{{$op->balance }}Gr | Commission: {{$op->commissions }}Gr</p>
                            <div class="mt-3">
                                @if($op->status=='inactive')

                                
                                    <form action="{{route('post-activer')}}" method="post" action="" >
                                        @method('POST')

                                        @csrf
                                        <input required type="text" hidden name="operateur" value="{{$op->id}}">
                                        <button type="submit" class="btn btn-sm btn-activate">Activer</button>
                               
                                    </form>
                                    
                                
                                @else
                                
                                    <form action="{{route('post-deactiver')}}" method="post" action="" >
                                        @method('POST')

                                        @csrf
                                        <input required type="text" hidden name="operateur" value="{{$op->id}}">
                                        <button type="submit" class="btn btn-sm btn-deactivate">Désactiver</button>
                               
                                    </form>
                                   
                                
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                   
                </div>
            </div>
        </div>
    </div>
    </div>


@endsection
