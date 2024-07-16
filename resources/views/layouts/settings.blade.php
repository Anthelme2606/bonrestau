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

@if(Auth::check())
 @php
 $user=Auth::user();
//  dd($user->referrals);
 if (isset($clients) && $clients->count()) {
    $percent = $clients->count() * 100 / $clients->count();
    $user_percent = $user->referrals->count() * 100 / $clients->count();
    
    // Limiter à 4 chiffres après la virgule
    $user_percent = number_format($user_percent, 4);
}

@endphp
    <style>
        .side-container-bg {
            background: rgba(245, 251, 252, 1);
        }

        body {

            font-weight: 30px;


        }

        .setting {
            --percentage:{{$user_percent}}%;

            background: rgba(245, 251, 252, 1);

           
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
            background: #fff;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
        }

        .card-header {
            border: none;
            background: #fff;
        }

        .card-footer {
            border: none;
            background: #fff;
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
            /* width: 100%; */
            /* Ajustez la taille selon vos besoins */
            height: 45px;
            /* Ajustez la taille selon vos besoins */
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
            background: #fff;
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
        .margin-top{
            margin-top: 65px;
        }
    </style>

    <div class="setting  d-flex flex-column side-container-bg w-100 margin-top">
        <div class="row g-1">
            <div class="col-md-9">
                <div class="card border-0 shadow">
                    <div class="card-header">
                        <h4 class="text-center">Informations personnelles</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
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
                                <tbody>
                                    <tr>
                                        <td>{{Auth::user()->nom}}</td>
                                        <td>{{Auth::user()->prenom}}</td>
                                        <td>{{Auth::user()->pseudo}}</td>
                                        <td>{{Auth::user()->email}}</td>
                                        <td>{{Auth::user()->ville}}</td>
                                        <td>{{Auth::user()->commune}}</td>
                                        <td>{{Auth::user()->quartier}}</td>
                                        <td class="">
                                           
                                            @if (Auth::user()->reseau1!=='null')
                                                {{ Auth::user()->reseau1 }}
                                            @elseif (Auth::user()->reseau2!=='null')
                                                {{ Auth::user()->reseau2 }}
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>{{Auth::user()->numero_reseau}}</td>
                                        <td>{{Auth::user()->numwhats}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <h5 class="email-valid text-success">
                            email <i class="mdi mdi-check fw-2 text-success"></i>
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow d-flex justify-content-center align-items-center flex-column">
                    <div class="card-header">
                        <h4 class="text-center fw-5">Comptes parrainés</h4>
                    </div>
                    <div class="card-body">
                        <div class="progress-circle d-flex justify-content-center align-items-center">
                            <span class="progress-text">{{$user_percent}}%</span>
                            <span class="progress-subtext">{{$user->referrals->count()}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row row-cols-1 row-cols-md-3 g-1">
            <div class="col">
                <div class="card ">
                    <div class="card-header text-center">
                        <h4>Verification de votre email.</h4>
                    </div>
                    <div class="card-body">
                        <div class="form text-center">
                            <form class="d-flex text-center justify-content-center align-content-center" action=""
                                method="post">
                                <input type="email" class=" outline-0 w-100" value="{{$user['email']}}" readonly>
                                <button type="button"
                                    class=" btn btn-green">Vérifier</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card ">
                    <div class="card-header text-center">
                        <h4>Consommation de données</h4>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex justify-content-between">
                            <div>
                                <img src="{{ asset('assets/images/wifi_icon.svg') }}" class="mobile-data">

                            </div>
                            <div>
                                <img src="{{ asset('assets/images/moblie_icon.svg') }}" alt="mobile" class="mobile-data">

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
                <div class="card h-100">
                    <div class="card-header text-center">
                        <h4>Balance</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class=" w-100">
                            <div class="wallet rounded bg-white shadow-lg">
                                <span class="text-center">{{$user['balance']}}FCFA</span>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-2 g-1">
            <div class="col">
                <div class="card carte h-100">
                    <div class="card-header carte position-relative">
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
                        <input type="text" id="name" value="{{$user['nom']}}" hidden>
                        <input type="text" id="pseudo" value="{{$user['prenom']}}" hidden>
                        <input type="text" id="email" value="{{$user['email']}}" hidden>
                        <div class=" d-flex justify-content-between puce">

                        </div>
                        <div class="carte-valeur">
                            <span class="text-center">0.00 Fcfa</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">Créditer votre balance</h4>
                    </div>
                    <div class="card-body">
                        <form class="d-flex">
                            <input type="number" class="w-100 text-center" name="">
                            <button type="button" class="btn btn-green">Créditer</button>
                        </form>
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



























{{-- @extends('layouts.page')
@section('tittle', 'Settings')
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('content')
    <style>
        .settings-container {
            border: none;
            color: var(--text-color);
            /* Text color */
        }

        .card {
            outline: none;
            border: none;
            display: flex;
            color: var(--text-color);
            flex-direction: column;
        }

        .card .card-body {
            border: none;
        }

        .modify-tool {
            outline: none;
            border: none;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-color: var(--primary-color-light);
            color: var(--text-color);
            /* Text color */

        }

        .modify-tool input {
            border: none;
        }

        .form {
            display: flex;
            /* Use flexbox for layout */
            flex-direction: column;
            /* Arrange elements in a column */
            align-items: center;
            /* Center align items */
            justify-content: center;
            /* Center items */
            padding: 20px;
            /* Add padding around the form */
            border: none;
            border-radius: 10px;
            /* Rounded corners */
            background-color: var(--primary-color-light);
            /* Background color */
            /*animation: slideIn 0.5s ease-in-out; /* Animation for form elements */
        }

        .form label {
            padding: 14px 10px;
            border-radius: 10%;
            font-weight: bold;
        }

        .form input {
            height: 40px;
            /* Set a fixed height */
            width: 100%;
            /* Full width of the form */
            padding: 0 10px;
            /* Padding inside the input */
            outline: none;
            /* Remove default outline */
            border: none;
            /* Remove all borders */
            border-bottom: 2px solid #ccc;
            /* Add only a bottom border */
            background-color: var(--primary-color-light);
            /* Background color */
            color: var(--text-color);
            /* Text color */
            font-size: 17px;
            /* Font size */
            font-weight: 500;
            /* Font weight */
            transition: var(--tran-05);
            /* Smooth transition for changes */
            margin-bottom: 20px;
            /* Space between inputs */
        }

        .block-tool {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .My-info {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            border: none;
            padding: 10px;
        }

        .My-info input {
            outline: none;
            border-style: solid;
            border-bottom-color: rgba(12, 12, 14, 0.5);

            border: none;

        }

        .bg-card {
            background-color: rgb(205, 205, 255);
            color: var(--text-color);
        }
    </style>

    <div class="container">
        <div class="settings-container">
            <div class="row ">
                <div class="col-md-9 modify-tool">
                    <div class="card mb-0">
                        <div class="card-header">
                            <h3>Recuperation Tool</h3>
                        </div>
                        <div class="card-body">
                            <form class="form">
                                <div class="mb-1">
                                    <label for="user-email-phone">Email</label>
                                    <input type="text" id="email" name="email" placeholder="***">
                                </div>
                                <div class="mb-1">

                                    <button type="button" id="user-email-phone" name="phone-email" class="btn btn-primary">
                                        Send
                                    </button>
                                </div>

                            </form>
                        </div>
                        
                        <div class="card-footer">
                            @if (Auth::check())
                            <h5 class="mt-2">Validate Bon</h5>
                            <div class="row">
                                @if (isset(Auth::user()->transactions))
                                @foreach (Auth::user()->transactions as $transactions)
                            
                                @foreach ($transactions->bons as $bons)
                                <div class="col-md-6 my-4">
                                    <div class="card bg-card shadow">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <img class="rounded-circle px-2 py-2 mx-1 my-2" alt="card-img"
                                                    src="{{ asset('assets/images/bon-logo.png') }}" width="50"
                                                    height="50">
                                            </div>
                                            
                                            <p class="card-text">Expiration: <span class="text-danger">{{$bons->date}}</span></p>
                                            <p class="card-text">Valeur : <span class="font-weight-bold">{{$bons->price}} Fcfa</span>
                                                <p class="card-text">Code : <span class="font-weight-bold">{{$bons->code}}</span>
                                            
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endforeach
                                @endif
                                
                            </div>
                             @else
                             Any validate Bon
                            @endif
                        </div>

                        
                    </div>
                </div>
                @if (Auth::check())
                <div class="col-md-3 auth-info">
                    <div class="card">
                        <div class="card-header">
                            <img src="{{ asset('assets/images/logo.jpg') }}" class=" rounded-circle " alt="user"
                                style="width: 60px; height:60px;">
                            <span class="fw-4">{{Auth::user()->user_type}}</span>
                        </div>
                        <hr />
                        <div class="card-body">
                            <div class="My-info block-tool">
                                <h5>My information</h5>
                                <span class="fw-3">Email: {{Auth::user()->email}}</span>
                                <span class="">PhoneNumber: {{Auth::user()->phone}}</span>
                                <span class="text-success">ReferralCode: {{Auth::user()->referral_code}}</span>
                            </div>
                            <hr />
                            <div class="My-parrain block-tool">
                                <h5>My Parrain</h5>
                                @if (isset(Auth::user()->referrer))
                                <span class="fw-3">{{Auth::user()->referrer->email}}</span>

                                <span class="">{{Auth::user()->referrer->referral_code}}</span>
                                @else
                                <span>You do not have referrer</span>
                                @endif

                            </div>

                        </div>
                        <hr />
                        <div class="card-footer">

                            <div class="Account-parent">
                                <h4>My clients</h4>
                                <h5 class="fw-3"><span class="text-success">{{Auth::user()->referrals->count()}}</span> inscrit(s) avec mon code: {{Auth::user()->referral_code}}</h6>

                            </div>
                            <div class="solde mt-2 block-tool justify-content-center" style="width:100%;">

                                <h4>My Account</h4>
                                <span class="-content bg-light text-center"
                                    style="
                                display: flex;
            align-items: center;
            justify-content: center;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);">
                                    <span class="currency-text"
                                        style="font-size: 0.8em; 
                                word-wrap: break-word;">{{Auth::user()->balance}}
                                        FCFA</span>
                                </span>

                            </div>
                        </div>
                    </div>

                </div>
                @endif

            </div>

        </div>
        <hr />
        @include('layouts.footer')
    </div>

@endsection --}}
