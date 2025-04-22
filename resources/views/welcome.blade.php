@extends('layouts.app')

@section('template_title')
    Inicio
@endsection

@section('estilos')
    <style>
        .tp-slider__item {
            background-color: #000;
        }
        .tp-slider-title {
            color: #fff;
            text-align: center;
            font-family: "Playfair Display", Sans-serif;
            font-size: 90px;
            font-weight: 500;
        }
        .tp-slider-subtitle {
            color: #fff;
            text-align: center;
            font-family: "Playfair Display", Sans-serif;
            font-size: 30px;
            font-weight: 300;
        }
        .section_home {
            padding: 120px 70px 50px;
        }
        .section_home h1 {
            color: #000000;
            font-family: "Helvetica", Sans-serif;
            font-weight: 500;
            text-transform: uppercase;
        }
        .section_home h2 {
            color: #000000;
            font-family: "Helvetica", Sans-serif;
            font-weight: 500;
        }
        .section_home p {
            color: #000000;
            font-family: "Helvetica", Sans-serif;
            font-weight: 400;
            line-height: 1.5;
        }
        .btn-escuchar, .btn-escuchar:hover, .btn-escuchar:focus {
            background-color: #000000;
            font-family: "Roboto", Sans-serif;
            font-weight: 400;
            border-radius: 30px 30px 30px 30px;
            padding: 10px 30px;
            color: #fff;
            margin: 20px 0;
            font-size: 15px;
        }
        .section_prefooter {
            padding: 50px 70px;
        }
        .copy_foot p {
            color: #000000;
            font-family: "Helvetica", Sans-serif;
            font-size: 14px;
            font-weight: 400;
        }
        @media (max-width: 1199px) {
            .swiper-wrapper .tp-slider__height {
                height: 500px;
            }
            .swiper-wrapper .tp-category-title {
                font-size: 30px;
            }
            .swiper-wrapper .tp-btn-category, .swiper-wrapper .tp-btn-category:hover, .swiper-wrapper .tp-btn-category:focus {
                padding: 12px 50px 12px;
            }
            .swiper-wrapper .tp-slider__height.tp-slider__height_category {
                height: 500px;
            }
        }
        @media (max-width: 767px) {
            .swiper-wrapper .tp-slider-title {
                font-size: 35px;
            }
            .tp-slider-subtitle {
                font-size: 20px;
            }
            .swiper-wrapper .tp-category-title {
                font-size: 17px;
                margin-bottom: 15px;
            }
            .swiper-wrapper .tp-slider__height.tp-slider__height_category {
                height: 250px;
            }
            .mobile_home .col-xl-6 {
                width: 50%;
            }
            .section_home {
                padding: 50px 0;
            }
        }
    </style>
@endsection

