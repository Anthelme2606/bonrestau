
    <style>
        /* Couleurs de fond du modal */
        .modal-card {
            background: linear-gradient(135deg, #fff9c4, #fff59d);
            border: 2px solid #f57f17;
            border-radius: 15px;
            padding: 20px;
            max-width: 500px;
            margin: auto;
        }
        /* Boutons de choix de retrait */
        .btn-group .btn {
            flex-grow: 1;
            transition: background-color 0.3s, color 0.3s;
        }
        .btn.active {
            border-bottom: 3px solid #f57f17;
            color: #fff;
        }
        .btn-green {
            background-color: #4caf50;
        }
        .btn-flooz {
            background-color: #f57f17;
        }
        .btn-tmoney {
            background-color: #f9a825;
        }
        .btn-card {
            background-color: #fbc02d;
        }
        .btn-group .btn:hover {
            background-color: #ffeb3b;
            color: #000;
        }
        /* Masquer les sections */
        .withdraw-section {
            display: none;
        }
        /* Transition de l'affichage des sections */
        .withdraw-section.show {
            display: block;
            animation: fadeIn 0.5s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>



    <!-- Modal -->
    <div class="modal fade" id="retraitModal" tabindex="-1" aria-labelledby="retraitModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modal-card">
                <div class="modal-header">
                    <h5 class="modal-title" id="retraitModalLabel">Retrait d'Argent</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Boutons de sélection -->
                    <div class="btn-group mb-4 d-flex" role="group" aria-label="Mode de retrait">
                        <button type="button" class="btn btn-green active" onclick="showSection('green')">Cash</button>
                        <button type="button" class="btn btn-flooz" onclick="showSection('flooz')">Flooz</button>
                        <button type="button" class="btn btn-tmoney" onclick="showSection('tmoney')">Tmoney</button>
                        <button type="button" class="btn btn-card" onclick="showSection('card')">Compte Bancaire</button>
                    </div>

                    <!-- Section Green -->
                    <form class="green-form" action="{{route('cash')}}" method="POST">
                        @method('POST')
                        @csrf
                    <div id="green-section" class="withdraw-section show">
                        <div class="mb-3">
                            <label for="transactionNumber" class="form-label">Numéro de Transaction</label>
                            <input type="text" value="{{Auth::user()->numero_reseau}}" readonly class="form-control" id="transactionNumber" placeholder="Entrez le numéro" required>
                        </div>
                        <div class="mb-3">
                            <label for="withdrawAmountGreen" class="form-label">Montant à retirer</label>
                            <input type="number" class="form-control" name="sommes" id="withdrawAmountGreen" min="1" placeholder="Entrez le montant" required>
                        </div>
                        <div class="mb-3">
                            <label for="operatorId" class="form-label">Identifiant de l'opérateur</label>
                            <input type="text" class="form-control" id="operatorId" name="identifiant" placeholder="Entrez l'identifiant" required>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Valider</button>
                    </div>
                </form>

                    <!-- Section Flooz -->
                    <div id="flooz-section" class="withdraw-section">
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <span class="flag-icon flag-icon-tg"></span>
                            </span>
                            <input type="tel" class="form-control" id="floozPhone" placeholder="Numéro de Flooz" value="+228 ">
                        </div>
                        <div class="mb-3">
                            <label for="withdrawAmountFlooz" class="form-label">Montant à retirer</label>
                            <input type="number" class="form-control" id="withdrawAmountFlooz" placeholder="Entrez le montant">
                        </div>
                        <button type="button" class="btn btn-success w-100" id="validateFlooz">Valider</button>
                    </div>

                    <!-- Section Tmoney -->
                    <div id="tmoney-section" class="withdraw-section">
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <span class="flag-icon flag-icon-tg"></span>
                            </span>
                            <input type="tel" class="form-control" id="tmoneyPhone" placeholder="Numéro de Tmoney" value="+228 ">
                        </div>
                        <div class="mb-3">
                            <label for="withdrawAmountTmoney" class="form-label">Montant à retirer</label>
                            <input type="number" class="form-control" id="withdrawAmountTmoney" placeholder="Entrez le montant">
                        </div>
                        <button type="button" class="btn btn-success w-100" id="validateTmoney">Valider</button>
                    </div>

                    <!-- Section Carte Bancaire -->
                    <div id="card-section" class="withdraw-section">
                        <div class="mb-3">
                            <label for="cardNumber" class="form-label">Numéro de carte</label>
                            <input type="text" class="form-control" id="cardNumber" placeholder="1234 5678 9012 3456">
                        </div>
                        <div class="mb-3">
                            <label for="cardCode" class="form-label">Code</label>
                            <input type="text" class="form-control" id="cardCode" placeholder="Code secret">
                        </div>
                        <div class="mb-3">
                            <label for="withdrawAmountCard" class="form-label">Montant à retirer</label>
                            <input type="number" class="form-control" id="withdrawAmountCard" placeholder="Entrez le montant">
                        </div>
                        <button type="button" class="btn btn-success w-100">Valider</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function showSection(section) {
            // Réinitialiser toutes les sections
            const sections = document.querySelectorAll('.withdraw-section');
            sections.forEach(s => s.classList.remove('show'));

            // Effacer le contenu des champs
            const inputs = document.querySelectorAll('.withdraw-section input');
            inputs.forEach(input => input.value = '');

            // Afficher la section sélectionnée
            document.getElementById(`${section}-section`).classList.add('show');

            // Gérer les boutons actifs
            const buttons = document.querySelectorAll('.btn-group .btn');
            buttons.forEach(b => b.classList.remove('active'));
            document.querySelector(`.btn-${section}`).classList.add('active');
        }

        function validatePhoneNumber(phoneNumber, prefixes) {
            const prefix = phoneNumber.substring(0, 2); 
           
            return prefixes.includes(parseInt(prefix));
        }

        // Contrôle du numéro Flooz
        document.getElementById('floozPhone').addEventListener('input', function() {
            const floozPrefixes = [96, 97, 98, 99, 78, 79];
            const validateButton = document.getElementById('validateFlooz');
          //  console.log(this.value);
            if (validatePhoneNumber(this.value, floozPrefixes)) {
                validateButton.style.display = 'block';
               // console.log('find');
            } else {
                validateButton.style.display = 'none';
                //console.log('no-find');
            }
        });

        // Contrôle du numéro Tmoney
        document.getElementById('tmoneyPhone').addEventListener('input', function() {
            const tmoneyPrefixes = [70, 71, 72, 90, 91, 92, 93];
            const validateButton = document.getElementById('validateTmoney');
            if (validatePhoneNumber(this.value, tmoneyPrefixes)) {
                validateButton.style.display = 'block';
            } else {
                validateButton.style.display = 'none';
            }
        });
    </script>

