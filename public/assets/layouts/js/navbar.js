document.addEventListener('DOMContentLoaded', function() {
    // Ajoute la classe 'active' à la balise 'a' de la barre de navigation correspondant à l'URL actuelle
    document.querySelectorAll('.nav-link').forEach(function(link) {
        const url = window.location.href;
        if (link.getAttribute('href') === url) {
            link.classList.add('active');
        }
    });

    // Masque la boîte de cadre lorsque l'utilisateur clique en dehors de celle-ci
    document.addEventListener('click', function(event) {
        const frame = document.querySelector('.frame');
        if (!event.target.closest('.frame') && frame.style.display === 'block') {
            frame.style.display = 'none';
        }
    });

    // Affiche ou masque la boîte de cadre lorsque le bouton de menu est cliqué
    document.getElementById('menuButton').addEventListener('click', function(event) {
        event.stopPropagation();
        const frame = document.querySelector('.frame');
        frame.style.display = frame.style.display === 'block' ? 'none' : 'block';
    });


   // Fonction pour vérifier la taille de l'écran

  
  
});
