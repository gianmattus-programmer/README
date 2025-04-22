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
    </style>
@endsection

@section('content')
    @include('partials.blackheader')

    <div class="section_cursos">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="title_cat">
                        <h1>Todos los curos</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mis_cursos margeleft">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <div class="row rowleft">
                        @foreach($listados as $listado)
                            <div class="col-lg-3 col-md-3 col-xs-3 p-0 col-mobil">
                                <div class="tp-slider__area p-relative">
                                    <div class="hero-active swiper-container">
                                        <div class="swiper-wrapper">
                                            <div class=" tp-slider__item p-relative w-100">
                                                <div class="tp-slider-right-bg tp-slider__height tp-slider__height_category d-flex align-items-center "
                                                    data-background="/panel/cursos/listados/{{ $listado->file }}" style="">
                                                    <div class="container">
                                                        <div class="category-overlay"></div>

                                                        <div class="tp-slider__content p-relative z-index-1 text-center">
                                                            <a class="tp-btn-category" href="{{ url('/pagado/'.$listado->id.'/'.str_replace(' ', '-', mb_strtolower($listado->nombre, 'UTF-8'))) }}">
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
    
@endsection
