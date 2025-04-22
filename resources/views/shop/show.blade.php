@extends('layouts.app')

@section('template_title')
    {{ $categoria->nombre }}
@endsection

@section('estilos')
    <style>
    </style>
@endsection

@section('content')
    @include('partials.blackheader')

    <div class="section_cursos">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="title_cat">
                        <h1>{{ $categoria->nombre }}</h1>
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
                        @foreach($tlistados as $listado)
                            @if($categoria->id == $listado->tiendacategoria_id && $listado->estatus == 1)
                                <div class="col-xxl-3 col-xl-3 col-lg-4 p-0 col-mobil">
                                    <div class="tp-slider__area p-relative">
                                        <div class="hero-active swiper-container">
                                            <div class="swiper-wrapper">
                                                <div class=" tp-slider__item p-relative w-100">
                                                    <div class="tp-slider-right-bg tp-slider__height tp-slider__height_category d-flex align-items-center "
                                                        data-background="{{ asset('panel/tienda/listados') }}/{{ $listado->file }}" style="">
                                                        <div class="container">
                                                            <div class="category-overlay"></div>

                                                            <div class="tp-slider__content p-relative z-index-1 text-center">
                                                                <a class="tp-btn-category" href="{{ url('/shop/'.$listado->id.'/'.str_replace(' ', '-', mb_strtolower($listado->nombre, 'UTF-8'))) }}">
                                                                    {{ $listado->nombre }}
                                                                </a>
                                                                
                                                                <p>
                                                                    {{ 'S/ '.number_format($listado->precio, 2, '.', '') }} - 
                                                                    <b>{{ 'S/ '.number_format($listado->descuento, 2, '.', '') }}</b>
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.footer')
@endsection

@section('footer_scripts')

@endsection
