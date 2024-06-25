
<link rel="stylesheet" href="{{ asset('assets/layouts/css/navbar.css') }}">
<nav class="navbar navbar-expand-lg navbar-dark bg-nav fixed-top">
    <div class="container-fluid">
        <button class="btn svg-sidebar text-white">
        <svg
   
      xmlns="http://www.w3.org/2000/svg"
      width="24"
      height="24"
      viewBox="0 0 24 24"
      fill="none"
      stroke="currentColor"
      strokeWidth="2"
      strokeLinecap="round"
      strokeLinejoin="round"
    >
      <path d="M3 11v3a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-3" />
      <path d="M12 19H4a1 1 0 0 1-1-1v-2a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-3.83" />
      <path d="m3 11 7.77-6.04a2 2 0 0 1 2.46 0L21 11H3Z" />
      <path d="M12.97 19.77 7 15h12.5l-3.75 4.5a2 2 0 0 1-2.78.27Z" />
    </svg>
</button>
        <a class="navbar-brand px-2 mx-2 " href="{{ route('home') }}">BON</a>
        
         
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @if (!Auth::check())
                    <a class="nav-link badge  mx-2 px-4 py-2 my-1 " aria-current="page" href="{{ route('login') }}">
                        Login
                    </a>
                    <a class="nav-link badge  mx-2 px-4 py-2 my-1 " aria-current="page" href="{{ route('sign-up') }}">
                        Register
                    </a>
                @endif


                <li class="nav-item  position-relative">
                    @if (Auth::check())
                        <button id="menuButton" class="btn text-capitalize  btn-sm  dropdown-toggle mx-1 px-1 py-1 my-1"
                            type="button">
                            {{ Auth::user()->pseudo }}

                        </button>
                    @else
                        <button id="menuButton" class="btn text-capitalize  btn-sm  dropdown-toggle mx-1 px-1 py-1 my-1"
                            type="button">
                            user
                        </button>
                    @endif
                </li>




            </ul>
        </div>
    </div>
</nav>

<div class="popup-window position-fixed  end-0 p-4 mt-sm frame top-0"
    style="width: 300px; background-color: #f8f9fa; display: none;">
    <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center position-relative">
            <div class="d-flex align-items-center">

                <img src="{{ asset('assets/images/logo.jpg') }}" class="" alt="" style="width: 60px; height:60px; border-radius:50%;"/>
                @if (Auth::check())
                    <span
                        class="d-flex text-capitalize justify-content-between align-items-center list-group-item list-group-item-action border-0"
                        style="background-color: #e0f0f8;">
                        {{ Auth::user()->user_type }}
                    </span>
                @else
                    <span
                        class="d-flex text-capitalize justify-content-between align-items-center list-group-item list-group-item-action border-0"
                        style="background-color: #e0f0f8;">
                        user
                    </span>
                @endif

            </div>
        </li>

        <li class="list-group-item hover-effect d-flex justify-content-between align-items-center">
            <a href="{{ route('settings') }}"
                class="d-flex justify-content-between align-items-center list-group-item list-group-item-action border-0">
                <i class="bx bx-cog"></i>
                <span>Settings </span>

            </a>
        </li>

        <!-- <li class="list-group-item d-flex hover-effect  text-white-50 justify-content-between align-items-center">
            <a href="" class="d-flex justify-content-between align-items-center  list-group-item list-group-item-action border-0">
                <span>Logout</span>
                <span class="material-icons">logout</span>
            </a>
        </li>-->

    </ul>
</div>
<script src="{{ asset('assets/layouts/js/navbar.js') }}"></script>
