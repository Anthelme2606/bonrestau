@extends('layouts.html')
@section('title','Generation de code')
@section('body-container')
<div class="container my-5">
    <h4 class="text-center text-primary mb-4">Génération de lien de parrainage</h4>
  
    <div class="row justify-content-center">
      <div class="col-12 col-md-8 col-lg-6">
        <div class="input-group mb-3">
          <input type="text" class="form-control" value="" placeholder="Lien" readonly id="coptText">
          @if(Auth::check())
          <input type="hidden" id="code" value="{{Auth::user()->referral_code}}" data-link="{{route('dashboard')}}">
           @endif
          <div class="input-group-append">
            <button class="btn btn-primary" onclick="copyToClipboard()">
              <i class="mdi mdi-copy"></i> Copier
            </button>
          </div>
        </div>
  
        <div class="d-flex justify-content-center">
          <button class="btn btn-primary px-4 rounded">
            Générer un lien <i class="mdi mdi-link"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
  
  <style>
    .input-group-text {
      background-color: #007bff;
      color: #fff;
      border-color: #007bff;
    }
  </style>
  
  <script>
    function copyToClipboard() {
      var copyText = document.getElementById("coptText");
      copyText.select();
      copyText.setSelectionRange(0, 99999);
      navigator.clipboard.writeText(copyText.value);
      alert("Lien copié dans le presse-papiers !");
    }
  </script>
     

@endsection