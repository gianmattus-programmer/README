@extends('layouts.app')

@section('template_title')
    {{ $listado->nombre }}
@endsection

@section('estilos')
    <style>
        .mis_cursos {
            margin-top: 50px;
        }
        .content_temario .tp-slider__height.tp-slider__height_category {
            height: 500px;
        }
        .temario_content {
            background-color: #000000B0;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 30px 20px;
        }
        .temario_content h2 {
            color: #FFFFFF;
            font-family: "Roboto", Sans-serif;
            font-weight: 600;
            font-size: 15px;
            text-transform: uppercase;
        }
        .temario_content p {
            color: #FFFFFF;
            font-family: "Helvetica", Sans-serif;
            font-size: 12px;
            font-weight: 400;
            margin-bottom: 0;
            line-height: 16px;
        }
        .des_mod a {
            /*pointer-events: none; 
            cursor: default;*/
        }
        .des_cand i {
            font-size: 25px;
            color: #b6b6b6;
        }
        @media (max-width: 1199px) {
            .temario_content {
                padding: 20px 15px 30px;
            }
            .temario_content h2 {
                font-size: 14px;
            }
            .temario_content p {
                font-size: 13px;
                line-height: 16px;
            }
            .content_temario .tp-slider__height.tp-slider__height_category {
                height: 400px;
            }
        }
        @media (max-width: 767px) {
            .title_cat p {
                font-size: 12px;
                line-height: 20px;
            }
            .content_temario .col-mobil {
                width: 50%;
            }
            .temario_content p {
                display: none;
            }
            .temario_content h2 {
                font-size: 12px;
            }
            .temario_content {
                padding: 20px 10px 20px;
            }
            .content_temario .tp-slider__height.tp-slider__height_category {
                height: 250px;
            }   
        }
    </style>
@endsection

@section('content')
    @include('partials.blackheader')

    <div class="section_cursos paddingprofile">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="title_cat">
                        <h1>{{ $listado->nombre }}</h1>

                        <p>{{ $listado->descripcion }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content_temario paddingprofile">
        <div class="container">
            <div class="row">
                @php
                    $contador = 1;
                @endphp
                
                @foreach($temarios as $temario)
                    @if($temario->listado_id == $listado->id)
                        @if($temario->estatus == "1")
                            <div class="col-lg-4 col-md-4 col-xs-4 mb-4 col-mobil des_mod">
                                <div class="tp-slider__area p-relative">
                                    <div class="hero-active swiper-container">
                                        <div class="swiper-wrapper">
                                            <div class=" tp-slider__item p-relative w-100">
                                                <div class="tp-slider-right-bg tp-slider__height tp-slider__height_category d-flex align-items-center "
                                                    style="background-image: url('https://pralemyfashionschool.com/panel/cursos/temarios/{{ $temario->file }}')">
                                                    <div class="container">
                                                        <div class="category-overlay"></div>

                                                        <div class="tp-slider__content p-relative z-index-1 text-center">
                                                            @if($contador == 1)
                                                                <div class="col-md-12 mb-3 des_cand">
                                                                    
                                                                </div>

                                                                <a class="tp-btn-category" href="{{ url('/pagados/'.$temario->id.'/'.str_replace(' ', '-', mb_strtolower($temario->nombre, 'UTF-8'))) }}">
                                                                    Modulo {{ $contador }}
                                                                </a>
                                                            @else
                                                                @if($temario->examen == 2)
                                                                    <div class="col-md-12 mb-3 des_cand">
                                                                        
                                                                    </div>

                                                                    <a class="tp-btn-category" href="{{ url('/pagados/'.$temario->id.'/'.str_replace(' ', '-', mb_strtolower($temario->nombre, 'UTF-8'))) }}">
                                                                        Modulo {{ $contador }}
                                                                    </a>
                                                                @else
                                                                    <div class="col-md-12 mb-3 des_cand">
                                                                        <i class="fa-sharp fa-solid fa-lock"></i>
                                                                    </div>

                                                                    <a class="tp-btn-category">
                                                                        Modulo {{ $contador }}
                                                                    </a>
                                                                @endif
                                                            @endif
                                                            
                                                            @php
                                                                $contador++;
                                                            @endphp
                                                        </div>

                                                        <div class="temario_content">
                                                            <h2>
                                                                <a class="text-white" href="{{ url('/pagados/'.$temario->id.'/'.str_replace(' ', '-', mb_strtolower($temario->nombre, 'UTF-8'))) }}">
                                                                    @php echo substr($temario->nombre, 0, 40).'...' @endphp
                                                                </a>
                                                            </h2>

                                                            <p>@php echo substr($temario->descripcion, 0, 140).'...' @endphp</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    @include('partials.payfooter')
@endsection

@section('footer_scripts')
    
@endsection