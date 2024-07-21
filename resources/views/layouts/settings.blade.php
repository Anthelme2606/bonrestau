@extends('layouts.index')
@include('layouts.dash-head')
@section('title', 'Parametre')
@section('sidebar')
    <x-sidebar />
@endsection

@section('navbar')
    <x-navbar />
@endsection

@section('sidebar-container')
    @if (Auth::check())
        @php
            $user = Auth::user();
            if (isset($clients) && $clients->count()) {
                $percent = ($clients->count() * 100) / $clients->count();
                $user_percent = ($user->referrals->count() * 100) / $clients->count();

                // Limiter à 4 chiffres après la virgule
                $user_percent = number_format($user_percent, 4);
            }
        @endphp
        <style>
            .side-container-bg {
                background: table-dark-bg;
            }
            body {
                font-weight: 30px;
            }
            .setting {
                --percentage: {{ $user_percent }}%;
            }
            .table, th, td {
                border: none;
                font-weight: 20px;
            }
            .table tr th, .table tr td {
                border: none;
            }
            .card {
                padding: 10px;
                color: white;
                box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
            }
            .card-header, .card-footer {
                border: none;
                color: white;
            }
            .email-valid {
                float: right;
            }
            .progress-circle {
                position: relative;
                width: 111px;
                height: 111px;
                border-radius: 50%;
                background: conic-gradient(rgb(30, 96, 17) 0% calc(var(--percentage)), #e0e0e0 calc(var(--percentage)) 100%);
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .progress-text {
                position: absolute;
                font-size: 24px;
                font-weight: bold;
                color: #333;
            }
            .progress-subtext {
                position: absolute;
                font-size: 16px;
                top: 65%;
                color: #666;
            }
            .mdi-wifi {
                color: blue;
                font-weight: 90px;
                size: 90px;
            }
            input {
                border: none;
                border-bottom: 1px solid green;
                outline: none;
                box-shadow: 2px 2px 10px black;
                color: black;
            }
            .mobile-data {
                width: 30px;
                height: 30px;
                color: #fff;
            }
            .wallet {
                height: 45px;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .btn-green {
                color: #fff;
                background: rgb(30, 96, 17);
            }
            .wallet span {
                text-align: center;
            }
            .carte {
                background: #2fa2af;
                font-size: 12px;
                color: #fff;
            }
            .puce {
                width: 60px;
                height: 60px;
                color: white;
            }
            .carte-valeur {
                float: right;
            }
            .top-0 {
                top: 0;
                transform: translateY(-10px);
            }
            .right-0 {
                right: -10px;
            }
            .margin-top {
                margin-top: 65px;
            }
            table {
                background: black;
                color: white;
            }
            h4 {
                font-size: 13px;
            }
            td {
                color: white;
            }
            .btn-green-mdi {
                color: rgb(30, 96, 17);
            }
            .table-dark-bg th, .table-dark-bg td, .table-dark-bg {
                background-color: #07121e !important;
                color: #fff !important;
            }
            .tree {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
            }
            .level {
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .node {
                border: 2px solid #333;
                border-radius: 50%;
                width: 40px;
                height: 40px;
                display: flex;
                justify-content: center;
                align-items: center;
                margin: 10px;
                position: relative;
            }
            .node.main {
                background-color: #FFA500;
            }
            .node::before, .node::after {
                content: '';
                position: absolute;
                top: 50%;
                background-color: #333;
            }
            .node::before {
                left: -20px;
            }
            .node::after {
                right: -20px;
            }
            .node:first-child::before, .node:last-child::after {
                display: none;
            }
            .node.split {
                background: linear-gradient(to right, #FFA500 50%, #FFFFFF 50%);
            }
        </style>

        <div class="setting d-flex flex-column table-dark-bg w-100 margin-top">
            <div class="row g-0">
                <div class="col-md-9 table-dark-bg">
                    <div class="card h-100 rounded-l-xl shadow-sm transition-shadow hover:shadow-lg table-dark-bg text-white border-0 shadow h-100">
                        <div class="card-header">
                            <h4 class="text-center">Informations personnelles</h4>
                        </div>
                        <div class="card-body table-dark-bg">
                            <div class="table-responsive">
                                <table class="table table-dark-bg">
                                    <thead class="table-dark-bg">
                                        <tr class="table-dark-bg">
                                            <th>Nom</th>
                                            <th>Prenom</th>
                                            <th>Pseudo</th>
                                            <th>Email</th>
                                            <th>Ville</th>
                                            <th>Commune</th>
                                            <th>Quartier</th>
                                            <th>R.choisi</th>
                                            <th>N.réseau</th>
                                            <th>N.Whatsapp</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-dark-bg">
                                        <tr class="table-dark-bg">
                                            <td>{{ Auth::user()->nom }}</td>
                                            <td>{{ Auth::user()->prenom }}</td>
                                            <td>{{ Auth::user()->pseudo }}</td>
                                            <td>{{ Auth::user()->email }}</td>
                                            <td>{{ Auth::user()->ville }}</td>
                                            <td>{{ Auth::user()->commune }}</td>
                                            <td>{{ Auth::user()->quartier }}</td>
                                            <td>
                                                @if (Auth::user()->reseau1 !== 'null')
                                                    {{ Auth::user()->reseau1 }}
                                                @elseif (Auth::user()->reseau2 !== 'null')
                                                    {{ Auth::user()->reseau2 }}
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>{{ Auth::user()->numero_reseau }}</td>
                                            <td>{{ Auth::user()->numwhats }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <h5 class="email-valid btn-green-mdi">
                                email <i class="mdi mdi-check fw-2 btn-green-mdi"></i>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card d-flex justify-content-center align-items-center flex-column h-100 rounded-l-xl shadow-sm transition-shadow hover:shadow-lg table-dark-bg text-white">
                        <div class="card-header">
                            <h4 class="text-center fw-5">Comptes parrainés</h4>
                        </div>
                        <div class="card-body">
                            <div class="progress-circle d-flex justify-content-center align-items-center">
                                <span class="progress-text">{{ $user_percent }}%</span>
                                <span class="progress-subtext">{{ $user->referrals->count() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-3 g-1">
                <div class="col">
                    <div class="card h-100 rounded-l-xl shadow-sm transition-shadow hover:shadow-lg table-dark-bg text-white">
                        <div class="card-header text-center">
                            <h4>Verification de votre email.</h4>
                        </div>
                        <div class="card-body">
                            <div class="form text-center">
                                <form id="verifyEmailForm" class="d-flex text-center justify-content-center align-content-center" action="#" method="post">
                                    <input type="email" id="emailInput" class="rounded outline-0 w-100" value="{{ $user['email'] }}" readonly>
                                    <button type="button" class="btn btn-green" onclick="verifyEmail()">Vérifier</button>
                                </form>
                                <p id="emailStatus"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 rounded-l-xl shadow-sm transition-shadow hover:shadow-lg table-dark-bg text-white">
                        <div class="card-header text-center">
                            <h4>Ajouter un code d'accès</h4>
                        </div>
                        <div class="card-body">
                            <div class="form text-center">
                                <form class="d-flex text-center justify-content-center align-content-center" action="" method="post">
                                    <input type="text" class="rounded outline-0 w-100" value="Entrez votre code" required>
                                    <button type="submit" class="btn btn-green">Ajouter</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 rounded-l-xl shadow-sm transition-shadow hover:shadow-lg table-dark-bg text-white">
                        <div class="card-header text-center">
                            <h4>Ajouter un nouveau code</h4>
                        </div>
                        <div class="card-body">
                            <div class="form text-center">
                                <form class="d-flex text-center justify-content-center align-content-center" action="" method="post">
                                    <input type="text" class="rounded outline-0 w-100" value="Entrez le code" required>
                                    <button type="submit" class="btn btn-green">Ajouter</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @push('scripts')
            <script>
                function verifyEmail() {
                    const emailInput = document.getElementById('emailInput');
                    const emailStatus = document.getElementById('emailStatus');
                    
                    const email = emailInput.value;

                    // Simulate an email verification process
                    if (validateEmail(email)) {
                        emailStatus.textContent = 'L\'email est valide.';
                        emailStatus.style.color = 'green';
                    } else {
                        emailStatus.textContent = 'L\'email est invalide.';
                        emailStatus.style.color = 'red';
                    }
                }

                function validateEmail(email) {
                    const re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
                    return re.test(email);
                }
            </script>
        @endpush
    @else
        <p>Vous devez être connecté pour voir cette page.</p>
    @endif
@endsection
