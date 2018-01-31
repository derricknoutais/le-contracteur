{{-- @auth
@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row text-center">
        @auth()
            <h1>Bienvenue {{ Auth::user()->first_name . " " . Auth::user()->last_name }} STA-Contracteur </h1>
        @else
            <h1>Services Tous Azimuts - Port-Gentil</h1>
            <small>Notre Slogan</small>
        @endauth
    @auth()
    </div>
    <div class="row ">
        <div class="col-md-12">
            <div id="carousel-example-generic" class="carousel slide bg-primary" data-ride="carousel" data-interval="3000">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox" >
            <div class="item active">
              <img src="https://di-uploads-pod3.dealerinspire.com/beavertoyotastaugustine/uploads/2017/11/cc_2018TOS110002_01_2100_1D6-1024x768.png" alt="...">
              <div class="carousel-caption">
                <h1>Le meilleur de la voiture</h1>
              </div>
            </div>
            <div class="item">
              <img src="http://www.cars2let.com/wp-content/uploads/2015/10/step3.png" alt="...">
              <div class="carousel-caption">
                ...
              </div>
            </div>
            <div class="item">
              <img src="https://www.salemdist.com/sites/default/files/diamondtools4.png" alt="...">
              <div class="carousel-caption">
                ...
              </div>
            </div>
          </div>

          <!-- Controls -->
          <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        </div>
    @endauth
    </div>
    <div class="col-md-8 col-md-push-2">
        <form action="" method="">
            <div class="form-group col-md-6" >
                <label for="nom">Nom<span class="required">*</span></label>
                <input id="nom" type="text" name="nom" class="form-control" spellcheck="false"  placeholder="Moubamba, Benzema, Talon" />
            </div>
            <div class="form-group col-md-6" >
                <label for="prenom">Prenom<span class="required">*</span></label>
                <input id="prenom" type="text" name="prenom" class="form-control" spellcheck="false"  placeholder="Bruno, Karim, Patrice" />
            </div>
        <div class="form-group">
            @if($voitures != null )
            <div class="form-group col-md-12" >
                <label for="voiture_id">Choisissez la voiture<span class="required">*</span></label>
                <select id="voiture_id" type="text" name="voiture_id" class="form-control" spellcheck="false" required>
                    @forelse($voitures as $voiture)
                    <option selected value="{{ $voiture->id }}"> {{ $voiture->immatriculation }} </option>
                    @empty
                    <option selected disabled value=""> Aucune voiture dispo</option>
                    @endforelse
                </select>
            </div>
            @endif
        </div>
        <div class="form-group col-md-6">
            <label for="jourDu">Du:</label>
            <input type="date" name="jourDu" class="form-control">
        </div>
        <div class="form-group col-md-6">
            <label for="jourAu" >Au:</label>
            <input type="date" name="jourAu" class="form-control">
        </div>
        <div class="form-group col-md-1 col-md-push-5">
            <input type="submit" value="Réservez" class="btn btn-primary">
        </div>
    </form>
    </div>
</div>
@endsection
@else
    @include('partials.visitorH')
    @endauth --}}

    <!DOCTYPE html>
    <html lang="en">

<head>

    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    	<meta name="description" content="">
    	<meta name="author" content="">

    	<title></title>

    	<!-- Bootstrap core CSS -->
    	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    	<!-- Custom fonts for this template -->
    	<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    	<link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
    	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    	<!-- Custom styles for this template -->
    	<link href="css/landing-page.css" rel="stylesheet">
    	<style>
	    	#map {
	    		height: 400px;
	    		width: 100%;
	    	}
    	</style>
</head>

<body>

	<!-- Navigation -->
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

        			<i class="fa fa-car" aria-hidden="true"></i> Voitures <span class="caret"></span>

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
        	<li class="dropdown nav-item"> <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button"
        		aria-expanded="false" aria-haspopup="true">

        		<i class="fa fa-users" aria-hidden="true"></i> Clients <span class="caret"></span>

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

        	<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Contrats <span class="caret"></span>

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
	<li class="dropdown nav-item"> <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button"
		aria-expanded="false" aria-haspopup="true">

		<i class="fa fa-user-circle-o" aria-hidden="true"></i> {{ Auth::user()->first_name . "" . Auth::user()->last_name  }} <span class="caret"></span>

	</a>
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

<!-- Masthead -->
<header class="masthead text-white text-center">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-xl-9 mx-auto">
				<h1 class="mb-2">Réservez Une Voiture</h1>
			</div>
			<div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
				<form action="/reservations" method="POST">
					{{ csrf_field() }}
					<div class="form-row m-3">
						<div class="col-12 col-md-6 mb-2 mb-md-0">
							<input type="text" name="nom" class="form-control" placeholder="Entrez votre nom">
						</div>
						<div class="col-12 col-md-6 mb-2 mb-md-0">
							<input type="text" name="prenom" class="form-control" placeholder="Entrez votre prénom">
						</div>

					</div>
					<div class="form-row m-3">
						@if($voitures != null )
						<div class="col-12 col-md-12 mb-2 mb-md-0" >
							<label for="voiture_id">Choisissez la voiture<span class="required">*</span></label>
							<select id="voiture_id" type="text" name="voiture_id" class="form-control" spellcheck="false" required>
								@forelse($voitures as $voiture)
								<option selected value="{{ $voiture->id }}"> {{ $voiture->immatriculation . "  " . $voiture->marque . " " . " " . $voiture->type . "    " . $voiture->prix}} FCFA</option>
								@empty
								<option selected disabled value=""> Aucune voiture dispo</option>
								@endforelse
							</select>
						</div>
						@endif
					</div>
					<div class="form-row m-3">
						<div class="col-12 col-md-6 mb-2 mb-md-0">
							<label class="pull-left">Date du:</label>
							<input type="date" class="form-control" name="dateDu">
						</div>
						<div class="col-12 col-md-6 mb-2 mb-md-0">
							<label class="pull-left">Au:</label>
							<input type="date" class="form-control" name="dateAu">
						</div>
					</div>
					<div class="form-row m-3">
						<div class="col-md-4">

						</div>
						<div class="col-12 col-md-4">
							<button type="submit" class="btn btn-block btn-lg btn-primary">Réservez</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</header>
