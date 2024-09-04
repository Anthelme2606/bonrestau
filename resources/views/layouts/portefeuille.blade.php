@extends('layouts.index')
@include('layouts.dash-head')
@section('title', 'portefeuille')
@section('sidebar')
    <x-sidebar />

@endsection
@section('navbar')
    <x-navbar />
@endsection
@section('sidebar-container')
<style>
    
    .side-container-bg  {
    background: linear-gradient(to bottom right, #fff9c4, #fff59d);
    min-height: 100vh;
}
.card {
    background-color: rgba(255, 255, 255, 0.6);
    backdrop-filter: blur(10px);
    border: 1px solid #ffd54f;
    transition: all 0.3s ease;
}
.card:hover {
    transform: scale(1.05);
    background-color: rgba(255, 252, 232, 0.7);
}
.action-icon {
    width: 48px;
    height: 48px;
    stroke: #f9a825;
    transition: stroke 0.3s ease;
}
.card:hover .action-icon {
    stroke: #f57f17;
}
.welcome-card {
    background-color: rgba(255, 255, 255, 0.6);
    backdrop-filter: blur(10px);
}
.phone-number {
    background-color: #fff9c4;
    color: #f57f17;
}
.balance-amount {
    color: #f57f17;
}
.action-title {
    color: #f57f17;
    transition: color 0.3s ease;
}
.card:hover .action-title {
    color: #e65100;
}

</style>
   
   
   
    

@include('coupons.retrait')

<div class="side-container-bg d-flex justify-content-center align-items-center ">
    <div class="container py-4">
        <div class="welcome-card rounded-3 p-3 mb-4 d-flex flex-column flex-sm-row justify-content-between align-items-center">
            <h1 class="fs-4 fw-bold mb-2 mb-sm-0 text-warning">Bienvenue {{Auth::user()->pseudo}}</h1>
            <p class="phone-number rounded-pill px-3 py-1">{{Auth::user()->numero_reseau}}</p>
        </div>

        <div class="card mb-4 text-center">
            <div class="card-body">
                <h2 class="card-title fs-4 text-warning">Solde du portefeuille</h2>
                <p class="balance-amount display-4 fw-bold">{{Auth::user()->balance}} Green</p>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-2 g-1 g-md-4">
            <div class="col">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <svg class="action-icon mb-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="4" width="20" height="16" rx="2"/>
                            <line x1="6" y1="8" x2="6" y2="8"/>
                            <line x1="10" y1="8" x2="18" y2="8"/>
                            <line x1="6" y1="12" x2="6" y2="12"/>
                            <line x1="10" y1="12" x2="18" y2="12"/>
                            <line x1="6" y1="16" x2="6" y2="16"/>
                            <line x1="10" y1="16" x2="18" y2="16"/>
                        </svg>
                        <h3 class="action-title fs-5 fw-semibold text-center">Achat de BON</h3>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100" data-bs-toggle="modal" data-bs-target="#retraitModal">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <svg class="action-icon mb-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="6" width="20" height="12" rx="2"/>
                            <circle cx="12" cy="12" r="2"/>
                            <path d="M6 12h.01M18 12h.01"/>
                        </svg>
                        <h3 class="action-title fs-5 fw-semibold text-center">Retrait CASH</h3>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <svg class="action-icon mb-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17 3L21 7L17 11"/>
                            <path d="M3 13L7 17L3 21"/>
                            <path d="M21 7H3"/>
                            <path d="M3 17H21"/>
                        </svg>
                        <h3 class="action-title fs-5 fw-semibold text-center">TRANSFERT INTER RESEAU</h3>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <svg class="action-icon mb-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"/>
                            <polyline points="12 6 12 12 16 14"/>
                        </svg>
                        <h3 class="action-title fs-5 fw-semibold text-center">HISTORIQUE DE TRANSACTION</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

     

    
   
</div>
<script>
    document.querySelectorAll('.card').forEach(card => {
        card.addEventListener('click', () => {
            // Ici, vous pouvez ajouter la logique pour chaque action
            console.log('Action clicked:', card.querySelector('.action-title').textContent);
        });
    });
</script>



@endsection
