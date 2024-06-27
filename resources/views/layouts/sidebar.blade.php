<link rel="stylesheet" href="{{ asset('assets/layouts/css/sidebar.css') }}">
<aside class="sidebar close isClose">
    <header>
        <div class="image-text">
            <span class="image">
                <img src="{{ asset('assets/images/logo.jfif') }}" alt="">
            </span>

            <div class="text logo-text">
                <span class="name">BON</span>
                <span class="app-description">Bon de restauration</span>
            </div>
        </div>

        <i class='bx bx-chevron-right toggle'></i>
    </header>

    <div class="menu-bar">
        <div class="menu ">
          <!--  <li class="search-box">
                <i class='bx bx-search icon'></i>
                <input type="text" placeholder="Search...">
            </li>-->

            <ul class="menu-links">
                @if (Auth::user())
                    @foreach (\App\Http\Utils\SidebarUtil::getSidebar(Auth::user()->user_type) as $sidebar)
                        @foreach ($sidebar as $side)
                            <li class="side-link">
                                <a href="{{ route($side['link']) }}">
                                    <i class='{{ $side['box-icon'] }}'></i>
                                    <span class="text nav-text">{{ $side['link-name'] }}</span>
                                </a>
                            </li>
                           
                        @endforeach
                    @endforeach
                @endif
                <!--
                <li class="side-link">
                    <a href="{{route('parrains')}}">
                        <i class='bx bx-user icon'></i>
                        <span class="text nav-text">parrains</span>
                    </a>
                </li>-->
            </ul>
        </div>

        <div class="bottom-content">
            @if (Auth::check())
            <li class="">
                <a href="{{route('logout')}}">
                    <i class='bx bx-log-out icon'></i>
                    <span class="text nav-text">Logout</span>
                </a>
            </li>
            @endif

            <li class="mode">
                <div class="sun-moon">
                    <i class='bx bx-moon icon moon'></i>
                    <i class='bx bx-sun icon sun'></i>
                </div>
                <span class="mode-text text">Dark mode</span>

                <div class="toggle-switch">
                    <span class="switch"></span>
                </div>
            </li>
        </div>
    </div>
</aside>

<script src="{{ asset('assets/layouts/js/sidebar.js') }}"></script>
