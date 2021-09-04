<!DOCTYPE html>
<html lang="fr">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>site service</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

	{{-- tailwindcss --}}
	<link rel="stylesheet" href="{{asset('css/app.css')}}">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{asset('style/images/favicon.ico')}}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{asset('style/images/apple-touch-icon.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('style/css/bootstrap.min.css')}}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{asset('style/style.css')}}">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="{{asset('style/css/versions.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('style/css/responsive.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('style/css/custom.css')}}">

    <!-- Modernizer for Portfolio -->
    <script src="{{asset('style/js/modernizer.js')}}"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="host_version"> 

    <!-- LOADER -->
	<div id="preloader">
		<div class="loader-container">
			<div class="progress-br float shadow">
				<div class="progress__item"></div>
			</div>
		</div>
	</div>
	<!-- END LOADER -->	
	
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-info">
			<div class="container-fluid">
				<a class="navbar-brand" href="index.html">
					<img src="{{asset('style/images/logo-hosting.png')}}" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-host">
					<ul class="navbar-nav ml-auto">
						@auth
							
						<li class="nav-item dropdown">
							@if (auth()->user()->unreadNotifications->count() > 0)
								<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown"> <i class="fa fa-bell"></i> <span class="badge badge-pill badge-light">{{auth()->user()->unreadNotifications->count()}}</span></a>
								<div class="dropdown-menu" aria-labelledby="dropdown-a">
									@foreach (auth()->user()->unreadNotifications as $item)
										@if (auth()->user()->profil->name == 'demande')
											@if ($item->type == "App\Notifications\UserPostuleDemandeResponseNotification")
												<a href="{{route('readNotification', ["id" => $item->id, "user" => $item->notifiable_id])}}" class="dropdown-item text-left text-justify {{$item->data['status'] == 'accepter' ? 'text-primary' : 'text-danger'}}">{{$item->data['user_name']}} a  {{$item->data['status']}} votre demande d'emploi {{$item->data['status'] == 'accepter' ? 'contacter le sur ce email : '.$item->data['user_email'] : ''}}</a>
											@else
												<a href="{{route('readNotificationPost', ["id" => $item->id, "user" => $item->notifiable_id])}}" class="text-justify dropdown-item ">{{$item->data['user_postule_name']}} a postuler a votre demande d'emploi N°{{$item->data['demande_id']}}</a>
											@endif
										@endif
										@if (auth()->user()->profil->name == 'offre')
											@if ($item->type == "App\Notifications\UserPostuleOffreResponseNotification")
												<a href="{{route('readNotification', ["id" => $item->id, "user" => $item->notifiable_id])}}" class="dropdown-item text-justify {{$item->data['status'] == 'accepter' ? 'text-primary' : 'text-danger'}}">{{$item->data['user_name']}} a  {{$item->data['status']}} votre offre d'emploi {{$item->data['status'] == 'accepter' ? 'contacter le sur ce email : '.$item->data['user_email'] : ''}}</a>
											@else
												<a href="{{route('readNotificationPost', ["id" => $item->id, "user" => $item->notifiable_id])}}" class="text-justify dropdown-item ">{{$item->data['user_postule_name']}} a postuler a votre offre d'emploi N°{{$item->data['offre_id']}}</a>
											@endif
										@endif
									@endforeach

								</div>
							</li>
							@endif

						@endauth
						<li class="nav-item {{Route::is('welcome') ? 'active' : '' }}"><a class="nav-link" href="{{ route('welcome') }}">Home</a></li>
						@guest
							<li class="nav-item {{Route::is('home.listOffre') ? 'active' : '' }}"><a class="nav-link " href="{{ route('home.listOffre') }}">Offres</a></li>
							<li class="nav-item {{Route::is('home.listDemande') ? 'active' : '' }}"><a class="nav-link" href="{{ route('home.listDemande') }}">Demandes</a></li>
							@if (Route::is('login'))
                                <li class="nav-item {{Route::is('register') ? 'active' : '' }}">
									<a class="nav-link " href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
							@endif
							@if (Route::is('register'))
                                <li class="nav-item {{Route::is('login') ? 'active' : '' }}">
									<a class="nav-link " href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
							@if (!Route::is('register') && !Route::is('login'))
								<li class="nav-item {{Route::is('login') ? 'active' : '' }}">
									<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
								</li>
								<li class="nav-item {{Route::is('register') ? 'active' : '' }}">
									<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
								</li>
							@endif
						@endguest
						
						@auth

							@if (auth()->user()->profil->name == 'offre')
								<li class="nav-item {{Route::is('home.listDemande') ? 'active' : '' }}"><a class="nav-link" href="{{ route('home.listDemande') }}">Demandes</a></li>

								<li class="nav-item {{Route::is('offre.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('offre.index') }}">mes offres</a></li>

								<li class="nav-item {{Route::is('offre.create') ? 'active' : '' }}"><a class="nav-link" href="{{ route('offre.create') }}">creer une offre</a></li>
							@endif

							@if (auth()->user()->profil->name == 'demande')
								<li class="nav-item {{Route::is('home.listOffre') ? 'active' : '' }}"><a class="nav-link " href="{{ route('home.listOffre') }}">Offres</a></li>

								<li class="nav-item {{Route::is('demandes.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('demandes.index') }}">mes demande</a></li>

								<li class="nav-item {{Route::is('demandes.create') ? 'active' : '' }}"><a class="nav-link" href="{{ route('demandes.create') }}">creer une demande</a></li>
							@endif

							
						@endauth

						<li class="nav-item {{Route::is('home.contact') ? 'active' : '' }}"><a class="nav-link" href="{{ route('home.contact') }}">Contact</a></li>

						@auth
							<li class="nav-item dropdown {{Route::is('home') ? 'active' : '' }} {{Route::is('profile.show') ? 'active' : '' }} {{Route::is('profile.index') ? 'active' : '' }}">
								<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
									{{ Auth::user()->name }}
								</a>
								
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
									
									<a class="dropdown-item" href="{{route('home')}}">Dashboard </a>
									<a class="dropdown-item" href="{{route('profile.show')}}">voir profil </a>
									<a class="dropdown-item" href="{{route('profile.index')}}">modifie profil </a>

									<a class="dropdown-item" href="{{ route('logout') }}"
									onclick="event.preventDefault();
													document.getElementById('logout-form').submit();">
										{{ __('Logout') }}
									</a>

									<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
										@csrf
									</form>
								</div>
							</li>


						@endauth
					</ul>
					
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
	



@yield('content')




    <footer class="footer bg-info text-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>About US</h3>
                        </div>
                        <p> Integer rutrum ligula eu dignissim laoreet. Pellentesque venenatis nibh sed tellus faucibus bibendum. Sed fermentum est vitae rhoncus molestie. Cum sociis natoque penatibus et magnis dis montes.</p>
                        <p>Sed fermentum est vitae rhoncus molestie. Cum sociis natoque penatibus et magnis dis montes.</p>
                    </div><!-- end clearfix -->
                </div><!-- end col -->

				<div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Information Link</h3>
                        </div>
                        <ul class="footer-links">
                            <li><a class="text-white" href="#">Home</a></li>
                            <li><a class="text-white" href="#">Blog</a></li>
                            <li><a class="text-white" href="#">Pricing</a></li>
							<li><a class="text-white" href="#">About</a></li>
							<li><a class="text-white" href="#">Faq</a></li>
							<li><a class="text-white" href="#">Contact</a></li>
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->
				
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Contact Details</h3>
                        </div>

                        <ul class="footer-links">
                            <li><a class="text-white" href="mailto:#">info@yoursite.com</a></li>
                            <li><a class="text-white" href="#">www.yoursite.com</a></li>
                            <li>PO Box 16122 Collins Street West Victoria 8007 Australia</li>
                            <li>+61 3 8376 6284</li>
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->
				
            </div><!-- end row -->
        </div><!-- end container -->
    </footer><!-- end footer -->

    <div class="copyrights bg-info">
        <div class="container">
            <div class="footer-distributed">
                <div class="footer-left">                   
                    <p class="footer-company-name text-white">All Rights Reserved. &copy; 2018 <a href="#">QuickCloud</a> Design By : <a href="https://html.design/">html design</a></p>
                </div>

                <div class="footer-right">
                    <ul class="footer-links-soi">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-github"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
						<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
					</ul><!-- end links -->
                </div>
            </div>
        </div><!-- end container -->
    </div><!-- end copyrights -->

    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="{{asset('style/js/all.js')}}"></script>
    <!-- ALL PLUGINS -->
    <script src="{{asset('style/js/custom.js')}}"></script>
	<script src="{{asset('style/js/timeline.min.js')}}"></script>
	<script>
		timeline(document.querySelectorAll('.timeline'), {
			forceVerticalMode: 700,
			mode: 'horizontal',
			verticalStartPosition: 'left',
			visibleItems: 4
		});
	</script>
	@yield('extra-js')
</body>
</html>