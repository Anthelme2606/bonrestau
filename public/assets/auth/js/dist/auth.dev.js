"use strict";

function validPassword(password) {
  // Regex pour vérifier les critères du mot de passe
  var minLength = 8;
  var specialCharPattern = /[@!#\$%\^\&*\)\(+=._-]/; // Vous pouvez ajouter d'autres caractères spéciaux si nécessaire

  var uppercasePattern = /[A-Z]/; // Vérifier la longueur du mot de passe

  if (password.length < minLength) {
    return 'error';
  } // Vérifier la présence d'un caractère spécial et d'une majuscule


  if (!specialCharPattern.test(password) || !uppercasePattern.test(password)) {
    return 'error';
  }

  return 'success';
}

document.addEventListener('DOMContentLoaded', function () {
  var passwordInput = document.querySelector('.signup-form .mb-1 input[type="password"]');
  var form = document.querySelector('.signup-form');

  if (passwordInput) {
    passwordInput.addEventListener('input', function () {
      var result = validPassword(passwordInput.value);

      if (result === 'error') {
        passwordInput.classList.remove('bottom_border_success');
        passwordInput.classList.add('bottom_border_error');

        form.onsubmit = function (e) {
          return e.preventDefault();
        }; // Empêche l'envoi du formulaire

      } else {
        passwordInput.classList.remove('bottom_border_error');
        passwordInput.classList.add('bottom_border_success');
        form.onsubmit = null; // Autorise l'envoi du formulaire
      }
    });
  }
});