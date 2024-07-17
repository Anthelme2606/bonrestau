@extends('layouts.index')
@include('layouts.dash-head')
@section('title','Validation')
@section('sidebar')
<x-sidebar/>

@endsection
@section('navbar')
<x-navbar/>
@endsection 

@section('sidebar-container')
<style>
    .side-container-bg{
        background:rgba(245,251,252,1);
    }
        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            max-width: 500px;
            height: 100vh;
        }

        .form-box {
            border: none;
            outline: none;
            width: 100%;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .form-label {
            margin-top: 10px;
        }

        .btn-primary {
            background-color: rgb(0, 157, 255);
            border-color: rgb(0, 51, 255);
            margin-top: 20px;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #379ad4;
            border-color: #37d4d4;
        }

        .error {
            color: red;
            font-size: 0.875rem;
            margin-top: 5px;
        }

        .is-invalid {
            border-bottom: 2px solid red !important;
        }

        .is-valid {
            border-bottom: 2px solid green !important;
        }

        .readonly {
            pointer-events: none;
            opacity: 0.6;
        }

        .form-group {
            position: relative;
            margin-bottom: 1rem;
        }

       

        .form-control {
            padding-left: 2.5rem;
        }
        .is-invalid {
        border-bottom: 2px solid red !important;
    }

    .is-valid {
        border-bottom: 2px solid green !important;
    }

    .error {
        color: red;
        font-size: 0.875rem;
        margin-top: 5px;
    }

    .readonly {
        pointer-events: none;
        opacity: 0.6;
    }

    .form-group {
        position: relative;
        margin-bottom: 1rem;
    }

    .mdi-v {
        position: absolute;
        top: 35px;
        left: -8px;
        font-size: 1.2rem;
    }

    .form-control {
            padding-left: 40px;
            border: none;
            border-bottom: 2px solid rgb(108, 108, 114);
            border-radius: 0;
            transition: border-color 0.3s;
            outline: none;
        }
        </style>
   <div class="container  d-flex justify-content-center align-items-center vh-100">
        <div class="form-box mt-5 w-100">
            <form id="myForm w-100" action="{{ route('trans-store') }}" method="POST">
                @csrf
                @method("POST")
                <div class="mb-3 d-flex justify-content-center align-items-center">
                    <h4>Créer une transaction ici</h4>
                </div>

                <div class="form-group">
                    <label for="user_code" class="form-label">Code d'utilisateur</label>
                    <i class=" text-success mdi-v mdi mdi-account"></i>
                    <input type="text" class="form-control" id="user_code" name="user_code" required>
                    <div class="error" id="user_code-error"></div>
                </div>

                <div class="form-group">
                    <label for="coupon_code" class="form-label">Code du Coupon</label>
                    <i class="mdi mdi-v text-danger mdi-ticket-percent"></i>
                    <select class="form-control" id="coupon_code" name="coupon_price" required>
                        <option value="" disabled selected>Selectionnez coupon par son prix..</option>
                        @if(isset($coupons))
                        @foreach($coupons as $coupon)
                        <option value="{{ $coupon->price }}">{{ $coupon->price }}</option>
                        @endforeach
                        @endif
                    </select>
                    <div class="error" id="coupon_code-error"></div>
                </div>

                <div class="form-group">
                    <label for="quantite" class="form-label">Quantité</label>
                    <i class="mdi mdi-v text-primary mdi-cube-outline"></i>
                    <input type="number" step="0.01" class="form-control" id="quantite" name="quantite" value="0" required>
                    <div class="error" id="qte-error"></div>
                </div>

                <div class="form-group">
                    <label for="percent " class="form-label">Gain pourcent(%)</label>
                    <i class="mdi mdi-v text-info mdi-percent"></i>
                    <input type="number" step="0.01" class="form-control" id="percent" value="0" name="percent" required>
                    <div class="error" id="percent-error"></div>
                </div>

                <button type="submit" class="btn btn-primary" id="submitBtn">Lancer la transaction</button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const userCode = document.getElementById('user_code');
    const couponCode = document.getElementById('coupon_code');
    const quantite = document.getElementById('quantite');
    const percent = document.getElementById('percent');
    const submitButton = document.getElementById('submitBtn');

    const errorMessages = {
        user_code: "Veuillez entrer le code d'utilisateur",
        coupon_code: 'Veuillez sélectionner un coupon',
        quantite: 'Quantité requise et doit être un nombre',
        percent: 'Pourcentage requis et doit être un nombre'
    };

    const errorElements = {
        user_code: document.getElementById('user_code-error'),
        coupon_code: document.getElementById('coupon_code-error'),
        quantite: document.getElementById('qte-error'),
        percent: document.getElementById('percent-error')
    };

    userCode.addEventListener('input', validateField);
    couponCode.addEventListener('input', validateField);
    quantite.addEventListener('input', validateField);
    percent.addEventListener('input', validateField);
    form.addEventListener('submit', validateForm);

    function validateField(event) {
        const field = event.target;
        const value = field.value.trim();
        let isValid = true;

        if (field === quantite || field === percent) {
            isValid = value !== '' && !isNaN(value);
        } else {
            isValid = value !== '';
        }

        if (isValid) {
            field.classList.remove('is-invalid');
            field.classList.add('is-valid');
            errorElements[field.id].textContent = '';
        } else {
            field.classList.remove('is-valid');
            field.classList.add('is-invalid');
            errorElements[field.id].textContent = errorMessages[field.id];
        }

        validateButtonState();
    }

    function validateForm(event) {
        let isValid = true;

        if (!validateFieldAndReturn(userCode)) isValid = false;
        if (!validateFieldAndReturn(couponCode)) isValid = false;
        if (!validateFieldAndReturn(quantite)) isValid = false;
        if (!validateFieldAndReturn(percent)) isValid = false;

        if (!isValid) {
            event.preventDefault();
        }
    }

    function validateFieldAndReturn(field) {
        const value = field.value.trim();
        let isValid = true;

        if (field === quantite || field === percent) {
            isValid = value !== '' && !isNaN(value);
        } else {
            isValid = value !== '';
        }

        if (isValid) {
            field.classList.remove('is-invalid');
            field.classList.add('is-valid');
            errorElements[field.id].textContent = '';
        } else {
            field.classList.remove('is-valid');
            field.classList.add('is-invalid');
            errorElements[field.id].textContent = errorMessages[field.id];
        }

        return isValid;
    }

    function validateButtonState() {
        const isFormValid = userCode.classList.contains('is-valid') &&
                            couponCode.classList.contains('is-valid') &&
                            quantite.classList.contains('is-valid') &&
                            percent.classList.contains('is-valid');

        if (isFormValid) {
            submitButton.classList.remove('readonly');
            submitButton.classList.remove('btn-danger');
            submitButton.classList.add('btn-primary');
            submitButton.disabled = false;
        } else {
            submitButton.classList.add('readonly');
            submitButton.classList.add('btn-danger');
            submitButton.classList.remove('btn-primary');
            submitButton.disabled = true;
        }
    }
});

    </script>
   @endsection