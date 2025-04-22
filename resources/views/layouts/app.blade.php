<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@hasSection('template_title')@yield('template_title') | @endif {{ config('app.name', Lang::get('titles.app')) }}</title>
        <meta name="description" content="">
        <meta name="author" content="VAMF Ad Agency">
        <link rel="shortcut icon" href="{{ asset('public/imagenes/Pralemy_ico.svg') }}">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.cdnfonts.com/css/playfair-display" rel="stylesheet">

        {{-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries --}}
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <link rel="stylesheet" href="{{ asset('public/assets/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('public/assets/css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('public/assets/css/swiper-bundle.css') }}">
        <link rel="stylesheet" href="{{ asset('public/assets/css/flaticon.css') }}">
        <link rel="stylesheet" href="{{ asset('public/assets/css/nouislider.css') }}">
        <link rel="stylesheet" href="{{ asset('public/assets/css/jquery-ui.css') }}">
        <link rel="stylesheet" href="{{ asset('public/assets/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('public/assets/css/font-awesome-pro.css') }}">
        <link rel="stylesheet" href="{{ asset('public/assets/css/spacing.css') }}">
        <link rel="stylesheet" href="{{ asset('public/assets/css/main.css') }}">

        @yield('template_linked_fonts')
        @vite(['resources/assets/sass/app.scss', 'resources/assets/js/app.js'])
        @yield('template_linked_css')
        
        @yield('estilos')
        
        @if (Auth::User() && (Auth::User()->profile) && (Auth::User()->profile->avatar_status == 0))
            <style>
                .user-avatar-nav {
                    background: url(http://i1.wp.com/c1940652.r52.cf0.rackcdn.com/51ce28d0fb4f442061000000/Screen-Shot-2013-06-28-at-5.22.23-PM.png) 50% 50% no-repeat;
                    background-size: auto 100%;
                }
            </style>
        @endif

        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>

        @yield('head')

        <style>
            @import url('https://fonts.cdnfonts.com/css/playfair-display');

            body {
                background-color: #fff;
            }
            .thm-btn {
                background-color: #343a40;
            }
            .main-menu > nav > ul > li .tp-submenu li > a {
                padding: 8px 21px;
                color: #fff;
                font-family: "Helvetica", Sans-serif;
                font-weight: 500;
                text-transform: uppercase;
                font-size: 13px;
            }
            .main-menu > nav > ul > li .tp-submenu {
                background: #000;
                width: 300px;
                padding: 16px 0 0;
            }
            .main-menu > nav > ul > li .tp-submenu li:hover > a {
                color: #fff;
            }
            .tp-header .header-sticky .main-menu > nav > ul > li > a {
                color: #fff;
            }
            #loading {
                background-color: #000 !important;
            }
            .main-logo a img {
                width: 32%;
            }
            .main-logo::before {
                content: none;
            }
            #header-sticky {
                background: #000;
            }
            .tp-header .header-sticky .main-menu > nav > ul > li > a {
                padding: 13px 20px;
            }
            .main-menu > nav > ul > li > a {
                padding: 13px 20px;
                font-family: "Helvetica", Sans-serif;
                font-weight: 500;
                text-transform: uppercase;
                color: #FFFFFF;
            }
            .main-menu > nav > ul > li {
                margin-right: 0;
            }
            .main-menu > nav > ul > li:not(:last-child):after {
                content: "";
                height: 35%;
                border-left: 2px solid #7a7a7a;
                align-self: center;
            }
            a:hover {
                text-decoration: none;
            }
            .tp_icons_right a {
                color: #fff;
                font-size: 20px;
                padding-left: 20px;
            }
            .tp-category-title {
                color: #FFFFFF;
                font-family: "Playfair Display", Sans-serif;
                font-weight: 600;
                font-size: 40px;
                text-align: center;
            }
            .tp-btn-category, .tp-btn-category:hover, .tp-btn-category:focus {
                font-family: "Roboto", Sans-serif;
                font-size: 10px;
                font-weight: 400;
                background-color: #000000;
                border-radius: 30px 30px 30px 30px;
                padding: 12px 20px 12px;
                color: #fff;
            }
            .category-overlay {
                height: 100%;
                width: 100%;
                top: 0;
                left: 0;
                position: absolute;
                background-color: #000000;
                opacity: 0.3;
            }
            .category-overlay:hover {
                background-color: #FFFFFF;
            }
            .tp-slider__height.tp-slider__height_category {
                height: 700px;
            }
            .tp-slider-right-bg {
                background-size: cover;
            }
            @media only screen and (min-width: 1400px) and (max-width: 1599px) {
                .tp-slider__content {
                    margin-left: 0;
                }
                .tp-slider-right-bg {
                    width: 100%;
                    float: initial;
                }
            }
            @media only screen and (min-width: 1600px) and (max-width: 1700px) {
                .tp-slider__content {
                    margin-left: 0;
                }
            }
            @media only screen and (min-width: 1200px) and (max-width: 1399px) {
                .tp-slider__content {
                    margin-left: 0;
                }
                .tp-slider-right-bg {
                    width: 100%;
                    float: initial;
                }
            }
            @media (min-width: 1200px) {
                .container-xl, .container-lg, .container-md, .container-sm, .container {
                    max-width: 95%;
                }
                .mis_cursos .tp-slider__height.tp-slider__height_category .container-xl,
                .mis_cursos .tp-slider__height.tp-slider__height_category .container-lg, 
                .mis_cursos .tp-slider__height.tp-slider__height_category .container-md, 
                .mis_cursos .tp-slider__height.tp-slider__height_category .container-sm,
                .mis_cursos .tp-slider__height.tp-slider__height_category .container {
                    max-width: 100%;
                    padding: 0 10px;
                }
            }
            
            @media (min-width: 900px) {
                .container-xl, .container-lg, .container-md, .container-sm, .container {
                    max-width: 95%;
                }
                .mis_cursos .tp-slider__height.tp-slider__height_category .container-xl,
                .mis_cursos .tp-slider__height.tp-slider__height_category .container-lg, 
                .mis_cursos .tp-slider__height.tp-slider__height_category .container-md, 
                .mis_cursos .tp-slider__height.tp-slider__height_category .container-sm,
                .mis_cursos .tp-slider__height.tp-slider__height_category .container {
                    max-width: 100%;
                    padding: 0 10px;
                }
            }
            /** General css */
            .title_cat h1 {
                color: #000000;
                font-family: "Helvetica", Sans-serif;
                font-weight: 500;
                text-transform: uppercase;
            }
            .section_cursos {
                padding: 150px 0 50px;
            }
            .margeleft {
                padding: 0;
            }
            .mis_cursos .tp-slider__height.tp-slider__height_category .container {

            }
            .mis_cursos .tp-btn-category, .mis_cursos .tp-btn-category:hover, .mis_cursos .tp-btn-category:focus {
                font-size: 10px;
            }
            @media (max-width: 1024px) {
                .margeleft {
                    padding: 0;
                }
                .section_cursos {
                    padding: 50px 10px 50px;
                }
                .title_cat h1 {
                    font-size: 29px;
                }
            }
            @media (max-width: 767px) {
                .rowleft, .rowright {
                    padding: 15px !important;
                }
                .data_profile h2, .mis_cursos h2 {
                    font-size: 20px;
                    margin: 10px 0 20px;
                    padding: 0;
                }
                .mis_cursos .col-mobil {
                    width: 50%;
                }
                .mis_cursos .tp-slider__height.tp-slider__height_category,
                .data_cursos .tp-slider__height.tp-slider__height_category {
                    height: 250px !important;
                }
                .mis_cursos .tp-btn-category, .mis_cursos .tp-btn-category:hover, .mis_cursos .tp-btn-category:focus,
                .tp-btn-category, .tp-btn-category:hover, .tp-btn-category:focus {
                    padding: 10px 8px 10px;
                    font-size: 7px;
                }
                .tp-slider__content p {
                    font-size: 10px !important;
                    line-height: 14px !important;
                    margin: 13px 0 0 !important;
                }
            }
            /**Mostrar cursos */
            .banner_encuentranos {

            }
            .banner_encuentranos img {
                width: 100%;
            }
            .data_profile h2, .mis_cursos h2 {
                color: #000000;
                font-family: "Helvetica", Sans-serif;
                font-weight: 500;
                text-transform: uppercase;
                font-size: 30px;
                margin-bottom: 20px;
                padding: 0;
            }
            .data_profile p {
                margin-bottom: 5px;
                color: #69727D;
                font-family: "Helvetica", Sans-serif;
                font-weight: 400;
            }
            .mis_cursos .tp-slider__height.tp-slider__height_category {
                height: 300px;
            }
            .tp-slider__content p {
                color: #FFFFFF;
                font-family: "Roboto", Sans-serif;
                font-size: 13px;
                font-weight: 400;
                line-height: 20px;
                margin: 20px 0 0;
                text-transform: uppercase;
            }
            .rowleft {
                padding: 0 10px 0 15px;
            }
            .rowright {
                padding: 0;
            }
            /** Mobile header */
            .mobile_black {
                background: #000;
            }
            /** Footer */
            .section_footer {
                padding: 70px;
            }
            .section_footer h5 {
                color: #000000;
                font-family: "Helvetica", Sans-serif;
                font-weight: 500;
                text-transform: uppercase;
                text-align: center;
                margin-bottom: 15px;
            }
            .section_footer p {
                font-family: "Helvetica", Sans-serif;
                font-weight: 400;
                text-align: center;
                margin-bottom: 0px;
                line-height: 23px;
            }
            .title_foot {
                margin-bottom: 0;
            }
            .section_footer p a {
                color: #54595f !important;
                font-size: 16px;
            }
            .section_prefooter {
                padding: 50px 0px 20px;
            }
            .copy_foot p {
                color: #000000;
                font-family: "Helvetica", Sans-serif;
                font-size: 14px;
                font-weight: 400;
            }
            .socials_foot {
                text-align: right;
            }
            .socials_foot a {
                color: #000;
                font-size: 25px;
                padding-left: 15px;
            }
            .boton_wsp {
                position: fixed;
                bottom: 100px;
                right: 50px;
                z-index: 2;
            }
            .btn-wsp, .btn-wsp:hover, .btn-wsp:focus {
                background-color: #000000;
                font-family: "Helvetica", Sans-serif;
                font-weight: 600;
                color: #FFFFFF;
                border-radius: 30px 30px 30px 30px;
                padding: 12px 35px;
                font-size: 13px;
            }
            .btn-wsp i {
                margin-right: 5px;
            }
            .redes_cont {
                position: fixed;
                left: 10px;
                top: 35%;
            }
            .redes_cont p {
                margin-bottom: 5px;
                color: #fff;
            }
            .redes_cont p a {
                display: inline-flex;
                background-color: #000000;
                align-items: center;
                justify-content: center;
                text-align: center;
                cursor: pointer;
                border-radius: 50%;
                font-size: 16px;
                width: 20px;
                height: 20px;
                padding: 20px;
                color: #fff;
            }
            .redes_cont p a i {
                color: #fff;
            }
            /*div.paddingprofile {
                padding-left: 25px;
            }*/
            .contact-page__comment-input input, .contact-page__comment-input SELECT {
                background: #f8f5f1;
                height: 60px;
                margin-bottom: 20px;
                border: 1px solid transparent;
            }
            .container, .container-fluid, .container-xl, .container-lg, .container-md, .container-sm {
                width: 100%;
                padding-right: 15px;
                padding-left: 15px;
                margin-right: auto;
                margin-left: auto;
            }
            @media (max-width: 1199px) {
                .main-logo a img {
                    width: 18%;
                }
            }
            @media only screen and (min-width: 992px) and (max-width: 1199px) {
                .tp-slider-title {
                    padding-right: 0;
                    font-size: 70px;
                }
            }
            @media (max-width: 767px) {
                .main-logo a img {
                    width: 35%;
                }
                .tp-menu-bar {
                    background: #1a1e21;
                    color: #fff;
                }
                .tpoffcanvas__logo a img {
                    width: 50px;
                }
                .btn_login a {
                    background-color: #1a1e21;
                    color: #fff;
                    font-family: "Playfair Display", Sans-serif;
                    font-weight: 500;
                    text-transform: uppercase;
                    padding: 15px;
                }
                .tp-main-menu-mobile ul li > a {
                    font-family: "Playfair Display", Sans-serif;
                }
                .title_cat h1 {
                    font-size: 25px;
                }
                .section_home {
                    padding: 120px 10px 50px;
                }
                .section_footer {
                    padding: 50px 10px;
                }
                .section_prefooter {
                    padding: 20px 10px 20px;
                }
                .title_foot {
                    margin-bottom: 20px;
                }
                .section_footer p {
                    margin-bottom: 10px;
                }
                .copy_foot p {
                    text-align: center;
                    line-height: 21px;
                    margin-bottom: 20px;
                }
                .socials_foot {
                    text-align: center;
                }
                .boton_wsp {
                    bottom: 20px;
                    right: 20px;
                }
            }
            @media (max-width: 500px) {
                .boton_wsp {
                    bottom: 150px;
                }
            }
        </style>
    </head>

    <body>
        <div id="app">
            <!-- div class="back-to-top-wrapper">
                <button id="back_to_top" type="button" class="back-to-top-btn">
                    <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11 6L6 1L1 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                    </svg>
                </button>
            </div -->

            <div class="tpoffcanvas-area">
                <div class="tpoffcanvas">
                    <div class="tpoffcanvas__close-btn">
                        <button class="close-btn"><i class="fal fa-times"></i></button>
                    </div>

                    <div class="tpoffcanvas__logo mb-10">
                        <a href="{{ url('/') }}">
                            <img src="https://pralemyfashionschool.com/public/imagenes/Logo-en-negro.png" alt="">
                        </a>
                    </div>

                    <div class="tp-main-menu-mobile"></div>

                    <div class="offcanvas__btn mb-20 btn_login">
                        <a href="{{ url('login') }}" class="tp-btn w-100">Iniciar sesión</a>
                    </div>
                </div>
            </div>

            <div class="body-overlay"></div>

            <main class="py-0">
                @yield('content')
            </main>
        </div>

        <script src="{{ asset('public/assets/js/vendor/jquery.js') }}"></script>
        <script src="{{ asset('public/assets/js/vendor/waypoints.js') }}"></script>
        <script src="{{ asset('public/assets/js/bootstrap-bundle.js') }}"></script>
        <script src="{{ asset('public/assets/js/swiper-bundle.js') }}"></script>
        <script src="{{ asset('public/assets/js/nouislider.js') }}"></script>
        <script src="{{ asset('public/assets/js/magnific-popup.js') }}"></script>
        <script src="{{ asset('public/assets/js/parallax.js') }}"></script>
        <script src="{{ asset('public/assets/js/jquery-ui.js') }}"></script>
        <script src="{{ asset('public/assets/js/jarallax.js') }}"></script>
        <script src="{{ asset('public/assets/js/nice-select.js') }}"></script>
        <script src="{{ asset('public/assets/js/counterup.js') }}"></script>
        <script src="{{ asset('public/assets/js/jarallax.js') }}"></script>
        <script src="{{ asset('public/assets/js/wow.js') }}"></script>
        <script src="{{ asset('public/assets/js/isotope-pkgd.js') }}"></script>
        <script src="{{ asset('public/assets/js/imagesloaded-pkgd.js') }}"></script>
        <script src="{{ asset('public/assets/js/ajax-form.js') }}"></script>
        <script src="{{ asset('public/assets/js/main.js?v=2') }}"></script>
        
        @yield('footer_scripts')
    </body>
</html>
