@extends('layouts.index')
@include('layouts.dash-head')
@section('title','Generation du lien')
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
    .header-gen {
      padding: 20px;
      background-color: rgba(245, 251, 252, 1);
      box-shadow:0 0 10px rgba(0,0,2,0.1);
      border-bottom: 1px solid #dee2e6;
    }
    .form-select {
      width: 100%;
    }
    @media (max-width: 768px) {
      .phone-screen {
        display: flex;
        flex-direction:column;
      }

      .copy-link-container {
        position: relative;
        top: -10px;
        right: -10px;
        width: 100%;
        justify-content: center;
        margin-bottom: 10px;
      }
      .readonly-input {
        width: 100%;
      }
    }
    .copy-link-container {
      position: absolute;
      top: -20px;
      right: -20px;
      display: flex;
      align-items: center;
    }
    .readonly-input {
      margin-right: 5px;
      padding: 5px;
      border: 1px solid #ced4da;
      border-radius: 4px;
      width: 250px;
    }
  

.card {
    position:relative;
    background-color: white;
    border-radius: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    /* max-width: 220px; */
    padding: 30px;
    text-align: center;
    border:none;
   
    border-bottom-right-radius:40%;
}
.icon{
    position:absolute;
    left: 0;
    right:0;
    transform:translateY(-70px);
    
}

.icon {
    background-color: rgba(245,251,252,1);
    border-radius: 50%;
    padding: 20px;
    width: 65px;
    height: 65px;
    margin: 0 auto 20px;
    display: flex;
    justify-content: center;
    align-items: center;
   
}
.wht{
  border-radius:50%;
  padding:25px;
    display: flex;
    justify-content: center;
    align-items: center;
    background:#fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    height:40px;
    width:40px;
    
    text-align:center;
    
}

 img {
    text-align:center;
    width: 40px;
    height: 40px;
    border-radius:50%;
    text-align:center;
}

.content h1 {
    font-size: 18px;
    color: #333;
    margin-bottom: 10px;
}

.content p {
    font-size: 14px;
    color: #777;
}
.margin-top{
  margin-top:100px;
}
    </style>
 
  <div class="w-100 side-container-bg position-relative  margin-top ">
    @if(session('link'))
    <div class="copy-link-container">
      <input type="text" class="readonly-input" value="{{session('link')}}" readonly>
      <button class="btn btn-outline-secondary" onclick="copyLink(this)">
        <i class="mdi mdi-content-copy"></i>
      </button>
     
    </div>
    @endif
    <div class="d-flex justify-content-center align-items-center header-gen w-100">
      <div class="d-flex justify-content-between phone-screen w-100">
        <div class="form d-flex flex-column">
          <p id="copyMessage" class="text-success fw-5">Lien copié dans la presse papier.</p>
         <form class="d-flex-flex-column" action="{{route('generate-link')}}" method="post">
          @method('POST')
          @csrf
          <div class="mb-3">
            <select class="form-select" name="time_expire">
              <option disabled value="">Choisissez le temps d'expiration de votre lien</option>
              <option value="24h">24heure par defaut</option>
              <option value="1week">1 Semaine</option>
              <option value="1month">1 Mois</option>
            </select>
          </div>
          <div class="mb-3">
            <button class="px-4 mx-4 btn btn-primary border-none rounded shadow" type="submit">Générer</button>
          </div>
        </form>
        </div>
        <div class="hero-gen mx-2">
          <p>Veuillez générer un lien et le copier pour partager sur vos canaux de communication entre vos amis.</p>
        </div>
      </div>
    </div>
    <div class="mt-5 d-flex justify-content-center align-items-center w-100">
    <div class="row row-cols-1 row-cols-md-4 g-2 w-100">
 <div class="col">
    <div class="card">
        <div class="icon text-center">
        <div class="wht rounded-circle">
            <img class="image-ronde text-center" src="{{asset('assets/images/logo-bonr.png')}}" alt="Icon">
        </div>
         
        </div>
        <div class="content">
            <h1>1.GREENDETOX</h1>
            <p>Devenez des proches et amis dans le relationnel de GREENDETOX..</p>
        </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
        <div class="icon text-center">
        <div class="wht rounded-circle">
            <img class="image-ronde text-center" src="{{asset('assets/images/image-v.png')}}" alt="Icon">
        </div>
         
        </div>
        <div class="content">
            <h1>2.FAMILLE</h1>
            <p>Forme avec tes freres ou amis  une famille sur GREENDETOX..</p>
        </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
        <div class="icon text-center">
        <div class="wht rounded-circle">
            <img class="image-ronde text-center" src="{{asset('assets/images/bon.png')}}" alt="Icon">
        </div>
         
        </div>
        <div class="content">
            <h1>3.REVENUE</h1>
            <p>Gagnez de l'argent sur GREENDETOX ? Oui c'est possible ...</p>
        </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
        <div class="icon text-center">
        <div class="wht rounded-circle">
            <img class="image-ronde text-center" src="{{asset('assets/images/herogen.png')}}" alt="Icon">
        </div>
         
        </div>
        <div class="content">
            <h1>4.LIEN SOLIDE</h1>
            <p>Avec GREENDETOX, une communauté solide et épanoui... </p>
        </div>
    </div>
  </div>
  </div>
    </div>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const copyMessage = document.getElementById('copyMessage');
        if (copyMessage) {
            copyMessage.style.display = 'none';
            copyMessage.style.color = 'green';
        }
    
        window.copyLink = function(icon) {
            const linkInput = icon.previousElementSibling;
            if (linkInput && linkInput.select && document.execCommand) {
                linkInput.select();
                linkInput.setSelectionRange(0, 99999); 
    
                try {
                    document.execCommand('copy');
                    if (copyMessage) {
                        copyMessage.style.display = 'block';
                        setTimeout(() => {
                            copyMessage.style.display = 'none';
                        }, 2000);
                    }
                } catch (err) {
                    console.error('Unable to copy', err);
                }
            } else if (navigator.clipboard) {
                navigator.clipboard.writeText(linkInput.value).then(() => {
                    if (copyMessage) {
                        copyMessage.style.display = 'block';
                        setTimeout(() => {
                            copyMessage.style.display = 'none';
                        }, 2000);
                    }
                }).catch(err => {
                    console.error('Unable to copy', err);
                });
            }
        };
    });
    </script>
    
   @endsection