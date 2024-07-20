@extends('layouts.html')
@section('title','Home')
@section('body-container')
<x-hero/>
 <link rel="stylesheet" href="{{asset('assets/css/home.css')}}?v=<?php echo time();?>">
<div id="coaching-program" class="section">
    <div class="container">
        <div class="section-heading">
            <h2>Programme de Coaching 35+ Santé</h2>
            <p>Le bien-être est défini souvent à travers l’expression un esprit sain dans un corps sain, tandis que le bien-être intégral a un champ d’action encore plus large, il touche les 7 dimensions suivantes :</p>
        </div>
        <div class="row">
            <div class="col-md-6">
                <ul class="dimension-list">
                    <li><i class="fas fa-dumbbell"></i>La Dimension Physiologique ou physique</li>
                    <li><i class="fas fa-heart"></i>La Dimension Émotionnelle</li>
                    <li><i class="fas fa-brain"></i>La Dimension Mentale (psychologique)</li>
                    <li><i class="fas fa-praying-hands"></i>La Dimension Spirituelle (relation entre vous et votre créateur)</li>
                    <li><i class="fas fa-users"></i>La Dimension Sociale ou relationnelle (famille, amis, la société en générale)</li>
                    <li><i class="fas fa-briefcase"></i>La Dimension Professionnelle</li>
                    <li><i class="fas fa-piggy-bank"></i>La Dimension Financière</li>
                </ul>
            </div>
            <div class="col-md-6">
                <p>Le programme 35+Santé est un programme de coaching qui a pour mission de vous offrir des secrets, astuces, techniques et surtout des conseils afin de vous garantir un bien-être intégral dans toutes ses dimensions.</p>
            </div>
        </div>
    </div>
</div>

    <x-list-scroll/>
     <!-- Acquis Section -->
     <div class="section section-acquis">
        <div class="container">
            <div class="section-heading">
                <h2>Les Acquis</h2>
            </div>
            <p>Après avoir suivi le coaching, vous serez capables de créer votre propre bien-être tous les jours de votre vie, de maintenir votre poids, de purifier et de revitaliser votre organisme (notamment les cellules et les glandes), de permettre à votre corps de produire l’élixir de jouvence afin de bénéficier d’un rajeunissement perpétuel. Vous obtiendrez aussi la capacité de changer le tissu de votre réalité en remodelant votre vie à votre façon.</p>
            <p>Avec le programme 35+Santé, vous aurez la capacité de vivre au-delà de 100 ans dans un jeune corps de 35-40 ans. 35+Santé, c’est la prévention et l’entretien au quotidien.</p>
        </div>
    </div>
     <!-- Community Section -->
     <div id="community" class="section">
        <div class="container">
            <div class="section-heading text-center mb-4">
                <h2>La Communauté 35+ Santé</h2>
            </div>
            <p class="text-center">La communauté 35+ Santé regroupe des personnes soucieuses de leur bien-être physiologique, mental, émotionnel, relationnel, spirituel et financier.</p>
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Réseau de Bien-Être</h5>
                            <p class="card-text">Création du réseau de bien-être : vous créez votre réseau de bien-être lorsque vous inscrivez vos amis et proches au sein de la communauté et qu’ils en font autant. Si vous inscrivez 10 personnes et que ces derniers en font de même ainsi de suite sur 5 niveaux, vous aurez plus de 110 000 personnes dans votre réseau de bien-être.</p>
                        </div>
                    </div>
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Description de la Matrice GR</h5>
                            <p class="card-text">La Matrice GR (Générateur de Revenus) vous permettra de gagner plusieurs types de revenus :</p>
                            <ul>
                                <li><i class="fa fa-money-bill-wave text-green"></i> La monétisation des canaux des membres de votre réseau de bien-être</li>
                                <li><i class="fa fa-chart-line text-green"></i> Les chiffres d’affaires des vitrines des membres de votre réseau de bien-être</li>
                                <li><i class="fa fa-shopping-cart text-green"></i> Les commissions sur l’achat direct des membres de votre réseau de bien-être dans le shop de VEGAN MEAL HUT</li>
                                <li><i class="fa fa-users text-green"></i> Les commissions sur les activités de tous les membres de votre réseau de bien-être</li>
                            </ul>
                            <p class="card-text">Types de matrices GR :</p>
                            <ul>
                                <li><i class="fa fa-clock text-green"></i> MGR basé sur l’ancienneté</li>
                                <li><i class="fa fa-network-wired text-green"></i> MGR du réseau de bien-être</li>
                                <li><i class="fa fa-gift text-green"></i> MGR bonus de bienvenue pour les nouveaux membres</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Ma Boutique</h5>
                            <p class="card-text">Boutique en ligne…vente d’article. Chaque membre de la communauté aura la possibilité de poster des articles à vendre dans sa vitrine et faire de la publicité au sein de son réseau de bien-être.</p>
                        </div>
                    </div>
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Mon Canal</h5>
                            <p class="card-text">Chaque membre de la communauté aura la possibilité de créer un canal de diffusion auquel les membres de la communauté peuvent s’abonner à 1fr cfa/jour soit 365fr cfa/an. De façon concrète, si vous avez 100 000 personnes qui sont abonnés à votre canal, cela vous fera un revenu de 100 000fr cfa/jour soit 36 500 000fr cfa/an. Tout à fait incroyable…</p>
                            <p class="card-text">Pour chaque élément posté dans le canal, vous pouvez avoir des likes en :</p>
                            <ul>
                                <li><i class="fa fa-coins text-green"></i> Argent (100fr)</li>
                                <li><i class="fa fa-medal text-green"></i> Or (500fr)</li>
                                <li><i class="fa fa-gem text-green"></i> Platine (1000fr)</li>
                                <li><i class="fa fa-leaf text-green"></i> Émeraude (5000fr)</li>
                                <li><i class="fa fa-gem text-green"></i> Diamant (10 000fr)</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Mes Revenus</h5>
                            <p class="card-text">Description des différents revenus :</p>
                            <ul>
                                <li><i class="fa fa-money-check-alt text-green"></i> Les revenus canal monétisés</li>
                                <li><i class="fa fa-store text-green"></i> Les revenus boutique</li>
                                <li><i class="fa fa-utensils text-green"></i> Les revenus Vegan Meal Hut</li>
                                <li><i class="fa fa-hand-holding-usd text-green"></i> Les revenus-commission</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Ma liquidité</h5>
                            <p class="card-text">Ma liquidité est un portefeuille dans lequel est versé 5% de votre revenu total. Elle vous permettra de faire vos abonnements aux canaux de votre choix, de liker les éléments postés par la communauté, de faire vos achats dans les différentes vitrines et d’autres transactions.</p>
                           
                        </div>
                    </div>
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Vegan Meal Hut Shop</h5>
                            <p class="card-text">Boutique de Vegan Meal Hut. Seront vendus dans ce shop des produits consommables :</p>
                            <ul>
                                <li><i class="fa fa-leaf text-green"></i> Produits 100% végétales</li>
                                <li><i class="fa fa-utensils text-green"></i> Les kits de bons de restaurations</li>
                                <li><i class="fa fa-box text-green"></i> Les articles ordinaires</li>
                            </ul>
                            <p class="card-text">Ces produits seront injectés périodiquement dans le réseau pour créer de la liquidité qui alimentera les activités des membres.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <x-rotatings-cards/> --}}


@include('layouts.footer')

@endsection
