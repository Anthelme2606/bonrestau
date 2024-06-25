@extends('layouts.page')
@section('tittle', 'Sign-up')
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('content')
    <!--Place the css and js here for loadind correctly the file-->
  
    <link rel="stylesheet" href="{{ asset('assets/auth/css/auth.css') }}">
    <script src="{{ asset('assets/auth/js/auth.js') }}"></script>
    <div class="container">
        <div class=" row">
            <div class="col-md-5">
                <div class="image-container ">
                    <img class="w-100 h-100" src="{{ asset('assets/images/6300959.jpg') }}" alt="Company Logo" />
                </div>
                
            </div>
            <div class="col-md-7">
                <div class="form-side">
                    <div class="d-flex justify-content-center flex-column align-items-center">
                        <h2>Créez votre compte..</h2>
                        <p>Rejoignez notre communauté et commencez à explorer nos services.</p>
                    </div>
                    
                        <div class="d-flex justify-content-between ">
                            @for ($i = 1; $i <= 6; $i++)
                                <div class="rounded-circle shadow step-bg text-white step-round step {{ $i == 1 ? 'active-step' : '' }}"
                                    role="button" aria-pressed="{{ $i == 1 ? 'true' : 'false' }}">
                                    <span>{{ $i }}</span>
                                </div>
                            @endfor
                        </div>
                        <div class="div-form">       
                       <form class="form" id="myForm" action="{{route('post_sign_up')}}" method="post">
                        @csrf
                        @method('POST')
                                <div class="step-s step-1 ">
                                        <label for="nom">Nom :</label>
                                        <input type="text" id="nom" name="nom" required>
                                        
                                        <label for="prenom">Prenom :</label>
                                        <input type="text" id="prenom" name="prenom" required>
                                        
                                        <label for="date">Date de naissance :</label>
                                        <input type="date" id="date" name="date_naissance" required>
                                        <div class="select-container">
                                            <select class="form-select" name="region">
                                                <option selected>Region</option>
                                                <option value="Maritime">Maritime</option>
                                                <option value="Plateaux">Plateau</option>
                                                <option value="Centrale">Centrale</option>
                                                <option value="Kara">Kara</option>
                                                <option value="Savane">Savane</option>
                                            </select>
                                        </div>
                                       
                                    
                                    <div class="mb-1 d-flex justify-content-between">
                                        <div class="prev d-flex justify-content-start me-3">
                                            <button type="button"
                                                class="btn prev-1 btn-seconday px-2 px-md-5 text-center opacity-0 rounded  py-2">Precedent</button>
        
        
                                        </div>
                                        <div class="next d-flex justify-content-end">
                                            <button type="button"
                                                class=" next-1 btn-orange px-2 px-md-5 text-center rounded  py-2">Suivant</button>
        
                                        </div>
        
                                    </div>
        
                                </div>
                                <div class="step-s step-2 d-none ">
                                    
                                    <label for="pseudo"> Créer un pseudo:</label>
                                    <input type="text" id="pseudo" name="pseudo" required>
                                    <label for="invitant">ID invitant :</label>
                                    <input type="text" id="invitant" name="invitant">
        
                                
                                <div class="mb-1 d-flex justify-content-between">
                                    <div class="prev d-flex justify-content-start me-3">
                                        <button type="button"
                                                    class="btn prev-2 btn-secondary px-2 px-md-5 text-center rounded  py-2 me-3">
                                                    Precedent
                                                </button>
                                    </div>
                                    <div class="next d-flex justify-content-end">
                                        <button type="button"
                                            class=" next-2 btn-orange px-2 px-md-5 text-center rounded  py-2">Suivant</button>
    
                                    </div>
    
                                </div>
    
                            </div>
                                <div class="step-s step-3 d-none">
                             
                                        <label for="ville">Ville:</label>
                                        <input type="text" name="ville" required>
                                  
                                    
                                        <label for="commune">Commune:</label>
                                        <input type="text" name="commune">

                                        <label for="quartier">Quartier:</label>
                                        <input type="text" name="quartier">
                                        <div class="mb-1 d-flex justify-content-between">
                                            <div class="prev d-flex justify-content-start">
                                                <button type="button"
                                                    class="btn prev-3 btn-secondary px-2 px-md-5 text-center rounded  py-2 me-3">
                                                    Precedent
                                                </button>
                                            </div>
                                            <div class="next d-flex justify-content-end">
                                                <button type="button"
                                                    class=" btn-orange next-3 px-2 px-md-5 text-center rounded  py-2">
                                                    Suivant
                                                </button>
                                            </div>
                                        </div>
            
                                    </div>
                                    
                                        
                                    
                                    
        
                                
                                <div class="step-s step-4 d-none">
        
                                        <label for="numwhats">Numero whatsapp:</label>
                                        <input type="tel" name="numwhats">
                                  
                                    
                                        <div class="mx-auto max-w-md">
                                            <div class="text-center mb-4">
                                              <h6 class="font-bold">Choisissez un reseau pour les transactions</h6>
                                           </div>
                                            <div class="checkbox-container">
                                              
                                                <input class="" type="checkbox" value="tmoney" id="tmoney" name="reseau1">
                                                <label class="form-check-label" for="tmoney">
                                                 Tmoney
                                                </label>
                                               
                                            </div>
                                            <div class="checkbox-container">
                                              
                                                <input class="" type="checkbox" value="moov" id="moov" name="reseau2">
                                                <label class="form-check-label" for="moov">
                                                  Moov
                                                </label>
                                              
                                            </div>  
                                            
                                         </div>
                                          
                                       
                                    
                                   
                                        <label for="numwhats">Numero du reseau choisi pour les transactions:</label>
                                        <input type="tel" name="numero_reseau">
                                    
                                    <div class="mb-1 d-flex justify-content-between">
                                        <div class="prev d-flex justify-content-start">
                                            <button type="button"
                                                class="btn  prev-4 btn-secondary px-2 px-md-5 text-center  rounded  py-2">Precedent</button>
        
        
                                        </div>
                                        <div class="next d-flex justify-content-end">
                                            <button type="button"
                                                class=" btn-orange next-4 px-2 px-md-5 text-center rounded  py-2">Suivant</button>
        
                                        </div>
        
                                    </div>
        
                                </div>
                                <div class="step-s step-5 d-none">
                                    <div class="mx-auto max-w-md">
                                        <div class="checkbox-container">
                                            <small class="form-text text-muted">Tous les utilisateurs ne peuvent avoir qu'un seul compte.</small>
                                            <input class="checkbox" type="checkbox" id="one_acc" name="inscription_1" value="1">
                                            <label class="form-check-label" for="one_acc">Je m'inscris pour la toute première fois</label>
                                        </div>
                                    </div>
                                    <div class="checkbox-container">
                                        <small class="form-text text-muted">Les informations fournies sont exactes et vérifiables grâce à une pièce d'identité.</small>
                                        <input class="checkbox" type="checkbox" id="info_exact" name="info_exact" value="1">
                                        <label class="form-check-label" for="info_exact">Oui je confirme</label>
                                    </div>
                                    <div class="checkbox-container">
                                        <small class="form-text text-muted">Mes revenus seront perdus si je n'arrive pas à vérifier mes informations avec des pièces justificatifs.</small>
                                        <input class="checkbox" type="checkbox" id="perte_rev" name="perte_info" value="1">
                                        <label class="form-check-label" for="perte_rev">Oui je confirme</label>
                                    </div>
                                    <div class="mb-1 d-flex justify-content-between">
                                        <div class="prev d-flex justify-content-start">
                                            <button type="button" class="btn prev-5 btn-secondary px-2 px-md-5 text-center rounded  py-2">Precedent</button>
                                        </div>
                                        <div class="next d-flex justify-content-end">
                                            <button type="button" class="btn-orange next-5 px-2 px-md-5 text-center rounded  py-2">Suivant</button>
                                        </div>
                                    </div>
                                </div>
                                       
                                    
                                    
                                        
                                
                                <div class="step-s step-6 d-none">
        
                                    
                                        <label for="email">email:</label>
                                        <input type="email" id="email" name="email">
                                    
                                    
                                        <label for="password">password:</label>
                                        <input type="password" id="password" name="password">
                                    
                                    
                                        <label for="confirmation">confirmation:</label>
                                        <input type="password" id="confirmation" name="confirm">
                                        <div class="checkbox-container">
                                            <input type="checkbox" id="terms" name="accept_condition" value="1" required>
                                            <label for="terms">J'accepte les <a href="/termes-et-conditions">termes et conditions</a></label>
                                        </div>
                                    
                                        
                                    <div class="mb-1 d-flex justify-content-between">
                                        <div class="prev d-flex justify-content-start me-3">
                                            <button type="button"
                                                class="btn  prev-6 btn-secondary px-2 px-md-5 text-center  rounded  py-2">Precedent</button>
        
        
                                        </div>
                                        <div class="next d-flex justify-content-end">
                                            <button type="submit"id='validate'
                                                class=" next-6 submit btn bg-valider  px-2 px-md-5  text-center rounded  py-2">Sign-up</button>
        
                                        </div>
        
                                    </div>
        
                                </div>
        
                            </form>
                        </div>
        
                </div>
            </div>
        </div>



        
    </div>

@endsection
