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
            background: #ffffff;
        }
        .carte {
            width: 100%;
            height: 70px;
            display: flex;
        }

        .left-section {
            background-color: #d3d3d3; /* Gris clair */
            width: 60%;
            height: 100%;
        }

        .right-section {
            background-color: #90ee90; /* Vert clair */
            width: 50%;
            height: 100%;
        }

       
        .notebook {
            margin-top:10px;
            width: 100%;
            height: 100vh;
            background-color: #fff;
            border: 2px solid #ccc;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            position: relative;
            display: flex;
            flex-direction: row;
            transform-style: preserve-3d; 
        }

        .page {
            width: 50%;
            height: 100%;
            position: absolute;
            top: 0;
            border-left: 1px solid #ddd;
            background-color: #fefefe;
            box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.1);
            overflow: hidden; /* Ensure content is properly contained */
            transform-origin: left;
            transition: transform 0.5s ease;
        }

        .page:nth-child(1) {
            left: 0;
            
            transform: rotateY(-3deg); /* Adjusted rotation */
            z-index: 1;
        }

        .page:nth-child(2) {
            left: 50%;
            background:rgb(242, 248, 242);
            transform: rotateY(3deg); /* Adjusted rotation */
            z-index: 2;
        }

        
.page-content {
    display:flex;
    flex-direction:column;
    align-items:center;
    padding: 20px;
    height: 100%;
    box-sizing: border-box;
    overflow: auto; 
    font-family: 'Arial', sans-serif;
    color: #333; 
}


.page-content h2 {
    font-family: 'Georgia', serif;
    font-size: 28px;
    color: #4CAF50; 
    margin-top: 0;
    margin-bottom: 10px;
    border-bottom: 2px solid #4CAF50; 
    padding-bottom: 5px;
}

/* Sous-titres */
.page-content p strong {
    color: #2196F3; 
    font-weight: bold;
}

/* Paragraphes */
.page-content p {
    font-size: 16px;
    color: #666;
    line-height: 1.6;
    margin: 0 0 15px 0;
}

/* Listes */
.page-content ul {
    list-style-type: disc;
    padding-left: 20px;
}

.page-content li {
    font-size: 16px;
    color: #444;
    margin-bottom: 10px;
}

/* Personnalisation des barres de défilement */
.page-content::-webkit-scrollbar {
    width: 8px;
}

.page-content::-webkit-scrollbar-track {
    background: #e0e0e0;
    border-radius: 10px;
}

.page-content::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 10px;
}

.page-content::-webkit-scrollbar-thumb:hover {
    background: #555;
}

.page-content {
    scrollbar-width: thin;
    scrollbar-color: #888 #e0e0e0;
}

.page-content {
    -ms-overflow-style: -ms-autohiding-scrollbar;
}
.text-center{
    text-align:center;
}
@media (max-width: 768px) {
    .notebook {
        flex-direction: column;
        width: 100%;
        height: auto;
    }

    .page {
        width: 100%;
        height: auto;
        position: relative;
        transform: none; /* Remove the rotation for small screens */
        left: 0;
        border: none; /* Remove borders for better alignment */
        box-shadow: none; /* Remove inner shadows for a cleaner look */
    }
    .page:nth-child(2) {
            left: 0;
            background:rgb(242, 248, 242);
            transform: rotateY(3deg); 
            z-index: 2;
        }

}
.card{
    padding:20px;
    border-radius:0 60px 2px 2px;
    background:rgb(197, 217, 197);
}
.card,.card-header,.card-body{
  
    border:none;
   

}
/* .{
    height:100% !important;
} */
.top-right{
    width:30px;
    height:30px;
    top:0 !important;
    right:-40px !important;
    background:rgb(9, 0, 128);
    padding:5px;
    color:white;
    text-align:center;
    border-radius:50%;
    display:flex;
    justify-content: center;
    align-items: center;
    
}


     
    </style>

      

    <div class="w-100 side-container-bg">
        <div class="w-100 d-flex justify-content-center align-items-center flex-column ">
            <div class="carte">
                <div class="left-section"></div>
                <div class="right-section"></div>
            </div>
          
            <div class="notebook">
                <div class="page">
                    <div class="page-content">
                        <h2 class="text-center">Jeton d'Argent</h2>
                        <p><strong>Qu'est-ce que le jeton d'argent ?</strong></p>
                        <p>Le jeton d'argent est une monnaie virtuelle utilisée dans notre application web pour effectuer des transactions et acheter des biens et services numériques. Chaque jeton représente une unité de valeur que vous pouvez utiliser pour diverses fonctionnalités au sein de l'application.</p>
                        
                        <p><strong>Utilisation des jetons :</strong></p>
                        <ul>
                            <li>Acheter des crédits supplémentaires pour des fonctionnalités premium.</li>
                            <li>Participer à des événements exclusifs ou des concours.</li>
                            <li>Récompenses et bonus pour une utilisation régulière de l'application.</li>
                        </ul>
                        
                        <p><strong>Avantages :</strong></p>
                        <ul>
                            <li>Transactions rapides et sécurisées.</li>
                            <li>Pas de frais de transaction supplémentaires.</li>
                            <li>Facilité d'utilisation et gestion simplifiée.</li>
                        </ul>
                        
                        <p>Pour plus d'informations sur les jetons d'argent et leur gestion, veuillez consulter notre guide ou contacter notre support client.</p>
                    </div>
                </div>
                @if($jeton && $jeton!==null)
                <div class="page">
                    <div class="page-content">
                        <div class="row row-cols-1 row-cols-md-3 g-1">
                            @foreach($jeton as $key=>$value)
                         
                            <div class=" col w-100 flex-grow-1">
                                @if($key && $key >=1000)
                                <div class="card d-flex justify-content-center align-items-center flex-column ">
                                    <div class="card-header position-relative">
                                     <span class="position-absolute top-right">
                                         {{$value}}
                                     </span>
 
                                    </div>
                                    <div class="card-body">
                                         
                                        <x-billet :valeur=" $key "/>
                                     
                                    </div>
                                 </div>
                                @else
                                 <div class="card d-flex justify-content-center align-items-center flex-column ">
                                    <div class="card-header position-relative">
                                     <span class="position-absolute top-right">
                                         {{$value}}
                                     </span>
 
                                    </div>
                                    <div class="card-body">
                                         
                                        <x-jeton :valeur="$key" :size="90"  :fvSize="14" :ftSize:="10"/>
                                     
                                    </div>
                                 </div>

                                @endif
                            </div>
                            @endforeach
                          
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>


@endsection
