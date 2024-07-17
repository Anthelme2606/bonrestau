 @extends('layouts.index')
 @include('layouts.dash-head')
@section('title','Création de bon')
 @section('sidebar')
<x-sidebar/>

@endsection
@section('navbar')
<x-navbar/>
@endsection 
@section('sidebar-container') 
<style>
        .side-container-bg {
            background: rgba(245, 251, 252, 1);
        }

        .container {
            max-width: 600px;
        }

        .form-container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
            position: relative;
        }

        .bon-mdi {
            margin-right: 10px;
        }

        .form-group .mdi {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #007bff;
        }

        .form-control {
            padding-left: 40px;
            border: none;
            border-bottom: 2px solid rgb(108, 108, 114);
            border-radius: 0;
            transition: border-color 0.3s;
            outline: none;
        }

        .form-control:focus {
            outline: none;
            border-bottom: 2px solid #007bff;
        }

        .input-group-text {
            border: none;
            background: none;
        }

        .form-check-input {
            margin-top: 0.3rem;
        }

        .error {
            color: red;
            font-size: 0.875rem;
        }

        .valid {
            border-bottom: 2px solid green;
        }

        @media (max-width: 768px) {
            .container {
                
                padding: 0 15px; 
            }

            .form-container {
                padding: 15px;
            }

            .form-control {
                padding-left: 35px;
            }
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
    .margin-top{
        margin-top:60px;
    }
    </style>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="mt-5 w-100">
        <h2 class="text-center text-primary mb-4">Création de bon de restauration</h2>
        <form class="form-container  shadow-sm w-100" action="{{ route('bon-store') }}" method="post" onsubmit="return validateForm()">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="price">Valeur</label>
                <div class="input-group">
                    <span class="input-group-text"><i class=" bon-mdi mdi mdi-cash"></i></span>
                    <input type="number" class="form-control" id="price" placeholder="2000" name="price" required>
                </div>
            </div>
            <div class="form-group">
                <label for="quantite">Quantité</label>
                <div class="input-group">
                    <span class="input-group-text"><i class=" bon-mdi mdi mdi-counter"></i></span>
                    <input type="number" class="form-control" id="quantite" name="quantite" required>
                </div>
            </div>
            <div class="form-group">
                <label for="date">Date d'expiration</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bon-mdi mdi mdi-calendar"></i></span>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary rounded shadow px-4">Créer <i class="mdi mdi-pencil"></i></button>
            </div>
        </form>
    </div>
</div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const price = document.getElementById('price');
    const quantite = document.getElementById('quantite');
    const date = document.getElementById('date');
    const submitButton = document.querySelector('button[type="submit"]');

    const errorMessages = {
        price: 'Valeur requise',
        quantite: 'champ requis et doit être un entier',
        date: 'Date d\'expiration requise'
    };

    const errorElements = {
        price: createErrorElement(price),
        quantite: createErrorElement(quantite),
        date: createErrorElement(date)
    };

    price.addEventListener('input', validateField);
    quantite.addEventListener('input', validateField);
    date.addEventListener('input', validateField);
    form.addEventListener('submit', validateForm);

    function validateField(event) {
        const field = event.target;
        const value = field.value.trim();
        let isValid = true;

        if (field === quantite || field === price) {
            isValid = value !== '' && Number.isInteger(Number(value));
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

        if (!validateFieldAndReturn(price)) isValid = false;
        if (!validateFieldAndReturn(quantite)) isValid = false;
        if (!validateFieldAndReturn(date)) isValid = false;

        if (!isValid) {
            event.preventDefault();
        }
    }

    function validateFieldAndReturn(field) {
        const value = field.value.trim();
        let isValid = true;

        if (field === quantite) {
            isValid = value !== '' && Number.isInteger(Number(value));
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
        const isFormValid = price.classList.contains('is-valid') &&
                            quantite.classList.contains('is-valid') &&
                            date.classList.contains('is-valid');

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

    function createErrorElement(field) {
        const errorElement = document.createElement('div');
        errorElement.className = 'error';
        field.parentNode.appendChild(errorElement);
        return errorElement;
    }
});

    </script>
   @endsection
