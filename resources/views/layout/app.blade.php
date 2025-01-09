<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>KAMIL MOTORS</title>
    <label style="display:none">- @yield('title')</label>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!---------------------TODO LO QUE TIENE QUE VER CON LA PAGINA WEB------*-*----->

    <!-- LIBRARY FONT-->
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,400italic,700,900,300">
    <link type="text/css" rel="stylesheet"
        href="{{ asset('assets/font/font-icon/font-awesome-4.4.0/css/font-awesome.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/font/font-icon/font-svg/css/Glyphter.css') }}">
    <!-- LIBRARY CSS-->

    <link type="text/css" rel="stylesheet" href="{{ asset('assets/libs/animate/animate.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/libs/bootstrap-3.3.5/css/bootstrap.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/libs/bootstrap-3.3.5/css/bootstrap.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/libs/owl-carousel-2.0/assets/owl.carousel.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/libs/selectbox/css/jquery.selectbox.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/libs/fancybox/css/jquery.fancybox.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/libs/fancybox/css/jquery.fancybox-buttons.css') }}">
    <link type="text/css" rel="stylesheet"
        href="{{ asset('assets/libs/media-element/build/mediaelementplayer.min.css') }}">
    @yield('head')





    <!-- STYLE CSS    --><!--link(type="text/css", rel='stylesheet', href='assets/css/color-1.css', id="color-skins")-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/color-1.css') }}">
    <script src="{{ asset('assets/libs/jquery/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('assets/libs/js-cookie/js.cookie.js') }}"></script>
    <script>
        if ((Cookies.get('color-skin') != undefined) && (Cookies.get('color-skin') != 'color-1')) {
            $('#color-skins').attr('href', 'assets/css/' + Cookies.get('color-skin') + '.css');
        } else if ((Cookies.get('color-skin') == undefined) || (Cookies.get('color-skin') == 'color-1')) {
            $('#color-skins').attr('href', 'assets/css/color-1.css');
        }
    </script>

    <!-- JAVASCRIPT LIBS-->
    <script>
        if ((Cookies.get('color-skin') != undefined) && (Cookies.get('color-skin') != 'color-1')) {
            $('.logo .header-logo img').attr('src', 'assets/images/logo-' + Cookies.get('color-skin') + '.png');
        } else if ((Cookies.get('color-skin') == undefined) || (Cookies.get('color-skin') == 'color-1')) {
            $('.logo .header-logo img').attr('src', 'assets/images/logo-color-1.png');
        }
    </script>
    <script src="{{ asset('assets/libs/bootstrap-3.3.5/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/libs/owl-carousel-2.0/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/libs/count-to/jquery.countTo.js') }}"></script>
    <script src="{{ asset('assets/libs/wow-js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/libs/selectbox/js/jquery.selectbox-0.2.min.js') }}"></script>
    <script src="{{ asset('assets/libs/fancybox/js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('assets/libs/fancybox/js/jquery.fancybox-buttons.js') }}"></script>
    <script src="{{ asset('assets/js/pages/courses.js') }}"></script>
    <script src="{{ asset('assets/libs/appear/jquery.appear.js') }}"></script>
    <!-- MAIN JS-->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <!-- LOADING SCRIPTS FOR PAGE-->
    <script src="{{ asset('assets/libs/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/libs/isotope/fit-columns.js') }}"></script>
    <script src="{{ asset('assets/js/pages/homepage.js') }}"></script>
    <script src="{{ asset('assets/js/pages/profile-teacher.js') }}"></script>





    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    
    @yield('script')
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100%;
                margin: 0;
            }

            .full-height {
                height: 100%;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>

</head>
<header>
    <div class="header-topbar">
        <div class="container">
            <div class="topbar-left pull-left">
                <div class="email"><a href="#"><i
                            class="topbar-icon fa fa-envelope-o"></i><span>kamil.motores@gmail.com</span></a></div>
                <div class="hotline"><a href="#"><i class="topbar-icon fa fa-phone"></i><span>+51 933 239
                            619</span></a></div>
            </div>
            <div class="topbar-right pull-right">
                <div class="socials">
                    <a target="_blank" href="https://web.facebook.com/profile.php?id=100088600868925"
                        class="facebook"><i class="fa fa-facebook"></i></a>
                    <a target="_blank" href="mailto:kamil.motores@gmail.com" class="google"><i
                            class="fa fa-google-plus"></i></a>
                    <a target="_blank"
                        href="https://api.whatsapp.com/send?phone=+51933239619&text=Hola,%20¿Qué%20tal%20estás?"
                        class="twitter"><i class="fa fa-whatsapp"></i></a>
                    <a href="#" class="dribbble"><i class="fa fa-instagram"></i></a>
                </div>
                @if (Route::has('login'))
                    <div class="group-sign-in">
                        @auth
                            @if (Auth::user()->tipousuario == 1)
                                <a href="{{ url('/rrhh') }}">Home</a>
                            @else
                                <div>
                                    <a class="btn btn-app" style="opacity: 70%" href="/logout">
                                        <i class="fas fa-sign-out-alt"></i><b>{{ __('Cerrar Session') }}</b>
                                    </a>
                                </div>
                            @endif
                        @else
                            <a href="{{ route('login') }}" target="_blank" title="Colaboradores"
                                class="btn btn-login btn-green"><span> Intranet</span></a>
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="header-main homepage-01">
        <div class="container">
            <div class="header-main-wrapper">
                <div class="navbar-heade">
                    <div class="logo pull-left"><a href="/pagina" class="header-logo"><img
                                src="{{ asset('assets/images/logo-color-1.png') }}" alt="" /></a></div>
                    <button type="button" data-toggle="collapse" data-target=".navigation"
                        class="navbar-toggle edugate-navbar"><span class="icon-bar"></span><span
                            class="icon-bar"></span><span class="icon-bar"></span></button>
                </div>
                <nav class="navigation collapse navbar-collapse pull-right">
                    <ul class="nav-links nav navbar-nav">
                        <li><a href="#" class="main-menu">Inicio</span></a></li>
                        <li><a href="#" class="main-menu">Buscar Por
                                Placas</a></li>
                        {{-- <li class="dropdown"><a href="javascript:void(0)" class="main-menu">Categoria<span
                                    class="fa fa-angle-down icons-dropdown"></span></a>
                            <ul class="dropdown-menu edugate-dropdown-menu-1">
                                <li class="row" style="margin:5px;"><img
                                        src="/images/pagina/categoria/fabricacion.jpg" width="45px" alt=""
                                        class="img-responsive"><a href="{{ route('busquedafabricacion') }}"
                                        class="link-page">Fabricación</a></li>
                                <li class="row" style="margin:5px;"><img src="/images/pagina/categoria/equipo.jpg"
                                        width="45px" alt="" class="img-responsive"><a
                                        href="#" class="link-page">Equipo</a></li>
                            </ul>
                        </li>
                        <li><a href="contact.html" class="main-menu">Contactanos</a></li>
                        <li class="button-search">
                            <p class="main-menu"><i class="fa fa-search"></i></p>
                        </li> --}}
                        <div class="nav-search hide">
                            <form><input type="text" placeholder="Search" class="searchbox" />
                                <button type="submit" class="searchbutton fa fa-search"></button>
                            </form>
                        </div>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>

<body>
    @yield('content')
</body>

</html>
