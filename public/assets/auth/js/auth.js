
document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    const json_users = [
        {
            nom: "Dupont",
            pseudo: "dupond007",
            email: "dupont@example.com"
        },
        {
            nom: "Martin",
            pseudo: "martin34",
            email: "martin@example.com"
        },
        {
            nom: "Durand",
            pseudo: "durandpro",
            email: "durand@example.com"
        }
    ];
    
    //json_users=JSON.parse(users);
    const inputs = form.querySelectorAll('input[required], select[required]');
    const checkboxes = form.querySelectorAll('input[type="checkbox"]');
    const email = document.getElementById('email');
    const pseudo = document.getElementById('pseudo');
    const password = document.getElementById('password');
    const confirm_password = document.getElementById('confirmation');
    const numwhats = document.getElementById('numwhats');
    const numero_reseau = document.getElementById('numero_reseau');
    const one_acc = document.getElementById('one_acc');
    const info_exact = document.getElementById('info_exact');
    const perte_rev = document.getElementById('perte_rev');
    const accept_condition = document.getElementById('terms'); 
  
    const tmoney = document.getElementById('tmoney');
    const flooz = document.getElementById('flooz');
    const reseau1 = document.getElementById('reseau1');
    const reseau2 = document.getElementById('reseau2');

    tmoney.addEventListener('change', (event) => {
        if (event.target.checked) {
         
            reseau1.value = 'tmoney';
            reseau2.value = 'null';
        } 
    });

    flooz.addEventListener('change', (event) => {
        if (event.target.checked) {
            reseau1.value = 'null';
            reseau2.value = 'flooz';
        } 
    });



   pseudo.addEventListener('input',(ev)=>{
   
    validatePseudo();
   })
    function createPseudoVariable(usersArray) {
        return usersArray.reduce((acc, user) => {
            acc[user.pseudo] = user;
            return acc;
        }, {});
    }
    function createEmailVariable(usersArray) {
        return usersArray.reduce((acc, user) => {
            acc[user.email] = user;
            return acc;
        }, {});
    }
     const variable = createPseudoVariable(json_users);
     const emailVariable=createEmailVariable(json_users);

     function isPseudoInVariable(pseudo, obj) {
         
         return obj.hasOwnProperty(pseudo);
     }
     function isEmailInVariable(email, obj) {
         
        return obj.hasOwnProperty(email);
    }


    //const pseudoExists = ["user1", "user2", "user3"]; // Tableau des pseudos existants
    const reseauInputs = document.querySelectorAll('input[name="reseau"]');

    form.addEventListener('submit', function (event) {
        let isValid = true;
        inputs.forEach(function (input) {
            if (!input.value.trim()) {
                isValid = false;
                markAsInvalid(input);
            }
        });
        if (!validateEmail()) isValid = false;
        if (!validatePseudo()) isValid = false;
        if (!validatePassword()) isValid = false;
        if (!validateConfirmPassword()) isValid = false;
        if (!validateNumWhats()) isValid = false;
        if (!validateNumeroReseau()) isValid = false;
        if (!validateConditions()) isValid = false;

        if (!isValid) {
            event.preventDefault();
        }
    });
    inputs.forEach((element) => {
        if (element.type === 'checkbox' || element.type === 'radio') {
            element.addEventListener('change', (ev) => {
                validInput(element);
            });
        } else {
            element.addEventListener('input', (ev) => {
                validInput(element);
            });
        }
    });
    function validInput(element) {
        const value = element.value.trim();
        if (value === '' && element.required) {
            markAsInvalid(element);
            return false;
        }
        markAsValid(element);
        return true;
    }
   

   

    email.addEventListener('input', validateEmail);
    pseudo.addEventListener('input', validatePseudo);
    password.addEventListener('input', validatePassword);
    confirm_password.addEventListener('input', validateConfirmPassword);
    numwhats.addEventListener('input', validateNumWhats);
    numero_reseau.addEventListener('input', validateNumeroReseau);
    one_acc.addEventListener('change', validateConditions);
    info_exact.addEventListener('change', validateConditions);
    perte_rev.addEventListener('change', validateConditions);

    function validateEmail() {
        const value = email.value.trim();
        if (value === '') {
            markAsInvalid(email);
            document.getElementById('email-error').textContent = 'Email requis';
            return false;
        }
        const exists = isEmailInVariable(value, emailVariable);
        if(exists)
            {
                document.getElementById('email-error').textContent = 'Email déja pris';
                return false; 
            }
        if (!isValidEmail(value)) {
            markAsInvalid(email);
            document.getElementById('email-error').textContent = 'Email invalide';
            return false;
        }
        markAsValid(email);
        document.getElementById('email-error').textContent = '';
        return true;
    }

    function validatePseudo() {
        const value = pseudo.value.trim();
        if (value === '') {
            markAsInvalid(pseudo);
            document.getElementById('pseudo-error').textContent = 'Pseudo requis';
            return false;
        }
        const exists = isPseudoInVariable(value, variable);
        
        if (exists) {
            markAsInvalid(pseudo);
            document.getElementById('pseudo-error').textContent = 'Pseudo déjà pris';
            return false;
        }
        markAsValid(pseudo);
        document.getElementById('pseudo-error').textContent = '';
        return true;
    }

    function validatePassword() {
        const value = password.value.trim();
        if (value === '') {
            markAsInvalid(password);
            document.getElementById('password-error').textContent = 'Mot de passe requis';
            return false;
        }
        if (value.length < 8) {
            markAsInvalid(password);
            document.getElementById('password-error').textContent = 'Le mot de passe doit contenir au moins 8 caractères';
            return false;
        }
        markAsValid(password);
        document.getElementById('password-error').textContent = '';
        return true;
    }

    function validateConfirmPassword() {
        const value = confirm_password.value.trim();
        if (value === '') {
            markAsInvalid(confirm_password);
            document.getElementById('confirm_password-error').textContent = 'Confirmation du mot de passe requise';
            return false;
        }
        if (value !== password.value.trim()) {
            markAsInvalid(confirm_password);
            document.getElementById('confirm_password-error').textContent = 'Les mots de passe ne correspondent pas';
            return false;
        }
        markAsValid(confirm_password);
        document.getElementById('confirm_password-error').textContent = '';
        return true;
    }

    function validateNumeroReseau() {
        const selectedReseau = document.querySelector('input[name="reseau"]:checked');
        if (!selectedReseau) {
            document.getElementById('numero_reseau-error').textContent = 'Veuillez sélectionner un réseau';
            return false;
        }

        const value = numero_reseau.value.trim();
        const tmoneyPrefixes = ["71", "72", "70", "91", "92", "93", "90"];
        const floozPrefixes = ["79", "78", "99", "98", "97", "96"];
        let validPrefixes = selectedReseau.value === 'tmoney' ? tmoneyPrefixes : floozPrefixes;

        if (value === '') {
            markAsInvalid(numero_reseau);
            document.getElementById('numero_reseau-error').textContent = 'Numéro requis pour les transactions';
            return false;
        }
        if (!validPrefixes.some(prefix => value.startsWith(prefix))) {
            markAsInvalid(numero_reseau);
            document.getElementById('numero_reseau-error').textContent = 'Numéro de réseau invalide';
            return false;
        }
        markAsValid(numero_reseau);
        document.getElementById('numero_reseau-error').textContent = '';
        return true;
    }

    function validateNumWhats() {
        const value = numwhats.value.trim();
        const regexNumWhats = /^(90|91|92|93|70|71|72|96|97|98|99|78|79)\d{6}$/;
        if (value === '') {
            markAsInvalid(numwhats);
            document.getElementById('numwhats-error').textContent = 'Numéro WhatsApp requis';
            return false;
        }
        if (!regexNumWhats.test(value)) {
            markAsInvalid(numwhats);
            document.getElementById('numwhats-error').textContent = 'Numéro WhatsApp invalide';
            return false;
        }
        markAsValid(numwhats);
        document.getElementById('numwhats-error').textContent = '';
        return true;
    }
    
    const submiting = document.querySelector('.submiting');
    console.log(submiting);
    submiting.classList.remove('btn-primary', 'readonly');
    submiting.classList.add('btn-danger', 'readonly');
    
    accept_condition.addEventListener("change", (ev) => {
        if (accept_condition.checked) {
            console.log("message");
            submiting.classList.remove('btn-danger', 'readonly');
            submiting.classList.add('btn-primary');
            
        } else {
            submiting.classList.remove('btn-primary');
            submiting.classList.add('btn-danger', 'readonly');
           
        }
    });
    

     
    function validateConditions() {
        const conditionsChecked = one_acc.checked && info_exact.checked && perte_rev.checked ;
        if (!conditionsChecked) {
            document.getElementById('conditions-error').textContent = 'Vous devez accepter toutes les conditions';
            return false;
        }
        document.getElementById('conditions-error').textContent = '';
        return true;
    }

    function markAsInvalid(input) {
        input.classList.add('is-invalid');
    }

    function markAsValid(input) {
        input.classList.remove('is-invalid');
    }

    function isValidEmail(email) {
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(email);
    }
});
