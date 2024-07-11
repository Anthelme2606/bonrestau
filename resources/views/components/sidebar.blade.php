

<nav class="sidebar sidebar-offcanvas" id="sidebar" style="background-color:rgb(208, 225, 231)" >
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top"
     style="background:rgb(208,225,231);">
        <a class="sidebar-brand brand-logo" href="{{route('home')}}" style="background:rgb(208, 225, 231)">
            <img height="20" width="20"  src="{{asset('assets/images/logo-bonr.png')}}" alt="logo" />
        </a>
        <a class="sidebar-brand brand-logo-mini" href="{{route('home')}}">
           <img src="{{asset('assets/images/logo-bonr.png')}}" alt="logo" width="50" height="50" />
          
        </a>
    </div>
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    <div class="count-indicator">
                        <img class="img-xs rounded-circle" src="{{asset('assets/images/logo.jpg')}}" alt="">
                        <span class="count bg-success"></span>
                    </div>
                    <div class="profile-name">
                        <h5 class="mb-0 font-weight-normal text-black">{{Auth::user()->pseudo}}</h5>
                        <span>{{Auth::user()->user_type}}</span>
                    </div>
                </div>
                <a  id="profile-dropdown" data-toggle="dropdown">
                    <i class="mdi mdi-dots-vertical"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                    <a  class="dropdown-item preview-item" href="{{route('coming-soon')}}">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-settings text-primary"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Parametre du compte</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a  class="dropdown-item preview-item" href="{{route('coming-soon')}}">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-onepassword text-info"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Changer de mot de passe</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    
                </div>
            </div>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('dashboard')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        @if(Auth::check() && Auth::user()->user_type==="admin")
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('bon-create')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-coin"></i>
                </span>
                <span class="menu-title">Bons de restauration</span>
                
            </a>
            {{-- <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/ui-features/typography.html">Typography</a>
                    </li>
                </ul>
            </div> --}}
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('bon-ravitailler')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-arrange-bring-forward"></i>
                </span>
                <span class="menu-title">Ravitaillement</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('trans-create')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-check"></i>
                </span>
                <span class="menu-title">Validation</span>
            </a>
        </li>
        @endif
        <li class="nav-item menu-items" >
            <a class="nav-link"href="{{route('generate')}}" >
                <span class="menu-icon">
                    <i class="mdi mdi-key-variant"></i>
                </span>
                <span class="menu-title">Générer un code</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('coming-soon')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-paperclip"></i>
                </span>
                <span class="menu-title">Envoyer code</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('sign-up')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-border-color"></i>
                </span>
                <span class="menu-title">Inscription</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link"  href="{{route('coming-soon')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-contacts"></i>
                </span>
                <span class="menu-title">Contacts</span>
            </a>
        </li>
        @if(Auth::check() && Auth::user()->user_type==="admin")
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('coming-soon')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-security"></i>
                </span>
                <span class="menu-title">Gérer les utilisateur</span>
                
            </a>
           
        </li>
        @endif
        
    </ul>
</nav>
<script>
   
    document.querySelectorAll('.nav-link').forEach(function(link) {
        const url = window.location.href;
         
        if (link.href === url) {
         
            link.parentElement.classList.add('active'); 
        }
    });
</script>