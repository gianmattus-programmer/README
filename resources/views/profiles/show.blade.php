@extends('layouts.app')

@section('template_title')
    Mi Cuenta
@endsection

@section('estilos')
    <style>
        .mis_cursos {
            margin-top: 50px;
        }
        .cursos_bloqueados .category-overlay {
            opacity: 0.7 !important;
        }
        /* PROGRESS BAR - BASE */
        .meter { 
            height: 20px;
            position: relative;
            background: #DCE0E3;
            border-radius: 8px;
            width: 80%;
        }
        .dark {
            background: #4D575F;
        }
        .meter > span {
            text-align: center;
            color: #fff;
            display: block;
            height: 100%;
            -webkit-border-top-right-radius: 20px;
            -webkit-border-bottom-right-radius: 20px;
                -moz-border-radius-topright: 20px;
                -moz-border-radius-bottomright: 20px;
                    border-top-right-radius: 20px;
                    border-bottom-right-radius: 20px;
                -webkit-border-top-left-radius: 20px;
            -webkit-border-bottom-left-radius: 20px;
                    -moz-border-radius-topleft: 20px;
                -moz-border-radius-bottomleft: 20px;
                        border-top-left-radius: 20px;
                    border-bottom-left-radius: 20px;
            background-color: #ff0091;
            position: relative;
            overflow: hidden;
            font-size: 12px;
            line-height: 20px;
        }
        .meter > span:after {
            content: "";
            position: absolute;
            top: 0; left: 0; bottom: 0; right: 0;
            /*background-image: -webkit-gradient(linear, 0 0, 100% 100%, color-stop(.25, #56aa1c), color-stop(.25, transparent), color-stop(.5, transparent), color-stop(.5, #56aa1c), color-stop(.75, #56aa1c), color-stop(.75, transparent), to(transparent));
            background-image: -webkit-linear-gradient(-45deg, #56aa1c 25%, transparent 25%, transparent 50%, #56aa1c 50%, #56aa1c 75%, transparent 75%, transparent);
            background-image: -moz-linear-gradient(-45deg, #56aa1c 25%, transparent 25%, transparent 50%, #56aa1c 50%, #56aa1c 75%, transparent 75%, transparent);
            background-image: -ms-linear-gradient(-45deg, #56aa1c 25%, transparent 25%, transparent 50%, #56aa1c 50%, #56aa1c 75%, transparent 75%, transparent);
            background-image: -o-linear-gradient(-45deg, #56aa1c 25%, transparent 25%, transparent 50%, #56aa1c 50%, #56aa1c 75%, transparent 75%, transparent);
            */z-index: 1;
            -webkit-background-size: 20px 20px;
            -moz-background-size:    20px 20px;
            background-size:         20px 20px;
            -webkit-animation: move 2s linear infinite;
            -webkit-border-top-right-radius: 20px;
            -webkit-border-bottom-right-radius: 20px;
                -moz-border-radius-topright: 20px;
                -moz-border-radius-bottomright: 20px;
                    border-top-right-radius: 20px;
                    border-bottom-right-radius: 8px;
                -webkit-border-top-left-radius: 20px;
            -webkit-border-bottom-left-radius: 20px;
                    -moz-border-radius-topleft: 20px;
                -moz-border-radius-bottomleft: 20px;
                        border-top-left-radius: 20px;
                    border-bottom-left-radius: 20px;
            overflow: hidden;
        }
        /* PROGRESS BAR - ANIMATION */
        @-webkit-keyframes move {
            0% {background-position: 0 0;}
            100% {background-position: 30px 30px;}
        }
        @-moz-keyframes move {
            0% {background-position: 0 0;}
            100% {background-position: 30px 30px;}
        }
        ::-ms-fill-lower {background: #dc14b7;}
    </style>
@endsection

@section('content')
    @include('partials.blackheader')

    <div class="section_cursos paddingprofile">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="title_cat">
                        <h1>¡HOLA {{ $user->first_name }}!</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="data_profile margeleft paddingprofile">
            <div class="container">
                <div class="row">
                    <div class="alert alert-success border-0 bg-success alert-dismissible fade show p-3 m-0 pl-5 pr-5">
                        <div class="d-flex align-items-center">
                            <div class="text-white pl-3">
                                <i class="fa-sharp fa-solid fa-check-circle"></i>
                            </div>
            
                            <div class="ms-2">
                                <p class="mb-0 text-white font-14">¡Felicidades! Puedes pasar al siguiente módulo. Recuerda que tu profesor revisará tu trabajo y se notificará la nota apenas esté disponible.</p>
                            </div>
                        </div>
                </div>
                </div>
            </div>
        </div>
    @endif
    
    <div class="data_profile margeleft paddingprofile">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-xs-3">
                    <h2>Mi Perfil</h2>

                    <p>Nombre: {{ $user->first_name }}</p>
                    <p>Apellidos: {{ $user->last_name }}</p>
                </div>

                <div class="col-lg-5 col-md-5 col-xs-5">
                    <h2>Mi Progreso</h2>

                    <div class="meter">
                        <span style="width: {{ $porcentaje }}%;">{{ $porcentaje }}%</span>
                    </div>
                    
                    <p class="mt-3">Accede aquí a tus clases: <a href="" target="_BLANK">Ingresar</a></p>
                </div>

                <div class="col-lg-4 col-md-4 col-xs-4 rowright">
                    <h2>Datos de la cuenta</h2>

                    <p>Correo electrónico: {{ $user->email }}</p>
                    <p>Contraseña: Editar</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mis_cursos margeleft paddingprofile">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-8 col-xs-8">
                    <div class="row rowleft">
                        <h2>MIS CURSOS</h2>

                        @foreach($checkouts as $checkout)
                            @foreach($checkout->detalles as $detalle)
                                @if($detalle->listado)
                                    <div class="col-xxl-4 col-xl-4 col-lg-6 p-0 col-mobil">
                                        <div class="tp-slider__area p-relative">
                                            <div class="hero-active swiper-container">
                                                <div class="swiper-wrapper">
                                                    <div class="tp-slider__item p-relative w-100">
                                                        <div class="tp-slider-right-bg tp-slider__height tp-slider__height_category d-flex align-items-center"
                                                            data-background="https://pralemyfashionschool.com/panel/cursos/listados/{{ $detalle->listado->file }}">
                                                            <div class="container">
                                                                <div class="category-overlay"></div>

                                                                <div class="tp-slider__content p-relative z-index-1 text-center">
                                                                    <a class="tp-btn-category" href="{{ url('/pagado/'.$detalle->listado->id.'/'.str_replace(' ', '-', mb_strtolower($detalle->listado->nombre, 'UTF-8'))) }}">
                                                                        {{ $detalle->listado->nombre }}
                                                                    </a>
                                                                    
                                                                    <p>
                                                                        {{ $detalle->listado->meses == 1 ? $detalle->listado->meses.' mes' : $detalle->listado->meses.' meses' }}
                                                                        <br>
                                                                        {{ $detalle->listado->sesiones == 1 ? $detalle->listado->sesiones.' sesión' : $detalle->listado->sesiones.' sesiones' }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-5 col-md-4 col-xs-4">
                    <div class="row rowright">
                        <h2>CURSOS RESTANTES</h2>
                        
                        @foreach($restantes as $listado)
                            <div class="col-xxl-6 col-xl-6 p-0 col-mobil cursos_bloqueados">
                                <div class="tp-slider__area p-relative">
                                    <div class="hero-active swiper-container">
                                        <div class="swiper-wrapper">
                                            <div class=" tp-slider__item p-relative w-100">
                                                <div class="tp-slider-right-bg tp-slider__height tp-slider__height_category d-flex align-items-center "
                                                    data-background="/panel/cursos/listados/{{ $listado->file }}" style="">
                                                    <div class="container">
                                                        <div class="category-overlay"></div>

                                                        <div class="tp-slider__content p-relative z-index-1 text-center">
                                                            <div class="col-md-12 mb-3">
                                                                <i class="fa-sharp fa-solid fa-lock text-white"></i>
                                                            </div>

                                                            <a class="tp-btn-category" href="{{ url('/curso/'.$listado->id.'/'.str_replace(' ', '-', mb_strtolower($listado->nombre, 'UTF-8'))) }}">
                                                                {{ $listado->nombre }}
                                                            </a>
                                                            
                                                            <p>
                                                                @if($listado->meses == 1)
                                                                    {{ $listado->meses.' mes' }}
                                                                @else
                                                                    {{ $listado->meses.' meses' }}
                                                                @endif
                                                                <br>
                                                                @if($listado->sesiones == 1)
                                                                    {{ $listado->sesiones.' sesión' }}Sesión
                                                                @else
                                                                    {{ $listado->sesiones.' sesiones' }}
                                                                @endif
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.payfooter')
@endsection

@section('footer_scripts')
    <script>
        $(".meter > span").each(function() {
            $(this)
                .data("origWidth", $(this).width())
                .width(0)
                .animate({
                    width: $(this).data("origWidth")
                }, 1200);
        });
    </script>
@endsection
