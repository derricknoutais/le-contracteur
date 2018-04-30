<nav class="navbar navbar-light  navbar-static-top navbar-expand-md">
        <div class="container">
            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggler collapsed" data-toggle="collapse"
            data-target="#app-navbar-collapse" aria-expanded="false"><span class="sr-only">Toggle Navigation</span>
            </button>
            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}" style="margin-bottom: 0.5em;">
                <img src="/images/logo.png" style="padding-top:20px; width:2em;">
            </a>
            <div class="collapse navbar-collapse" id="app-navbar-collapse"
            style="padding-top:0.5em;">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav"></ul>
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a>
                </li>
                {{-- <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a>
                </li> --}}
                @else
                @if(Auth::user()->role_id < 3)
                <li class="nav-item">
                    <a href="{{ route('dashboard.index') }}" class="nav-link">
                        <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
                    </a>
                </li>
                @endif
                <li class="dropdown nav-item">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button"
                aria-expanded="false" aria-haspopup="true">

                    <i class="fa fa-car" aria-hidden="true"></i> Voitures

                    </a>
            <ul class="dropdown-menu">
                <li class="dropdown-item"><a href="{{ route('voitures.index') }}"><i class="fa fa-car" aria-hidden="true"></i> Toutes les Voitures</a>
                </li>@if(Auth::user()->role_id < 3)
                <li class="dropdown-item"><a href="{{ route('voitures.create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Créer Nouvelle Voiture </a>
                </li>@if(Auth::user()->role_id < 2)
                <li class="dropdown-item"><a href="{{ route('voitures.index') }}"><i class="fa fa-minus" aria-hidden="true"></i> Supprimer une Voiture</a>
                </li>@endif @endif
            </ul>
            </li>
            <li class="dropdown nav-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button"
                aria-expanded="false" aria-haspopup="true"><i class="fa fa-users" aria-hidden="true"></i> Clients
                </a>
            <ul class="dropdown-menu">
                <li class="dropdown-item"><a href="{{ route('clients.index') }}"><i class="fa fa-users" aria-hidden="true"></i> Tous les Clients</a>
                </li>
                <li class="dropdown-item"><a href="{{ route('clients.create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Cr&#xE9;er Nouveau Client</a>
                </li>
                <li class="dropdown-item"><a href="{{ route('clients.index') }}"><i class="fa fa-minus" aria-hidden="true"></i> Tous les Clients</a>
                </li>
            </ul>
        </li>
        <li class="dropdown nav-item"> <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button"
            aria-expanded="false" aria-haspopup="true">

            <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Contrats

        </a>
        <ul class="dropdown-menu">
            <li class="dropdown-item"><a href="{{ route('contrats.index') }}"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Tous les Contrats</a>
            </li>
            <li class="dropdown-item"><a href="{{ route('contrats.create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Cr&#xE9;er Nouveau Contrat</a>
            </li>
            <li class="dropdown-item"><a href="{{ route('contrats.index') }}"><i class="fa fa-minus" aria-hidden="true"></i> Supprimer Nouveau Contrat</a>
            </li>
        </ul>
    </li>
</ul>
<ul class="nav navbar-nav ml-auto">
    <li class="dropdown nav-item"><a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button"
        aria-expanded="false" aria-haspopup="true"><i class="fa fa-user-circle-o" aria-hidden="true"></i> {{ Auth::user()->first_name . "" . Auth::user()->last_name  }}</a>
    <ul class="dropdown-menu">
        <li class="dropdown-item"> <a href="{{ route('logout') }}" onclick="event.preventDefault();

        document.getElementById('logout-form').submit();">

        <i class="fa fa-sign-out" aria-hidden="true"></i> Logout

    </a>
    <form id="logout-form" action="{{ route('logout') }}"
    method="POST" style="display: none;">{{ csrf_field() }}</form>
</li>
</ul>
</li>
</ul>@endguest</div>
</div>
</nav>
