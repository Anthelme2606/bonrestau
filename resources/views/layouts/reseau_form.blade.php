@extends('layouts.index')
@include('layouts.dash-head')
@section('title', 'jetons')
@section('sidebar')
    <x-sidebar />

@endsection
@section('navbar')
    <x-navbar />
@endsection

@section('sidebar-container')
<style>
  
    
    .side-container-bg {
                background: linear-gradient(to bottom right, #fff9c4, #fff59d);
            
            }
            .form-container {
                background-color: rgba(255, 255, 255, 0.8);
                backdrop-filter: blur(10px);
                border-radius: 15px;
                border: 2px solid #ffd54f;
                padding: 2rem;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                max-width: 400px;
                width: 100%;
            }
            .form-title {
                color: #f57f17;
                font-weight: bold;
                margin-bottom: 1.5rem;
            }
            .form-label {
                color: #f57f17;
            }
            .form-control:focus {
                border-color: #ffd54f;
                box-shadow: 0 0 0 0.2rem rgba(255, 213, 79, 0.25);
            }
            .btn-primary {
                background-color: #f57f17;
                border-color: #f57f17;
            }
            .btn-primary:hover, .btn-primary:focus {
                background-color: #e65100;
                border-color: #e65100;
            }
            .invalid-feedback {
                color: #e65100;
            }
        </style>
   
   
   
    



<div class="side-container-bg d-flex justify-content-center align-items-center vh-100">
      
    
        <div class="form-container">
            <h2 class="form-title text-center">Confirmation du numéro de reseau (Flooz/Tmoney)</h2>
            <form id="phoneConfirmationForm" action="{{route('reseau-number')}}" method="POST">
                @method('POST')
                @csrf
                <div class="mb-3">
                    <label for="phoneNumber" class="form-label">Numéro de réseau
                        {{Auth::user()->numero_reseau}}
                    </label>
                    <input type="tel" class="form-control" name="reseau" id="phoneNumber" required>
                   
                </div>
              
                <button type="submit" class="btn btn-primary w-100" id="submitButton">
                    <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true" style="display: none;"></span>
                    <span class="button-text">Confirmer</span>
                </button>
            </form>
        </div>
    
   
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('phoneConfirmationForm');
    const submitButton = document.getElementById('submitButton');
    const spinner = submitButton.querySelector('.spinner-border');
    const phone = document.getElementById('phoneNumber');
    const buttonText = submitButton.querySelector('.button-text');

    form.addEventListener('submit', function(event) {
      
        if (phone.value === '' || phone.value.length < 6) {
            event.preventDefault();
            event.stopPropagation();
            submitButton.disabled = false;
        } else {
         
            spinner.style.display = 'inline-block';
            buttonText.textContent = 'Confirmation en cours...';
            submitButton.disabled = true; 
        }
    });
});

</script>


@endsection
