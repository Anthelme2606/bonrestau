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

      

        .card {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card,
        .card-header,
        .card-body {
            border: none;
            background-color: #ffffff;
        }

        .table,
        .thead,
        tr,
        th,
        td,
        tbody {
            border: none;
        }

        .table thead th {
            font-size: 13px;
            text-align: center;
            
        }

        .table tbody td {
            font-size: 12px;
            
            text-align: center;
            border-top: 1px solid rgb(35, 47, 130);
        }

        .table th,
        .table td {
            padding: 4px 8px;
            font-size: 12px;
            white-space: normal;
            word-wrap: break-word;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .table th:nth-child(1),
        .table td:nth-child(1) {
            width: 40px;
        }

        /* Ajustez selon vos besoins */

        .table-responsive::-webkit-scrollbar {
            height: 10px;
        }

        .table-responsive::-webkit-scrollbar-track {
            background: #ebecf0;
        }

        .table-responsive::-webkit-scrollbar-thumb {
            background: #6c6c86;
            border-radius: 4px;
        }

        .number-user-red {
            max-width: 150px;
            background: rgb(134, 70, 70);
            color: #fff;
        }

        .number-user-green {
            max-width: 150px;
            background: rgb(64, 109, 64);
            color: #fff;
        }
      
        .table tbody  .wt_p td{
            background-color: rgba(200, 90, 90, 0.8) !important;
            
        }

        .table tbody  .w_p td {
            background-color: rgba(80, 130, 80, 0.8) !important;

}


        .row-container {
            background-color: #002 !important;
        }

      

        .text-infor {
            font-size: 1.2rem;
           
            color: #002;
            background: rgb(220, 228, 228);
        }

        .text-th {
            font-size: 1rem;
            color: #333;
        }

        .number-user-red,
        .number-user-green {
            padding: 0.5rem 1rem;
            font-size: 1rem;
            min-width: 50px;
            text-align: center;
        }

        .number-user-red {
            background-color: rgb(134, 70, 70);
            color: #fff;
        }

        .number-user-green {
            background-color: rgb(64, 109, 64);
            color: #fff;
        }

        .infor {
            text-align: center;
        }

        @media (min-width: 768px) {
            .infor {
                text-align: left;
            }
            
        }

        .d-flex>.infor span {
            transition: transform 0.3s ease-in-out;
        }

        .d-flex>.infor span:hover {
            transform: scale(1.05);
        }
    </style>

    <div class="w-100 side-container-bg">
        <div class="w-100">
            <div class="mx-auto flex-grow-1 d-flex flex-column justify-content-center align-items-center">
                <div class="card flex-grow-1 w-100">
                    <div class="card-header">
                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                            <div class="infor col-12 col-md-4 mb-2">
                                <span class="text-center text-infor text-th d-block">
                                    Informations du compte, {{ $clients->count() }} utilisateurs
                                </span>
                            </div>
                            <div class="infor col-12 col-md-3 mb-2 d-flex justify-content-md-end align-items-center">
                                <span class="text-th me-2">Comptes non actifs</span>
                                <span class="number-user-red rounded-sm shadow">
                                    {{ $users_wt_p->count() }}
                                </span>
                            </div>
                            <div class="infor col-12 col-md-3 mb-2 d-flex justify-content-md-end align-items-center">
                                <span class="text-th me-2">Comptes actifs</span>
                                <span class="number-user-green rounded-sm shadow">
                                    {{ $users_w_p->count() }}
                                </span>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-truncate">Nom</th>
                                        <th class="text-truncate">Prénom</th>
                                        <th class="text-truncate">Naissance</th>
                                        <th class="text-truncate">Email</th>
                                        <th class="text-truncate">Pseudo</th>
                                        <th class="text-truncate">N.reseau</th>
                                        <th class="text-truncate">N.whatsapp</th>
                                        <th class="text-truncate">Région</th>
                                        <th class="text-truncate">Ville</th>
                                        <th class="text-truncate">Commune</th>
                                        <th class="text-truncate">Quartier</th>
                                        <th class="text-truncate">Réseau</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($users_wt_p))
                                        @foreach ($users_wt_p as $user)
                                            <tr class="wt_p">
                                                <td class="text-truncate" style="max-width:60px;">{{ $user->nom }}</td>
                                                <td class="text-truncate" style="max-width:60px;">{{ $user->prenom }}</td>
                                                <td class="text-truncate" style="max-width:60px;">
                                                    {{ $user->date_naissance }}</td>
                                                <td class="text-truncate" style="max-width:60px;">{{ $user->email }}</td>
                                                <td class="text-truncate" style="max-width:60px;">{{ $user->pseudo }}</td>
                                                <td class="text-truncate" style="max-width:60px;">{{ $user->numero_reseau }}
                                                </td>
                                                <td class="text-truncate" style="max-width:60px;">{{ $user->numwhats }}</td>
                                                <td class="text-truncate" style="max-width:60px;">{{ $user->region }}</td>
                                                <td class="text-truncate" style="max-width:60px;">{{ $user->ville }}</td>
                                                <td class="text-truncate" style="max-width:60px;">{{ $user->commune }}</td>
                                                <td class="text-truncate" style="max-width:60px;">{{ $user->quartier }}
                                                </td>
                                                @if (isset($user['reseau1']) && $user['reseau1'] && $user['reseau1'] !== '')
                                                    <td class="text-truncate" style="max-width:60px;">
                                                        {{ $user['reseau1'] }}</td>
                                                @else
                                                    <td class="text-truncate" style="max-width:60px">{{ $user['reseau2'] }}
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    @endif
                                    @if (isset($users_w_p))
                                        @foreach ($users_w_p as $user)
                                            <tr class="w_p">
                                                <td class="text-truncate" style="max-width:60px;">{{ $user->nom }}</td>
                                                <td class="text-truncate" style="max-width:60px;">{{ $user->prenom }}</td>
                                                <td class="text-truncate" style="max-width:60px;">
                                                    {{ $user->date_naissance }}</td>
                                                <td class="text-truncate" style="max-width:60px;">{{ $user->email }}</td>
                                                <td class="text-truncate" style="max-width:60px;">{{ $user->pseudo }}</td>
                                                <td class="text-truncate" style="max-width:60px;">
                                                    {{ $user->numero_reseau }}</td>
                                                <td class="text-truncate" style="max-width:60px;">{{ $user->numwhats }}
                                                </td>
                                                <td class="text-truncate" style="max-width:60px;">{{ $user->region }}</td>
                                                <td class="text-truncate" style="max-width:60px;">{{ $user->ville }}</td>
                                                <td class="text-truncate" style="max-width:60px;">{{ $user->commune }}</td>
                                                <td class="text-truncate" style="max-width:60px;">{{ $user->quartier }}
                                                </td>
                                                @if (isset($user['reseau1']) && $user['reseau1'] && $user['reseau1'] !== '')
                                                    <td class="text-truncate" style="max-width:60px;">
                                                        {{ $user['reseau1'] }}</td>
                                                @else
                                                    <td class="text-truncate" style="max-width:60px">
                                                @endif
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
