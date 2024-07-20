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
            //  dd($user->referrals);
            if (isset($clients) && $clients->count()) {
                $percent = ($clients->count() * 100) / $clients->count();
                $user_percent = ($user->referrals->count() * 100) / $clients->count();

                // Limiter à 4 chiffres après la virgule
                $user_percent = number_format($user_percent, 4);
            }

        @endphp
        <style>
            .side-container-bg {
                background: 'table-dark-bg'
            }

            body {

                font-weight: 30px;


            }

            .setting {
                --percentage: {{ $user_percent }}%;



            }

            .table,
            th,
            td {
                border: none;
                font-weight: 20px;
            }

            .table tr th {
                border: none;
            }

            .table tr td {
                border: none;
            }

            .card {
                padding: 10px;
                color: white;
                box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
            }

            .card-header {
                border: none;
                color: white;
            }

            .card-footer {
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

            .wallet span {
                color: black;
            }

            input {

                color: black;
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

            .table-dark-bg th,
            .table-dark-bg td {
                background-color: #07121e !important;
                /* table-dark-bg */
                color: #fff !important;
                /* text-white */
            }

            .table-dark-bg {
                background-color: #07121e !important;
                /* table-dark-bg */
                !important;
                /* table-dark-bg */
                color: #fff !important;
                /* text-white */
            }


            /* Tree branch*/
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
                /* Couleur pour le parent principal */
            }

            .node::before,
            .node::after {
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

            .node:first-child::before,
            .node:last-child::after {
                display: none;
            }

            .node.split {
                background: linear-gradient(to right, #FFA500 50%, #FFFFFF 50%);
            }
        </style>

        <div class="setting  d-flex flex-column table-dark-bg w-100 margin-top">
            <div class="row g-0">
                <div class="col-md-9 table-dark-bg">
                    <div
                        class="card h-100 rounded-l-xl shadow-sm transition-shadow hover:shadow-lg table-dark-bg text-white border-0 shadow h-100">
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
                                            <td class="">

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
                    <div
                        class="card  d-flex justify-content-center
                 align-items-center flex-column h-100 rounded-l-xl shadow-sm transition-shadow hover:shadow-lg table-dark-bg text-white
                ">
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
                    <div
                        class="card h-100 rounded-l-xl shadow-sm 
                transition-shadow hover:shadow-lg table-dark-bg text-white">
                        <div class="card-header text-center ">
                            <h4>Verification de votre email.</h4>
                        </div>
                        <div class="card-body">
                            <div class="form text-center">
                                <form class="d-flex text-center justify-content-center align-content-center" action=""
                                    method="post">
                                    <input type="email" class=" rounded outline-0 w-100" value="{{ $user['email'] }}"
                                        readonly>
                                    <button type="button" class=" btn btn-green">Vérifier</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div
                        class="card h-100 rounded-l-xl
                 shadow-sm transition-shadow hover:shadow-lg table-dark-bg text-white">
                        <div class="card-header text-center">
                            <h4>Consommation de données</h4>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <img src="{{ asset('assets/images/wifi_icon.svg') }}" class="mobile-data">

                                </div>
                                <div>
                                    <img src="{{ asset('assets/images/moblie_icon.svg') }}" alt="mobile"
                                        class="mobile-data">

                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-content-center">
                                <div class="rounded-data text-center">
                                    <span class="data-con"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div
                        class="card h-100 rounded-l-xl shadow-sm transition-shadow hover:shadow-lg table-dark-bg text-white
                ">
                        <div class="card-header text-center">
                            <h4>Balance</h4>
                        </div>
                        <div class="card-body p-0">
                            <div class=" w-100">
                                <div class="wallet rounded bg-white shadow-lg">
                                    <span class="text-center">{{ $user['balance'] }}FCFA</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-2 g-1">
                <div class="col">
                    <div
                        class="card carte h-100 rounded-l-xl shadow-sm
                 transition-shadow hover:shadow-lg table-dark-bg text-white">
                        <div class="card-header carte position-relative w-100">
                            <!-- <div class="position-absolute top-0 right-0 shadow-lg">
                                                <button type="button" class="border-0">
                                                  <i class="mdi mdi-upload">Téléchager</i>
                                                </button>
                                              </div> -->
                            <div class="d-flex justify-content-between">
                                <div>Carte d'achat</div>
                                <div>Santé +</div>
                            </div>
                        </div>
                        <div class="card-boddy">
                            <input type="text" id="name" value="{{ $user['nom'] }}" hidden>
                            <input type="text" id="pseudo" value="{{ $user['prenom'] }}" hidden>
                            <input type="text" id="email" value="{{ $user['email'] }}" hidden>
                            <div class=" d-flex justify-content-between puce">

                            </div>
                            <div class="carte-valeur">
                                <span class="text-center">0.00 Fcfa</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div
                        class="card
                h-100 rounded-l-xl shadow-sm transition-shadow hover:shadow-lg table-dark-bg text-white">
                        <div class="card-header">
                            <h4 class="text-center">Créditer votre balance</h4>
                        </div>
                        <div class="card-body">
                            <form class="d-flex">
                                <input type="number" class="w-100 rounded text-center" name="">
                                <button type="button" class="btn btn-green">Créditer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-lg table-dark-bg w-100 d-flex justify-content-center align-content-center flex-column">
                        <div class="card-header w-100 d-flex justify-content-center align-content-center">
                            <h4 class="text-center">Mes 360 premiers invitants.. (6 Premiers de chaque niveau)</h4>
                        </div>
                        <div class="card-body w-100 d-flex justify-content-center align-content-center">
                            <div class="relation-content">
                                <div class="tree">
                                    @if (isset($colors))
                                        <div class="level">
                                            @foreach ($colors as $color)
                                                @if ($color['key'] === Auth::user()->id)
                                                    <div class="node" style="background-color:{{ $color['color'] }}">A</div>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
            
                                    @if (isset($users) && isset($profondeurs) && $users->count() <= 360)
                                        @php
                                            $maxLevels = $profondeurs;
                                            $currentLevel = 0;
                                        @endphp
            
            @foreach ($users as $user)
            @if ($currentLevel < $maxLevels)
            
                <div class="level">
                    @if ( $user && $user->referrals->count() <= 6)
                        @foreach ($user->referrals as $referral)
                        {{dd($referrals,$currentLevel,$maxLevels)}}
                            @php
                                $auth = null;
                                $own = null;
                                foreach ($colors as $color) {
                                    if ($color['key'] === $referral->referrer->id) {
                                        $auth = $color['color'];
                                    } elseif ($color['key'] === $referral->id) {
                                        $own = $color['color'];
                                    }
                                }
                            @endphp
                            <div class="node" style="background: linear-gradient(to right, {{ $auth }} 50%, {{ $own }} 50%);">
                                {{ $referral->id }}
                            </div>
                        @endforeach
                    @else
                        
                    @endif
                </div>
                @php $currentLevel++; @endphp
            @else
                @break
            @endif
        @endforeach
                                            @endif
            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

        </div>
    @endif

   
    <script>
        function generateQRCode() {
            var name = document.getElementById('name').value;
            var pseudo = document.getElementById('pseudo').value;
            var email = document.getElementById('email').value;

            var qrData = `Nom: ${name}\nPseudo: ${pseudo}\nEmail: ${email}`;

            // Clear the previous QR code if it exists
            document.querySelector('.puce').innerHTML = "";

            // Generate the QR code
            var qrcode = new QRCode(document.querySelector(".puce"), {
                text: qrData,
                width: 70,
                height: 70,
            });
        }
        generateQRCode();
        let totalDataUsage = 0;

        // Fonction pour observer les performances réseau
        function observeNetworkUsage() {
            const observer = new PerformanceObserver((list) => {
                list.getEntries().forEach((entry) => {
                    // Ajouter la taille de transfert de chaque ressource au total
                    totalDataUsage += entry.transferSize;

                    // Convertir les octets en Go ou Mo
                    let dataUsage;
                    if (totalDataUsage > 1024 * 1024 * 1024) {
                        dataUsage = `${(totalDataUsage / (1024 * 1024 * 1024)).toFixed(2)} Go`;
                    } else if (totalDataUsage > 1024 * 1024) {
                        dataUsage = `${(totalDataUsage / (1024 * 1024)).toFixed(2)} Mo`;
                    } else {
                        dataUsage = `${totalDataUsage} octets`;
                    }

                    // Afficher la consommation de données
                    console.log(`Consommation de données cumulative : ${dataUsage}`);
                });
            });

            observer.observe({
                entryTypes: ['resource']
            });
        }

        // Fonction pour observer la navigation
        function observeNavigation() {
            const observer = new PerformanceObserver((list) => {
                list.getEntries().forEach((entry) => {
                    if (entry.entryType === 'navigation') {
                        totalDataUsage += entry.transferSize;

                        // Convertir les octets en Go ou Mo
                        let dataUsage;
                        if (totalDataUsage > 1024 * 1024 * 1024) {
                            dataUsage = `${(totalDataUsage / (1024 * 1024 * 1024)).toFixed(2)} Go`;
                        } else if (totalDataUsage > 1024 * 1024) {
                            dataUsage = `${(totalDataUsage / (1024 * 1024)).toFixed(2)} Mo`;
                        } else if (totalDataUsage > 1024) {
                            dataUsage = `${(totalDataUsage / (1024)).toFixed(2)} Ko`;
                        } else {
                            dataUsage = `${totalDataUsage} octets`;
                        }

                        document.querySelector('.data-con').textContent = dataUsage;
                        console.log(`Consommation de données cumulative : ${dataUsage}`);
                    }
                });
            });

            observer.observe({
                entryTypes: ['navigation']
            });
        }

        // Appeler les fonctions lorsque la page est chargée
        window.addEventListener('load', () => {
            observeNetworkUsage();
            observeNavigation();
        });
    </script>

@endsection
