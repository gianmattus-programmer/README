<style>
    .header_black#header-sticky {
        background: #fff;
    }
    #loading {
        background-color: #fff !important;
    }
    .main-menu > nav > ul > li .tp-submenu li > a {
        color: #000;
        border-bottom: 1px solid #000;
    }
    .main-menu > nav > ul > li .tp-submenu {
        background: #fff;
    }
    .main-menu > nav > ul > li .tp-submenu li:hover > a {
        color: #000;
    }
    .tp-header .header-sticky .main-menu > nav > ul > li > a {
        color: #000;
    }
    .tp_icons_right a {
        color: #000;
    }
</style>

<header>
    <div class="main-header d-none d-xl-block">
        <div class="tp-header">
            <div id="header-sticky" class="header_black header-bottom d-flex align-items-center pt-3 pb-3 header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-2">
                            <div class="main-logo ">
                                <a href="{{ url('/') }}">
                                    <img src="{{ asset('public/imagenes/Logo-en-negro.png') }}" alt="">
                                </a>
                            </div>
                        </div>

                        <div class="col-xl-8">
                            <div class="tp-header__main-menu main-menu d-flex justify-content-center">
                                <nav class="tp-main-menu-content">
                                    <ul class="mb-0">
                                        <li class="{{ (request()->is('encuentranos*')) ? 'mm-active' : '' }}">
                                            <a href="{{ url('encuentranos') }}">Encuéntranos</a>
                                        </li>
                                            
                                        <li class="{{ (request()->is('nosotros*')) ? 'mm-active' : '' }}">
                                            <a href="{{ url('nosotros') }}">We Are</a>
                                        </li>
                                            
                                        <li class="has-dropdown {{ (request()->is('cursos*')) ? 'mm-active' : '' }}">
                                            <a>Cursos y Programas</a>

                                            <ul class="tp-submenu">
                                                @foreach($categorias as $categoria)
                                                    @if($categoria->estatus == 1)
                                                        <li><a href="{{ url('/cursos/'.$categoria->id.'/'.str_replace(' ', '-', strtolower($categoria->nombre))) }}">{{ $categoria->nombre }}</a></li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </li>

                                        <li class="has-dropdown {{ (request()->is('shop*')) ? 'mm-active' : '' }}">
                                            <a>Shop</a>

                                            <ul class="tp-submenu">
                                                @foreach($tcategorias as $categoria)
                                                    @if($categoria->estatus == 1)
                                                        <li><a href="{{ url('/shops/'.$categoria->id.'/'.str_replace(' ', '-', strtolower($categoria->nombre))) }}">{{ $categoria->nombre }}</a></li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        
                        <div class="col-xl-2">
                            <div class="tp_icons_right tp-header__right text-end d-flex align-items-center justify-content-end">
                                @guest
                                    <a href="{{ url('login') }}">
                                        <i class="fa-sharp fa-solid fa-user"></i>
                                    </a>
                                @else
                                    @role('admin')
                                        <a href="{{ url('admin/cursoslistados') }}">
                                            <i class="fa-sharp fa-solid fa-home"></i>
                                        </a>
                                    @endrole

                                    <a href="{{ url('/profile/'.Auth::user()->name) }}">
                                        <i class="fa-sharp fa-solid fa-user"></i>
                                    </a>
                                @endguest

                                <a href="{{ url('carrito') }}">
                                    <i class="fa-sharp fa-solid fa-shopping-bag"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mobile-header d-xl-none pt-10 pb-10">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-6">
                    <div class="main-logo ">
                        <a href="{{ url('/') }}"><img src="https://pralemyfashionschool.com/public/imagenes/Logo-en-negro.png" alt=""></a>
                    </div>
                </div>

                <div class="col-6">
                    <div class="mobile__menu d-flex align-items-center justify-content-end">
                        <a class="tp-menu-bar" href="javascript:void(0)"><i class="fa-solid fa-bars"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>