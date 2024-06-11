/*function validPassword(password) {
    // Regex pour vérifier les critères du mot de passe
    const minLength = 8;
    const specialCharPattern = /[@!#\$%\^\&*\)\(+=._-]/; // Vous pouvez ajouter d'autres caractères spéciaux si nécessaire
    const uppercasePattern = /[A-Z]/;

    // Vérifier la longueur du mot de passe
    if (password.length < minLength) {
        return 'error';
    }

    // Vérifier la présence d'un caractère spécial et d'une majuscule
    if (!specialCharPattern.test(password) || !uppercasePattern.test(password)) {
        return 'error';
    }

    return 'success';
}

document.addEventListener('DOMContentLoaded', () => {
    const passwordInput = document.querySelector('.signup-form .mb-1 input[type="password"]');
    const form = document.querySelector('.signup-form');

    if (passwordInput) {
        passwordInput.addEventListener('input', () => {
            const result = validPassword(passwordInput.value);
            if (result === 'error') {
                passwordInput.classList.remove('bottom_border_success');
                passwordInput.classList.add('bottom_border_error');
                form.onsubmit = (e) => e.preventDefault(); // Empêche l'envoi du formulaire
            } else {
                passwordInput.classList.remove('bottom_border_error');
                passwordInput.classList.add('bottom_border_success');
                form.onsubmit = null; // Autorise l'envoi du formulaire
            }
        });
    }
});*/
"use strict";