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

        <link href="{{ asset('public/admin/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
        <link href="{{ asset('public/admin/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
        <link href="{{ asset('public/admin/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
        
        <link href="{{ asset('public/admin/assets/css/pace.min.css') }}" rel="stylesheet" />
        <script src="{{ asset('public/admin/assets/js/pace.min.js') }}"></script>
        
        <link href="{{ asset('public/admin/assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('public/admin/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
        <link href="{{ asset('public/admin/assets/css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('public/admin/assets/css/icons.css') }}" rel="stylesheet">
        <link href="{{ asset('public/admin/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />

        <link rel="stylesheet" href="{{ asset('public/admin/assets/css/dark-theme.css') }}" />
        <link rel="stylesheet" href="{{ asset('public/admin/assets/css/semi-dark.css') }}" />
        <link rel="stylesheet" href="{{ asset('public/admin/assets/css/header-colors.css') }}" />

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

            .bg-success, .btn-success {
                background-color: #ff0091 !important;
            }
            table.dataTable td, table.dataTable th {
                white-space: normal;
            }
            .modal {
                background: #000000c9 !important;
            }
            .des_form {
                pointer-events: none;
                appearance: none;
            }
            .active .bs-stepper-circle {
                background-color: #fa4f26 !important;
            }
            .sidebar-wrapper .metismenu .mm-active>a,
            .sidebar-wrapper .metismenu a:active,
            .sidebar-wrapper .metismenu a:focus,
            .sidebar-wrapper .metismenu a:hover {
                color: #fff !important;
                background-color: #000 !important;
                font-weight: 400;
                font-size: 13px;
            }
            .sidebar-wrapper .metismenu ul a {
                font-size: 13px;
            }
            .sidebar-wrapper .metismenu a .menu-title {
                font-size: 14px;
            }
            .logo-text {
                font-size: 18px;
                color: #fff;
                font-weight: 500;
            }
            .sidebar-wrapper .metismenu .mm-active .mm-active a {
                padding: 10px 20px;
            }
            .toggle-icon {
                color: #000;
            }
            table td {
                vertical-align: middle;
            }
            .boton-eliminar {
                border: 1px solid #eeecec;
                background: #f1f1f1;
                padding: 0;
                width: 34px;
                height: 34px;
                text-align: center;
            }
            .boton-eliminar i {
                color: #2b2a2a;
                width: 100%;
            }
            .des_form {
                pointer-events: none;
                appearance: none;
            }
            .modal .modal-title {
                font-size: 16px;
                font-weight: 500;
                color: rgb(63, 66, 87);
                text-transform: uppercase;
            }
            .modal label {
                color: rgba(0, 0, 0, 0.87);
                font-size: 14px;
                font-weight: 500;
            }
            .modal .form-control, .select2-container--bootstrap-5 .select2-selection {
                padding: 10px 14px;
                background-color: rgb(245, 248, 250);
                border-color: rgb(245, 248, 250);
                color: rgb(94, 98, 120);
                font-size: 13px;
            }
            .btn-primary {
                background-color: #3122c4 !important;
                border-color: #3122c4 !important;
                padding: 6px 16px;
                font-weight: 500;
            }
            .btn-dark {
                background: #00000096;
                border: none;
                font-weight: 400;
            }
            .btn-default {
                color: #3122c4 !important;
            }
            tbody, td, tfoot, th, thead, tr {
                color: rgba(0, 0, 0, 0.87) !important;
                font-size: 13px;
                font-weight: 500;
            }
            .title_page {
                color: rgb(63, 66, 87);
                font-weight: 500;
                font-size: 16px;
                text-transform: uppercase;
            }
            .bg-estudio {
                background-color: rgb(49, 34, 196);
            }
            .topbar, .sidebar-header {
                background-color: #000;
            }
            .active>.page-link, .page-link.active {
                background-color: #3122c4;
                border-color: #3122c4;
            }
            .user-box {
                border: none;
            }
            .modal-numero {
                font-size: 16px;
                font-weight: 700;
                color: rgb(63, 66, 87);
            }
            .modal-tits {
                font-size: 22px;
                font-weight: 600;
                color: rgb(63, 66, 87);
                text-transform: uppercase;
            }
            .descrip_show {
                color: rgba(0, 0, 0, 0.87);
                font-size: 14px;
                font-weight: 400;
            }
            .bg-moradito {
                background-color: rgb(248, 245, 255);
            }
            @media (min-width: 992px) {
                .ModalPreDelete .modal-lg, .ModalPreDelete .modal-xl {
                    --bs-modal-width: 530px;
                }
            }
        </style>
    </head>

    <body>
        <div id="app">
            <div class="wrapper">
                <div class="sidebar-wrapper" data-simplebar="true">
                    <div class="sidebar-header">
                        <div>
                            <h2 class="logo-text">
                                PRALEMY ADMIN
                            </h2>
                        </div>

                        <div class="toggle-icon ms-auto">
                            <i class='bx bx-arrow-back'></i>
                        </div>
                    </div>
                    
                    @include('partials.admin.nav')
                </div>
                
                @include('partials.admin.header')
                
                <div class="page-wrapper">
                    <div class="page-content">
                        <main>
                            @yield('content')
                        </main>
                    </div>
                </div>
                
                @include('partials.admin.footer')
            </div>
        </div>

        <script src="{{ asset('public/admin/assets/js/bootstrap.bundle.min.js') }}"></script>
        
        <!-- script src="{{ asset('public/admin/assets/js/jquery.min.js') }}"></script -->
        <script src="{{ asset('public/admin/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
        <script src="{{ asset('public/admin/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
        <script src="{{ asset('public/admin/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>

        <script src="{{ asset('public/admin/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('public/admin/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>

        <script src="{{ asset('public/admin/assets/plugins/notifications/js/lobibox.min.js') }}"></script>
        <script src="{{ asset('public/admin/assets/plugins/notifications/js/notifications.min.js') }}"></script>
        <script src="{{ asset('public/admin/assets/plugins/notifications/js/notification-custom-script.js') }}"></script>
        
        <script src="{{ asset('public/admin/assets/js/app.js') }}"></script>
        
        @yield('footer_scripts')
    </body>
</html>
