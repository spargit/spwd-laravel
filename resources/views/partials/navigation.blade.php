<header id="navigation">
    <nav class="uk-navbar uk-navbar-attached nav-primary">
        <!-- Mobile Menu -->
        <ul class="uk-navbar-nav uk-visible-small">
            <li>
                <a href="#sidenav" class="uk-navbar-toggle" data-uk-offcanvas></a>
            </li>
        </ul>

        <!-- Destkop Menu -->
        <a href="/" class="uk-navbar-brand uk-hidden-small">Shawn Parsons</a>
        <ul class="uk-navbar-nav uk-hidden-small">
            @include('partials.links')
        </ul>

        <!-- Destkop App Menu -->
        <ul class="uk-navbar-nav uk-navbar-flip uk-hidden-small">
            <li><a href="https://github.com/spargit?tab=repositories"><i class="fa fa-github"></i> Github</a></li>
            @auth
                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            @else
                <li><a href="{{ route('register') }}">Sign Up</a></li>
                <li><a href="{{ route('login') }}">Sign In</a></li>
            @endguest
        </ul>

        <!-- Mobile App Menu -->
        <ul class="uk-navbar-nav uk-navbar-flip uk-visible-small">
            <li>
                <a href="#sideapps" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas></a>
            </li>
        </ul>
    </nav>

    <!-- Mobile Menu Sidebar -->
    <div id="sidenav" class="uk-offcanvas">
        <div class="uk-offcanvas-bar">
            <ul class="uk-nav uk-nav-offcanvas nav-side" data-uk-nav>
                @include('partials.links')
            </ul>
        </div>
    </div>
      
    <!-- Mobile App Sidebar -->
    <div id="sideapps" class="uk-offcanvas">
        <div class="uk-offcanvas-bar uk-offcanvas-bar-flip">
            <ul class="uk-nav uk-nav-offcanvas nav-side" data-uk-nav>
                <li class="uk-nav-header">Applications</li>
                <li><a href="/projects/"><i class="fa fa-cubes"></i> Projects</a></li>
                <li><a href="https://github.com/spargit?tab=repositories"><i class="fa fa-github"></i> Github</a></li>
                <li class="uk-nav-divider"></li>
                @guest
                    <li><a href="{{ route('register') }}">Sign Up</a></li>
                    <li><a href="{{ route('login') }}">Sign In</a></li>
                @else
                    <li><a href="{{ route('logout') }}">Logout</a></li>
                @endguest
            </ul>
        </div>
    </div>
    </header>