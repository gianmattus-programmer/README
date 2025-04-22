@extends('layouts.app')

@section('template_title')
    WE ARE
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
    </style>
@endsection

@section('content')
    @include('partials.blackheader')

    <div class="section_cursos">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="title_cat">
                        <h1>WE ARE</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="data_encuentranos margeleft">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    @foreach($nosotros as $nosotro)
                        <div>
                            {!! $nosotro->informacion !!}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @include('partials.footer')
@endsection

@section('footer_scripts')
    
@endsection