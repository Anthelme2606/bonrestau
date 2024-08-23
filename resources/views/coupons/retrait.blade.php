@extends('layouts.index')
@include('layouts.dash-head')
@section('title', 'retrait')
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

       
       
        .card-header {
            position: relative;
        }
        .card-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to right, #2c6db1, #6610f2);
            opacity: 0.5;
            z-index: 1;
            border-top-left-radius: 0.375rem;
            border-top-right-radius: 0.375rem;
        }
        .card-header .card-title, .card-header .card-text {
            position: relative;
            z-index: 2;
            color: white;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .form-container {
            min-height: 100vh;
        }
    

.card{
    position: relative;
}
.border-animation {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 10px;
            background: linear-gradient(
                90deg,
                red,
                yellow,
                green,
                blue,
                red
            );
            background-size: 400% 400%;
            animation: borderRotate 4s linear infinite;
            z-index: -1;
        }

        @keyframes borderRotate {
            0% {
                background-position: 0% 50%;
            }
            100% {
                background-position: 100% 50%;
            }
        }

.btn-primary {
    max-width: 180px !important;
}
 #green-button{
    background:rgb(70, 172, 70) !important;
}
 #cahs-button{
    background:rgb(142, 183, 60) !important;
}

.form-toggle {
    display: none;
}

.form-toggle.show {
    display: block;
    animation: fadeIn 0.5s ease-in-out;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}


    </style>

      

      

       

     


   

    <div class="w-100 side-container-bg">
        <div class="w-100 d-flex justify-content-center align-items-center flex-column ">
            <div class="card max-w-md w-100 p-4 p-sm-5">
                <div class="border-animation"></div>
                <div class="card-header bg-gradient rounded-top">
                    <h5 class="card-title text-2xl font-bold">Demande de retrait</h5>
                    <p class="card-text">Remplissez ce formulaire pour effectuer une demande de retrait.</p>
                </div>
                <div class="card-body d-flex flex-column ">
                    <div class="d-flex justify-content-between w-100">
                        <div class="">
                            <button id="green-button" class="btn btn-primary">Retrait par Green</button>
                        </div>
                        <div class="">
                            <button id="cash-button" class="btn btn-primary">Retrait Cash</button>
                        </div>
                    </div>
                    <div class="form-toggle" id="green-form">
                    <form class="grid gap-4" method="POST" action="{{route('post-jetons')}}">
                      @method('post')
                      @csrf
                        <div class="row mb-3">
                            <div class="col">
                                <label for="firstName" class="form-label text-white">Prénom</label>
                                <input type="text" class="form-control" value="{{Auth::user()->nom}}" readonly id="firstName" placeholder="Entrez votre prénom">
                            </div>
                            <div class="col">
                                <label for="lastName" class="form-label text-white">Nom</label>
                                <input type="text" class="form-control" value="{{Auth::user()->prenom}}" id="lastName" readonly placeholder="Entrez votre nom">
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-md-2 mb-3">
                            <div class="col">
                                <input type="text"hidden name="user_id" class="form-control text-truncate" value="{{Auth::user()->id}}" readonly id="firstName" placeholder="identifiant">
                           
                                <label for="firstName" class="form-label text-white">Email</label>
                                <input type="text" class="form-control text-truncate" value="{{Auth::user()->email}}" readonly id="firstName" placeholder="Entrez votre prénom">
                            </div>
                            <div class="col">
                                <label for="lastName" class="form-label text-white">Numero Transaction</label>
                                <input type="number" name="valeur" class="form-control" value="{{Auth::user()->numero_reseau}}" id="lastName" min="0" readonly  placeholder="Entrez votre numero de transaction">
                            </div>
                        </div>
                        {{-- <div class="row  mb-3">
                            <div class="col">
                                    <label for="email" class="form-label text-white">Email</label>
                                    <input type="email" class="form-control" id="email" value="{{Auth::user()->email}}" readonly placeholder="Entrez votre email"> 
                            </div>
                            <div class="col">
                                    <label for="email" class="form-label text-white">Numero de transaction</label>
                                    <input type="email" class="form-control" id="numer_tran" value="{{Auth::user()->numero_reseau}}"   placeholder="numéro">
                            </div>
                        </div>
                     --}}
                        <div class="mb-3">
                            <label for="amount" class="form-label text-white">Montant du retrait</label>
                            <input type="number" name="valeur" class="form-control" id="amount" placeholder="Entrez le montant" min="0" required>
                        </div>
                        <div class="mb-3">
                            <label for="reason" class="form-label text-white">Raison du retrait</label>
                            <textarea name="description" class="form-control" id="reason" rows="3" required placeholder="Expliquez la raison de votre demande"></textarea>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success w-100">Soumettre la demande</button>
                        </div>
                    </form>
                </div>
                <div id="cash-form" class="form-toggle d-none">
                    
                    <form>
                        <div class="form-group">
                            <label for="cash-amount">Montant Cash</label>
                            <input type="number" id="cash-amount" class="form-control" placeholder="Entrez le montant Cash">
                        </div>
                        <button type="submit" class="btn btn-success">Valider Retrait Cash</button>
                    </form>
                </div>
                    
                </div>
            </div>
        </div>
    </div>
    <script>
        
    const greenButton = document.getElementById('green-button');
    const cashButton = document.getElementById('cash-button');
    const greenForm = document.getElementById('green-form');
    const cashForm = document.getElementById('cash-form');

    greenButton.addEventListener('click', function() {
        greenForm.classList.add('show');
        cashForm.classList.remove('show');
    });

    cashButton.addEventListener('click', function() {
        cashForm.classList.add('show');
        greenForm.classList.remove('show');
    });

    </script>


@endsection
