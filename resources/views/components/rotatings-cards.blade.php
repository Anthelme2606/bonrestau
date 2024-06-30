<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const cards = document.querySelectorAll('.card');
        let angle = 0;

        function rotateCards() {
            angle += 0.5;
            cards.forEach((card, index) => {
                const rotation = parseFloat(card.style.getPropertyValue('--rotation'));
                card.style.transform = `rotate(${rotation + angle}deg) translate(200px) rotate(-${rotation + angle}deg) rotateX(20deg) rotateY(20deg)`;
            });
            requestAnimationFrame(rotateCards);
        }

        rotateCards();
    });
</script>
<div class="rotating-cards">
    <img src="{{ asset('assets/images/rotate.png') }}" class="center-image " alt="Center Image">
    <div class="card carde card-tilted" style="--rotation: 0deg;">Connexion</div>
    <div class="card carde card-tilted" style="--rotation: 90deg;">Parrainé</div>
    <div class="card carde card-tilted" style="--rotation: 180deg;">Achat de ticket</div>
    <div class="card carde card-tilted" style="--rotation: 270deg;">Bon de restaurant</div>
</div>
<style>

        .center-image {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            
            width:100%;
            height:100%;
        }
        .rotating-cards {
            position: relative;
            width: 100%;
            height: 50vh;
            overflow: hidden;
        }
        .carde {
            width: 150px;
            height: 100px;
            position: absolute;
            background:rgb(205,185,120);
            top: 50%;
            left: 50%;
            transform-origin: center center;
            transform-style: preserve-3d;
            z-index: 999;

        }
        .card-tilted {
            transform: rotateX(20deg) rotateY(20deg);
        }
   

</style>