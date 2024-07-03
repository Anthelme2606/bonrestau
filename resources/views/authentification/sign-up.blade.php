@extends("layouts.html")
@section('title','Inscription')
@section('body-container')
<link 
rel="stylesheet" 
href="{{ asset('assets/vendor/vendors/mdi/css/materialdesignicons.min.css') }}?v=<?php echo time(); ?>">
<link rel="stylesheet"
    href="{{ asset('assets/auth/css/auth.css') }}?<?php echo time();?>">
    <script src="{{ asset('assets/auth/js/auth.js') }}?<?php echo time(); ?>"></script>
    <div class="container shadow rounded mt-2">
        <div class="image">
            <img src="{{asset('assets/images/logo-bonr.png')}}" alt="bon">
          </div>
        <h2 class="text-center text-primary mb-4">Créez votre compte</h2>
        <form class="form-container row row-cols-1 row-cols-md-3 g-0" action="{{ route('post_sign_up') }}" method="post">
               @csrf
                @method('POST')
            <div class="col form-section bg-1 mb-0">
                <h4 class="mb-3">Informations Personnelles</h4>
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="mdi mdi-account"></i></span>
                        <input type="text" class="form-control" id="nom" name="nom" required>
                    </div>
                    <div id="nom-error" class="error-message"></div>
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="mdi mdi-account"></i></span>
                        <input type="text" class="form-control" id="prenom" name="prenom" required>
                    </div>
                    <div id="prenom-error" class="error-message"></div>
                </div>
                <div class="form-group">
                    <label for="date_naissance">Date de naissance</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                        <input type="date" class="form-control" id="date_naissance" name="date_naissance" required>
                    </div>
                    <div id="date_naissance-error" class="error-message"></div>
                </div>
                <div class="form-group">
                    <label for="region">Région</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="mdi mdi-map"></i></span>
                        <select class="form-select" id="region" name="region">
                            <option selected>Choisir une région</option>
                            <option value="Maritime">Maritime</option>
                            <option value="Plateaux">Plateau</option>
                            <option value="Centrale">Centrale</option>
                            <option value="Kara">Kara</option>
                            <option value="Savane">Savane</option>
                        </select>
                    </div>
                    <div id="region-error" class="error-message"></div>
                </div>
                <div class="form-group">
                    <label for="ville">Ville</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="mdi mdi-city"></i></span>
                        <input type="text" class="form-control" id="ville" name="ville" required>
                    </div>
                    <div id="ville-error" class="error-message"></div>
                </div>
                <div class="form-group">
                    <label for="ville">Commune</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="mdi mdi-home"></i></span>
                        <input type="text" class="form-control" id="commune" name="commune" required>
                    </div>
                    <div id="commune-error" class="error-message"></div>
                </div>
                <div class="form-group">
                    <label for="quartier">Quartier</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="mdi mdi-home"></i></span>
                        <input type="text" class="form-control" id="quartier" name="quartier" required>
                    </div>
                    <div id="quartier-error" class="error-message"></div>
                </div>
            </div>
            <div class="col form-section bg-2 mb-0">
                <h3 class="mb-3">Informations de Connexion</h3>
                <div class="form-group">
                    <label for="email">Email</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="mdi mdi-email"></i></span>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div id="email-error" class="error-message"></div>
                </div>
                <div class="form-group">
                    <label for="pseudo">Pseudo</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="mdi mdi-account"></i></span>
                        <input type="text" class="form-control" id="pseudo" name="pseudo" required>
                    </div>
                    <div id="pseudo-error" class="error-message"></div>
                </div>
                <div class="form-group">
                    <label for="parrainage">ID invitant</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="mdi mdi-account"></i></span>
                        <input type="text" class="form-control" id="invitant" name="invitant">
                    </div>
                    <div id="parrainage-error" class="error-message"></div>
                </div>
                <div class="form-group">
                    <label for="numwhats">Numéro WhatsApp</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="mdi mdi-whatsapp"></i></span>
                        <input type="tel" class="form-control" id="numwhats" name="numwhats" required>
                    </div>
                    <div id="numwhats-error" class="error-message"></div>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="mdi mdi-lock"></i></span>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div id="password-error" class="error-message"></div>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirmation mot de passe</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="mdi mdi-lock"></i></span>
                        <input type="password" class="form-control" id="confirmation" name="confirm" required>
                    </div>
                    <div id="confirm_password-error" class="error-message"></div>
                </div>
            </div>
            <div class="col form-section bg-3 mb-0">
                <h4 class="mb-3">Informations de Réseau</h4>
                
                <div class="form-group">
                    <h6 class="mb-2">Choisissez un réseau pour les transactions</h6>
                    <input type="text" id="reseau1" name="reseau1" value="" hidden>
                    <input type="text" id="reseau2" name="reseau2" value="" hidden>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="tmoney" name="reseau" value="tmoney" required>
                        <label class="form-check-label" for="tmoney">Tmoney</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="flooz" name="reseau" value="flooz" required>
                        <label class="form-check-label" for="flooz">Flooz</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="numero_reseau">Numéro du réseau choisi pour les transactions</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="mdi mdi-cellphone"></i></span>
                        <input type="tel" class="form-control" id="numero_reseau" name="numero_reseau" required>
                    </div>
                    <div id="numero_reseau-error" class="error-message"></div>
                </div>
                <div class="form-group">
                    <h6 class="mb-2">Conditions d'inscription</h6>
                    <div class="checkbox-container">
                        <small class="form-text text-muted">Tous les utilisateurs ne peuvent avoir qu'un seul compte.</small>
                        <input class="checkbox" type="checkbox" id="one_acc" name="inscription_1" value="1">
                        <label class="form-check-label" for="one_acc">Je m'inscris pour la toute première fois</label>
                    </div>
                    <div class="checkbox-container">
                        <small class="form-text text-muted">Les informations fournies sont exactes et vérifiables grâce à une pièce d'identité.</small>
                        <input class="checkbox" type="checkbox" id="info_exact" name="info_exact" value="1">
                        <label class="form-check-label" for="info_exact">Oui je confirme</label>
                    </div>
                    <div class="checkbox-container">
                        <small class="form-text text-muted">Mes revenus seront perdus si je n'arrive pas à vérifier mes informations avec des pièces justificatives.</small>
                        <input class="checkbox" type="checkbox" id="perte_rev" name="perte_info" value="1">
                        <label class="form-check-label" for="perte_rev">Oui je confirme</label>
                    </div>
                    <div class="checkbox-container">
                        <input class="checkbox" type="checkbox" id="terms" name="accept_condition" value="1">
                        <label class="form-check-label" for="terms">J'accepte les termes et conditions</label>
                    </div>
                    <div id="conditions-error" class="error-message"></div>
                </div>
                <button type="submit" class="btn btn-primary mt-3 submiting">S'inscrire</button>
            </div>
        </form>
    </div>

@endsection