@section('content')
    @include('partials.header')

    <div class="tp-slider__area p-relative">
        <div class="hero-active swiper-container">
            <div class="swiper-wrapper">
                <div class=" tp-slider__item p-relative w-100">
                    <div class="tp-slider-right-bg tp-slider__height d-flex align-items-center "
                        data-background="" style="">
                        <div class="container">
                            <div class="row">
                                <div class="col-xxl-12 col-xl-12">
                                    <div class="tp-slider__content p-relative z-index-1">
                                        <h2 class="tp-slider-title mb-35">
                                            PRALEMY
                                        </h2>

                                        <h5 class="tp-slider-subtitle mb-10">WE ARE FASHION</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mobile_home m-0">
        <div class="col-xxl-6 col-xl-6 p-0">
            <div class="tp-slider__area p-relative">
                <div class="hero-active swiper-container">
                    <div class="swiper-wrapper">
                        <div class=" tp-slider__item p-relative w-100">
                            <div class="tp-slider-right-bg tp-slider__height tp-slider__height_category d-flex align-items-center "
                                data-background="https://pralemyfashionschool.com/panel/cursos/categorias/20240906015336.jpg" style="">
                                <div class="container">
                                    <div class="category-overlay"></div>

                                    <div class="row">
                                        <div class="col-xxl-12 col-xl-12">
                                            <div class="tp-slider__content p-relative z-index-1 text-center">
                                                <h4 class="tp-category-title mb-35">
                                                    ASINCRÓNICO
                                                </h4>

                                                <a class="tp-btn-category" href="{{ url('cursos/1/'.str_replace(' ', '-', strtolower('Asincrónico'))) }}">Elegir</a>
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

        <div class="col-xxl-6 col-xl-6 p-0">
            <div class="tp-slider__area p-relative">
                <div class="hero-active swiper-container">
                    <div class="swiper-wrapper">
                        <div class=" tp-slider__item p-relative w-100">
                            <div class="tp-slider-right-bg tp-slider__height tp-slider__height_category d-flex align-items-center "
                                data-background="https://pralemyfashionschool.com/panel/cursos/categorias/20241029210943.png" style="">
                                <div class="container">
                                    <div class="category-overlay"></div>

                                    <div class="row">
                                        <div class="col-xxl-12 col-xl-12">
                                            <div class="tp-slider__content p-relative z-index-1 text-center">
                                                <h4 class="tp-category-title mb-35">
                                                    ONLINE EN VIVO
                                                </h4>

                                                <a class="tp-btn-category" href="{{ url('cursos/2/'.str_replace(' ', '-', strtolower('Online en vivo'))) }}">Elegir</a>
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

    <div class="row mobile_home m-0">
        <div class="col-xxl-6 col-xl-6 p-0">
            <div class="tp-slider__area p-relative">
                <div class="hero-active swiper-container">
                    <div class="swiper-wrapper">
                        <div class=" tp-slider__item p-relative w-100">
                            <div class="tp-slider-right-bg tp-slider__height tp-slider__height_category d-flex align-items-center "
                                data-background="https://pralemyfashionschool.com/panel/cursos/categorias/20240906024344.jpg" style="">
                                <div class="container">
                                    <div class="category-overlay"></div>

                                    <div class="row">
                                        <div class="col-xxl-12 col-xl-12">
                                            <div class="tp-slider__content p-relative z-index-1 text-center">
                                                <h4 class="tp-category-title mb-35">
                                                    SEMIPRESENCIAL
                                                </h4>

                                                <a class="tp-btn-category" href="{{ url('cursos/3/'.str_replace(' ', '-', strtolower('Semipresencial'))) }}">Elegir</a>
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

        <div class="col-xxl-6 col-xl-6 p-0">
            <div class="tp-slider__area p-relative">
                <div class="hero-active swiper-container">
                    <div class="swiper-wrapper">
                        <div class=" tp-slider__item p-relative w-100">
                            <div class="tp-slider-right-bg tp-slider__height tp-slider__height_category d-flex align-items-center "
                                data-background="https://pralemyfashionschool.com/panel/cursos/categorias/20241029210844.png" style="">
                                <div class="container">
                                    <div class="category-overlay"></div>

                                    <div class="row">
                                        <div class="col-xxl-12 col-xl-12">
                                            <div class="tp-slider__content p-relative z-index-1 text-center">
                                                <h4 class="tp-category-title mb-35">
                                                    PRESENCIAL
                                                </h4>

                                                <a class="tp-btn-category" href="{{ url('cursos/4/'.str_replace(' ', '-', strtolower('Presencial'))) }}">Elegir</a>
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

    <div class="row mobile_home m-0">
        <div class="col-xxl-12 col-xl-12 p-0">
            <div class="tp-slider__area p-relative">
                <div class="hero-active swiper-container">
                    <div class="swiper-wrapper">
                        <div class=" tp-slider__item p-relative w-100">
                            <div class="tp-slider-right-bg tp-slider__height tp-slider__height_category d-flex align-items-center "
                                data-background="https://pralemyfashionschool.com/panel/cursos/categorias/20240906020655.jpg" style="">
                                <div class="container">
                                    <div class="category-overlay"></div>

                                    <div class="row">
                                        <div class="col-xxl-12 col-xl-12">
                                            <div class="tp-slider__content p-relative z-index-1 text-center">
                                                <h4 class="tp-category-title mb-35">
                                                    WORKSHOP
                                                </h4>

                                                <a class="tp-btn-category" href="{{ url('cursos/5/'.str_replace(' ', '-', strtolower('Workshop'))) }}">Elegir</a>
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

    <div class="section_home">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5">
                    <div class="title_cat">
                        <h1>THE FASHIONABLE</h1>

                        <h2>PODCAST.</h2>

                        <a class="btn btn-escuchar">ESCUCHAR</a>

                        <p>Tu mejor fuente gratuita de conocimiento sobre el mundo de la moda. Gossip y más. XOXO.</p>
                    </div>
                </div>

                <div class="col-lg-7 col-md-7"></div>
            </div>
        </div>
    </div>

    @include('partials.footer')
@endsection

@section('footer_scripts')
    <script>
        
    </script>
@endsection