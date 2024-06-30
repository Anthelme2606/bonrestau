@php
$cardData = [
[
'description' => 'Simplifiez votre gestion des bons de restaurant et maximisez les avantages grâce à notre solution innovante. Finis les tracas liés à la conservation, à l\'organisation et à la comptabilisation de vos tickets restaurant ! Notre plateforme vous offre une expérience fluide et intuitive pour tirer le meilleur parti de cette précieuse prestation.',
],
[
'description' => 'Profitez pleinement de vos pauses déjeuner en vous laissant chouchouter par notre plateforme de gestion des bons de restauration. Notre solution vous permet de savourer des repas délicieux en compagnie de vos collègues, renforçant ainsi les liens au sein de votre équipe dans une atmosphère conviviale et épanouissante.',
],
[
'description' => 'Illustration vectorielle d\'un groupe d\'employés souriants et épanouis, savourant un repas ensemble dans un cadre de travail agréable et convivial. Cette image symbolise l\'expérience de gestion des bons de restauration offerte par notre plateforme, qui permet aux utilisateurs de profiter pleinement de leurs pauses déjeuner et de renforcer les liens entre collègues.',
],
[
    'description'=>'Tirez le meilleur parti de vos tickets restaurant en les organisant et en les utilisant intelligemment. Notre interface conviviale vous offre une visibilité totale sur votre solde, vos dépenses et vos économies réalisées grâce à cette prestation. Accédez à vos informations essentielles à tout moment, depuis n\'importe quel appareil.'
],
];
@endphp

<div class="container-fluid">
    <div class="row row-cols-1 row-cols-md-4">
        @foreach($cardData as $index => $data)
        <div class="col rounded-0">
            <div class="card rounded-0 shadow-none border-0"style="background:rgba(245,251,252,1);" >
                <div class="card-header w-100 h-100  px-1 py-1 rounded">
                    <img class="w-100 h-100" src="{{ asset('assets/images/vecteur' . ($index + 1) . '.jpg') }}" alt="vecteur">
                </div>
                <div class="card-body w-100 h-100 px-0">
                    <p class="px-0">{{ $data['description'] }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
