<?php



use DebugBar\StandardDebugBar;

$debugbar = new StandardDebugBar();
$debugbarRenderer = $debugbar->getJavascriptRenderer();

$debugbar["messages"]->addMessage("hello world!");
?>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo $debugbarRenderer->renderHead() ?>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com"/>
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"/>
    <link href='{{ asset("css/font-awesome.css")}}' rel='stylesheet'/>
    <!-- Styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.5/css/alt/adminlte.core.min.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.5/css/adminlte.min.css" rel="stylesheet"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/flexslider.css')}}" rel='stylesheet'/>
    <link href="{{ asset('css/jquery-ui1.css')}}" rel='stylesheet'/>
    <link href="{{ asset('css/style.css')}}" rel='stylesheet'/>
    <link href="{{ asset('css/style7.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('css/shop.css') }}" type="text/css" media="screen" property="" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery-ui1.css') }}"/>
    <link rerl="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css')}}"/>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    eshop
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class='nav-item'>
                            <a class="nav-link" href="{{ URL::to('shops')}}">Shops</a>
                        </li>
                        <li class='nav-item'>
                            <a class="nav-link" href="{{ URL::to('products')}}">Products</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('cart')}}">Cart</a>
                            </li>
                            @if(Auth::user()->isAdministrator())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin/dashboard')}}">Admin</a>
                            </li>
                            @endif
                            <li class="nav-item dropdown">
                            
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4" >
            @yield('content')
        </main>
    </div>
    <?php echo $debugbarRenderer->render() ?>
</body>
	<!-- js -->
	<script type="text/javascript" src="{{ URL::asset('js/jquery-3.5.1.min.js') }}"></script>
	<!-- //js -->
	<!-- /nav -->'
	<script src="{{ URL::asset('js/modernizr-2.6.2.min.js') }}"></script>
	<script src="{{ URL::asset('js/classie.js') }}"></script>
	<script src="{{ URL::asset('js/demo1.js') }}"></script>
	
    <!--//search-bar-->
	<script src="{{ URL::asset('js/responsiveslides.js') }}"></script>
	<script>
       
		jQuery(function ($) {
			$("#slider4").responsiveSlides({
				auto: true,
				pager: true,
				nav: true,
				speed: 1000,
				namespace: "callbacks",
				before: function () {
					$('.events').append("<li>before event fired.</li>");
				},
				after: function () {
					$('.events').append("<li>after event fired.</li>");
				}
			});
		});
	</script>
	<!-- js for portfolio lightbox -->
	<!-- start-smoth-scrolling -->
    <script type="text/javascript" src="{{ URL::asset('js/jquery-2.1.4.min.js') }}"></script>
    <script type="text/javscript" src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.5/js/adminlte.min.js"></script>
	<script type="text/javascript" src="{{ URL::asset('js/move-top.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/easing.js') }} "></script>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smoth-scrolling -->

</html>
