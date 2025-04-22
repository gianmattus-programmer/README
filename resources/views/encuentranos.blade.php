@extends('layouts.app')

@section('template_title')
    Encuéntranos
@endsection

@section('estilos')
    <style>
        .banner_encuentranos {

        }
        .banner_encuentranos img {
            width: 100%;
        }
        .data_encuentranos h3 {
            color: #000000;
            font-family: "Helvetica", Sans-serif;
            font-weight: 500;
        }
        .banner_popus h2 {
            padding: 5px 5px 5px 5px;
            background-color: #000000;
            display: inline-block;
            color: #FFFFFF;
            font-family: "Helvetica", Sans-serif;
            font-weight: 600;
        }
        .img_popup {
            height: 100%;
        }
        .img_popup img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .section_popup {
            margin-bottom: 20px;
        }
        .section_popup .col-md-3 {
            padding-right: 0;
        }
        .section_popup .col-md-9 {
            padding: 0;
        }
        .content_popup {
            background: #F6F5F8;
            padding: 20px;
            height: 100%;
            position: relative;
        }
        .content_popup h4 {
            margin-bottom: 13px;
            color: #000000;
            font-family: "Helvetica", Sans-serif;
            font-size: 20px;
            font-weight: 500;
        }
        .content_popup p {
            font-family: "Helvetica", Sans-serif;
            font-weight: 400;
            line-height: 18px;
        }
        .content_popup .btn-dark {
            background: #000;
            color: #fff;
            padding: 5px 15px;
            font-size: 13px;
            position: absolute;
            right: 20px;
            bottom: 20px;
        }
        @media (max-width: 1024px) {
            .banner_popus {
                margin-bottom: 20px;
            }
            .content_popup {
                padding: 10px;
            }
        }
        @media (max-width: 767px) {
            .banner_popus {
                margin-bottom: 20px;
                margin-top: 30px;
            }
            .section_popup .col-md-3, .section_popup .col-md-9 {
                padding-right: 15px;
                padding-left: 15px;
            }
            .content_popup {
                padding: 20px;
            }
            .content_popup .btn-dark {
                right: 30px;
            }
            .banner_popus h2 {
                font-size: 20px;
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
                    @foreach($encuentranos as $encuentrano)
                        <div class="title_cat">
                            <h1>{{ $encuentrano->titulo }}</h1>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    
    <div class="data_encuentranos margeleft">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-7 col-xs-7">
                    @foreach($encuentranos as $encuentrano)
                        <h3>{{ $encuentrano->sede }}</h3>
                        
                        <div class="banner_encuentranos">
                            <img src="../panel/encuentranos/{{ $encuentrano->file }}" class="img-responsive" alt="">
                        </div>
                    @endforeach
                </div>

                <div class="col-lg-5 col-md-5 col-xs-5">
                    <div class="banner_popus">
                        <h2>POP UP´S</h2>
                    </div>

                    @foreach($popups as $popup)
                        @if($popup->estatus == "1")
                            @php
                                $originalDate = $popup->created_at;
                                $newDate = date("d/m/Y", strtotime($originalDate));
                            @endphp

                            <div class="row section_popup">
                                <div class="col-lg-3 col-md-3 col-xs-3">
                                    <div class="img_popup">
                                        <img src="../panel/popups/{{ $popup->file }}" class="img-responsive" alt="">
                                    </div>
                                </div>

                                <div class="col-lg-9 col-md-9 col-xs-9">
                                    <div class="content_popup">
                                        <h4>{{ $popup->nombre }}</h4>

                                        <p>{{ $popup->descripcion }}<br>{{ $newDate }}</p>

                                        <a href="{{ $popup->enlace }}" class="btn btn-dark" target="_BLANK">INSCRIBIRSE</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @include('partials.footer')
@endsection

@section('footer_scripts')
    
@endsection