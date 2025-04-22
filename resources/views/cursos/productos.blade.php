@extends('layouts.app')

@section('template_title')
    {{ $listado->nombre }}
@endsection

@section('estilos')
    <style>
        .listado_right_desc {
            background: #000;
            padding: 50px 100px;
        }
        .tp-btn-list_desc {
            font-family: "Roboto", Sans-serif;
            font-size: 13px;
            font-weight: 400;
            background-color: #fff;
            border-radius: 30px 30px 30px 30px;
            padding: 12px 30px 12px 30px;
            color: #000000;
        }
        .tp-descripciones {
            text-align: justify;
            color: #FFFFFF;
            font-family: "Helvetica", Sans-serif;
            font-size: 18px;
            font-weight: 500;
        }
        .play_content i {
            font-size: 80px;
        }
        .temario_cont {
            padding: 70px 0;
        }
        .tp-faq-area {
            width: 80%;
        }
        .tp-custom-accordion .accordion-body {
            background-color: #fff;
            line-height: 20px;
            border-radius: 0;
            color: #7A7A7A;
            font-family: "Helvetica", Sans-serif;
            font-size: 14px;
            font-weight: 400;
            padding: 0;
        }
        .tp-custom-accordion .accordion-items {
            background-color: #fff;
            box-shadow: none;
            border-bottom: 1px solid #000;
            padding-bottom: 10px;
            margin-bottom: 0;
        }
        .tp-custom-accordion .accordion-buttons:not(.collapsed) {
            padding: 10px 28px 10px;
        }
        .tp-custom-accordion .accordion-buttons:not(.collapsed), .tp-custom-accordion .accordion-buttons {
            background-color: #fff;
            color: #000;
            font-family: "Helvetica", Sans-serif;
            font-size: 15px;
            font-weight: 500;
            padding-left: 30px;
            text-transform: uppercase;
        }
        .tp-custom-accordion .accordion-buttons {
            padding: 10px 28px 0;
        }
        .tp-custom-accordion .accordion-buttons::after {
            left: 0;
            text-align: left;
            color: #000;
            background-color: transparent;
            top: 7px;
        }
        .meses_cont {
            margin-bottom: 50px;
        }
        .precios_cont {
            padding: 10px 0 10px;
            display: flex;
            margin: 0;
        }
        .precios_cont .pre_ini {
            margin-bottom: 5px;
            font-size: 13px;
            color: #000;
            line-height: 10px;
        }
        .precios_cont .pre_fin {
            margin-bottom: 0;
            color: #000;
            font-size: 13px;
            font-weight: 500;
            line-height: 16px;
        }
        .inicio_cont {
            width: 17%;
            padding-right: 10px;
        }
        .duracion_cont {
            width: 17%;
            padding-right: 10px;
        }
        .horario_cont {
            width: 38%;
            padding-right: 10px;
        }
        .precio_cont {
            width: 15%;
            padding-right: 10px;
        }
        .elegir_cont {
            width: 15%;
        }
        .elegir_cont .btn_elegir {
            width: 100%;
            color: #fff;
            height: 100%;
        }
        .modalidad_cont {

        }
        .modalidad_cont p {
            color: #000;
            font-size: 12px;
            font-weight: 500;
            margin-bottom: 0;
        }
        .horarios_cont {
            border-bottom: 2px solid #000;
            padding: 0;
            margin: 0 0 20px;
        }
        .pre_tac {
            text-decoration: line-through;
            font-weight: 400;
        }
        @media (max-width: 1024px) {
            .precios_cont .pre_fin {
                font-size: 11px;
            }
            .precios_cont .pre_ini {
                font-size: 11px;
            }
            .elegir_cont .btn_elegir {
                font-size: 9px;
                align-items: center;
                justify-content: center;
                display: flex;
            }
            .tp-slider__height.tp-slider__height_category {
                height: 500px !important;
            }
            .listado_right_desc {
                padding: 20px 20px;
            }
            .tp-custom-accordion .accordion-buttons:not(.collapsed) {
                padding: 5px 28px 5px;
            }
            .tp-custom-accordion .accordion-buttons:not(.collapsed), .tp-custom-accordion .accordion-buttons {
                font-size: 11px;
            }
            .temario_cont {
                padding: 50px 10px;
            }
        }
        @media (max-width: 767px) {
            .meses_cont {
                margin-bottom: 20px;
            }
            .modalidad_cont p {
                font-size: 9px;
            }
            .precios_cont {
                width: 100%;
                display: inline-block;
                position: relative;
            }
            .inicio_cont, .duracion_cont, .horario_cont, .precio_cont {
                width: 50%;
                float: left;
                margin-bottom: 10px;
            }
            .elegir_cont {
                width: 100%;
                float: left;
            }
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
                        <h1>{{ $listado->nombre }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success border-0 bg-success alert-dismissible fade show p-3 m-0 pl-5 pr-5">
            <div class="d-flex align-items-center">
                <div class="text-white pl-3">
                    <i class="fa-sharp fa-solid fa-check-circle"></i>
                </div>

                <div class="ms-2">
                    <p class="mb-0 text-white font-14">{{ $message }}</p>
                </div>

                <a href="{{ url('carrito') }}" class="btn btn-dark text-white ms-auto mr-2">Ir al carrito</a>
            </div>
        </div>
    @endif
    
    <div class="row col-md-12 p-0 m-0">
        <div class="col-xxl-6 col-xl-6 p-0">
            <div class="tp-slider__area p-relative">
                <div class="hero-active swiper-container">
                    <div class="swiper-wrapper">
                        <div class=" tp-slider__item p-relative w-100">
                            <div class="tp-slider-right-bg tp-slider__height tp-slider__height_category">
                                <div class="">
                                    <img class="w-100" src="/panel/cursos/listados/{{ $listado->file }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-6 col-xl-6 p-0">
            <div class="tp-slider__area p-relative">
                <div class="hero-active swiper-container">
                    <div class="swiper-wrapper">
                        <div class=" tp-slider__item p-relative w-100">
                            <div class="tp-slider-right-bg tp-slider__height tp-slider__height_category listado_right_desc d-flex align-items-center ">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-xxl-12 col-xl-12">
                                            <div class="tp-slider__content p-relative z-index-1 text-center">
                                                <p class="tp-descripciones pb-55">
                                                    {{ $listado->descripcion }}
                                                </p>

                                                <a class="tp-btn-list_desc" href="#temario">VER TEMARIO</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row col-md-12 p-0 m-0">
        <div class="col-xxl-12 col-xl-12 p-0">
            <div class="tp-slider__area p-relative">
                <div class="hero-active swiper-container">
                    <div class="swiper-wrapper">
                        <div class=" tp-slider__item p-relative w-100">
                            <div class="tp-slider-right-bg tp-slider__height tp-slider__height_category listado_right_desc d-flex align-items-center " 
                            data-background="/panel/cursos/listados/portadas/{{ $listado->portada }}">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-xxl-12 col-xl-12">
                                            <div class="tp-slider__content p-relative z-index-1 text-center play_content">
                                                <i class="fa-sharp fa-solid fa-play-circle text-white"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="temario_cont" id="temario">
        <div class="container">
            <div class="row col-md-12 p-0 m-0">
                <div class="col-xxl-5 col-xl-5 p-0">
                    <div class="title_cat">
                        <h1>TEMARIO</h1>
                    </div>

                    <div class="tp-faq-area mb-40 w-90 mt-20">
                        <div class="tp-custom-accordion">
                            <div class="accordion" id="accordionExample">
                                @foreach($temarios as $temario)
                                    @if($listado->id == $temario->listado_id)
                                        @if($temario->estatus == 1)
                                            <div class="accordion-items">
                                                <h2 class="accordion-header" id="heading{{ $temario->id }}">
                                                    <button class="accordion-buttons " type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapse{{ $temario->id }}" aria-expanded="true" aria-controls="collapse{{ $temario->id }}">
                                                        {{ $temario->nombre }}
                                                    </button>
                                                </h2>

                                                <div id="collapse{{ $temario->id }}" class="accordion-collapse collapse"
                                                    aria-labelledby="heading{{ $temario->id }}" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        {{ $temario->descripcion }}
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-7 col-xl-7 p-0">
                    <div class="d-flex align-items-center p-relative w-100 meses_cont">
                        <div class="title_cat">
                            <h1>
                                @if($listado->meses == 1)
                                    {{ $listado->meses.' mes' }}
                                @else
                                    {{ $listado->meses.' meses' }}
                                @endif
                            </h1>

                            <h1>
                                @if($listado->sesiones == 1)
                                    {{ $listado->sesiones.' sesión' }}
                                @else
                                    {{ $listado->sesiones.' sesiones' }}
                                @endif
                            </h1>
                        </div>
                    </div>

                    <div class="p-relative w-100">
                        @foreach($precios as $precio)
                            @if($precio->listado_id == $listado->id)
                                @if($precio->estatus == 1)
                                    <div class="horarios_cont">
                                        <div class="modalidad_cont">
                                            <p>
                                                <i class="fa-sharp fa-solid fa-circle"></i>
                                                Modalidad {{ $listado->categoria->nombre }}
                                            </p>
                                        </div>
    
                                        <div class="precios_cont">
                                            @php
                                                $originalDate = $precio->inicio;
                                                $newDate = date("d/m/Y", strtotime($originalDate));
                                            @endphp
    
                                            <div class="inicio_cont">
                                                <p class="pre_ini">Comienza el:</p>
                                                <p class="pre_fin">{{ $newDate }}</p>
                                            </div>
    
                                            <div class="duracion_cont">
                                                <p class="pre_ini">Duración:</p>
                                                <p class="pre_fin">{{ $precio->duracion }}</p>
                                            </div>
    
                                            <div class="horario_cont">
                                                <p class="pre_ini">Horarios:</p>
                                                <p class="pre_fin">{{ $precio->horarios }}</p>
                                            </div>
    
                                            <div class="precio_cont">
                                                <p class="pre_ini">Precio:</p>
                                                <p class="pre_fin">
                                                    <span class="@if($precio->descuento) pre_tac @endif">{{ 'S/ '.number_format($precio->precio, 2, '.', '') }}</span>
                                                    @if($precio->descuento)
                                                        <br><b>{{ 'S/ '.number_format($precio->descuento, 2, '.', '') }}</b>
                                                    @endif
                                                </p>
                                            </div>
    
                                            <div class="elegir_cont">
                                                <form action="{{ route('cart.add', $listado->id) }}" method="POST">
                                                    @csrf
                                                    
                                                    <input type="hidden" name="categoria_id" value="{{ $listado->categoria->id }}" />
                                                    <input type="hidden" name="categoria" value="{{ $listado->categoria->nombre }}" />
                                                    <input type="hidden" name="precio" value="{{ $precio->precio }}" />
                                                    @if($precio->descuento)
                                                        <input type="hidden" name="descuento" value="{{ $precio->descuento }}" />
                                                    @else
                                                        <input type="hidden" name="descuento" value="0" />
                                                    @endif
                                                    <input type="hidden" name="precio_id" value="{{ $precio->id }}" />
                                                    <input type="hidden" name="quantity" value="1" min="1">
                                                    <button type="submit" class="add-to-cart btn btn_elegir btn-dark">Elegir</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endif
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