<!-- Icons Grid -->
<section class="features-icons text-center">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
					<div class="features-icons-icon d-flex">
						<i class="icon-emotsmile m-auto text-primary"></i>
					</div>
					<h3>Service de Qualité</h3>
					<p class="lead mb-0">Apportez à nos clients un service à la mesure de leurs besoins est la première de nos prorités</p>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
					<div class="features-icons-icon d-flex">
						<i class="icon-wallet m-auto text-primary"></i>
					</div>
					<h3>Prix Concurrent</h3>
					<p class="lead mb-0">Non Seulement de bonne Qualité... Mais aussi à prix défiant toute concurrence</p>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="features-icons-item mx-auto mb-0 mb-lg-3">
					<div class="features-icons-icon d-flex">
						<i class="icon-speedometer m-auto text-primary"></i>
					</div>
					<h3>Expertise &amp; Rapidité</h3>
					<p class="lead mb-0">Une équipe jeune et dynamique toujours prete a vous servir avec plus d'éfficacité</p>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Image Showcases -->
<section class="showcase bg-light">
	<div class="container-fluid p-0">
		<div class="row no-gutters">

			<div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('http://resource.digitaldealer.com.au/image/1004830305a28281db67e3625691418_900_600-c.jpg'); background-position: 70% 60%;"></div>
			<div class="col-lg-6 order-lg-1 my-auto showcase-text">
				<h2>Location Véhicule</h2>
				<p class="lead mb-0">Besoin d'un véhicule? Ne cherchez plus. Visitez notre parking de véhicules de location pour toutes les bourses à partir de 30.000 F CFA seulement.</p>
			</div>
		</div>
		<div class="row no-gutters">
			<div class="col-lg-6 text-white showcase-img" style="background-image: url('https://img.autoplus.fr/news/2017/01/26/1512744/900%7C600%7C2bb8769e1f960c9e034fb574.jpg');"></div>
			<div class="col-lg-6 my-auto showcase-text">
				<h2>Pièces Détachées</h2>
				<p class="lead mb-0">Services Tous Azimuts vous propose aussi des pièces détachées de qualité à des prix impressionants. Toujours dans le but de satisafire notre clientèle nous leur proposons un service hors du commun</p>
			</div>
		</div>
	</div>
</section>

<!-- Testimonials -->
    {{-- <section class="testimonials text-center bg-light">
      <div class="container">
        <h2 class="mb-5">What people are saying...</h2>
        <div class="row">
          <div class="col-lg-4">
            <div class="testimonial-item mx-auto mb-5 mb-lg-0">
              <img class="img-fluid rounded-circle mb-3" src="images/testimonials-1.jpg" alt="">
              <h5>Kevin Erdin MoulounguiOyinha</h5>
              <p class="font-weight-light mb-0">"Un lieu propre service de qualité et à bon prix"</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="testimonial-item mx-auto mb-5 mb-lg-0">
              <img class="img-fluid rounded-circle mb-3" src="images/testimonials-2.jpg" alt="">
              <h5>Fred S.</h5>
              <p class="font-weight-light mb-0">"Bootstrap is amazing. I've been using it to create lots of super nice landing pages."</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="testimonial-item mx-auto mb-5 mb-lg-0">
              <img class="img-fluid rounded-circle mb-3" src="images/testimonials-3.jpg" alt="">
              <h5>Sarah W.</h5>
              <p class="font-weight-light mb-0">"Thanks so much for making these free resources available to us!"</p>
            </div>
          </div>
        </div>
      </div>
  </section> --}}

  <!-- Call to Action -->

  <section class="call-to-action text-white text-center" id="map">

  	<script>
  		function initMap() {
  			var uluru = {lat: -0.7206936, lng: 8.767582};
  			var map = new google.maps.Map(document.getElementById('map'), {
  				zoom: 17,
  				center: {lat: -0.7206936, lng: 8.767582+0.006}
  			});
  			var marker = new google.maps.Marker({
  				position: uluru,
  				map: map
  			});
  		}
  	</script>
  </section>


  <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBLwWE_-ebQUq_3bxiLYQQZ6pLla_WN0ic&callback=initMap">
</script>

<!-- Footer -->
<footer class="footer bg-light">
	<div class="container">
		<div class="row">

			<div class="col-lg-6 h-100 text-center text-lg-right my-auto">
				<ul class="list-inline mb-0">
					<li class="list-inline-item mr-3">
						<a href="https://www.facebook.com/stapog/">
							<i class="fa fa-facebook fa-2x fa-fw"></i>
						</a>
					</li>
					<li class="list-inline-item mr-3">
						<a href="#">
							<i class="fa fa-twitter fa-2x fa-fw"></i>
						</a>
					</li>
					<li class="list-inline-item">
						<a href="#">
							<i class="fa fa-instagram fa-2x fa-fw"></i>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</footer>
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>

