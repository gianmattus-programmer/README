@extends('layouts.app')

@section('template_title')
    {{ $temario->nombre }}
@endsection

@section('estilos')
    <style>
        .tp-faq-area {
            width: 100%;
        }
        .tp-custom-accordion .accordion-body {
            background-color: #fff;
            line-height: 20px;
            border-radius: 0;
            color: #7A7A7A;
            font-family: "Helvetica", Sans-serif;
            font-size: 14px;
            font-weight: 400;
            padding: 0 20px;
            position: relative;
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
            height: 100%;
        }
        .accordion_informacion {
            border: none !important;
        }
        #informacionAdicional.activaracordion {
            display: block !important;
        }
        .accordion-button:not(.collapsed) {
            color: #000;
            background-color: transparent;
            box-shadow: none;
        }
        .info_acor, .info_exam {
            display: none;
        }
        .accordion-button:focus {
            border: none;
            border-radius: 0 !important;
            box-shadow: none !important;
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
                        <h1>{{ $temario->nombre }}</h1>
                    </div>
                </div>

                <div class="tp-faq-area mb-40 w-90 mt-20">
                    <div class="tp-custom-accordion">
                        <div class="accordion accordionExample" id="accordionExample">
                            <div class="row">
                                <div class="col-md-4">
                                    @foreach($modulos as $modulo)
                                        @if($modulo->temario_id == $temario->id && $modulo->estatus == 1)
                                            <div class="accordion-items">
                                                <h2 class="accordion-header" id="heading{{ $modulo->id }}">
                                                    <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse"
                                                            data-bs-target="#collapse{{ $modulo->id }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="collapse{{ $modulo->id }}">
                                                        {{ $modulo->nombre }}
                                                    </button>
                                                </h2>

                                                <div id="collapse{{ $modulo->id }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                                    aria-labelledby="heading{{ $modulo->id }}" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        {{ $modulo->descripcion }}

                                                        <div class="info_acor">
                                                            {!! $modulo->informacion !!}
                                                        </div>
                                                        
                                                        <div class="info_exam">
                                                            @if($modulo->examen == "Si")
                                                                @if($temario->examen == 1)
                                                                    <form action="{{ route('examen.store') }}" class="ms-1" method="POST" enctype="multipart/form-data">
                                                                        @csrf

                                                                        <input type="hidden" id="temario_id" name="temario_id" value="{{ $temario->id }}" />
                                                                        <input type="hidden" id="estatus" name="estatus" value="1" />
                                                                        
                                                                        <div class="row g-3 p-0 pt-2 col-md-12">
                                                                            <div class="form-group mb-2 mt-2 col-md-6">
                                                                                <input type="file" class="form-control form-control-solid" required id="file" name="file[]" multiple="multiple">
                                                                            </div>

                                                                            <div class="form-group mb-2 mt-2 col-md-6">
                                                                                <button type="submit" class="btn btn-primary col-md-12 font-14">SUBIR DOCUMENTOS</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>

                                <div class="col-md-8">
                                    <div id="informacionAdicional" style="display: none;">
                                        <div class="content">
                                            <p id="info-content"></p>
                                            <p id="exam-content"></p>
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

    @include('partials.payfooter')
@endsection

@section('footer_scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            // Mostrar la información del primer accordion por defecto
            var primerInfo = $('.accordion-collapse.show').find('.info_acor').html();
            var examenInfo = $('.accordion-collapse.show').find('.info_exam').html();

            if (primerInfo) {
                $('#informacionAdicional').show();
                $('#info-content').html(primerInfo);
            }

            if (examenInfo) {
                $('#informacionAdicional').show();
                $('#exam-content').html(examenInfo);
            }

            // Manejar el clic en cada botón del accordion
            $('.accordion-button').on('click', function() {
                var moduloId = $(this).data('bs-target');
                var contenidoAdicional = $(moduloId).find('.info_acor').html();
                var examenessAdicional = $(moduloId).find('.info_exam').html();

                if (contenidoAdicional) {
                    $('#informacionAdicional').show();
                    $('#info-content').html(contenidoAdicional);
                } else {
                    $('#informacionAdicional').hide();
                }

                if (examenessAdicional) {
                    $('#informacionAdicional').show();
                    $('#exam-content').html(examenessAdicional);
                }
            });

            // Opcional: ocultar la sección de información si se cierra el accordion
            $('.accordion-collapse').on('hidden.bs.collapse', function () {
                $('#informacionAdicional').hide();
                $('#informacionAdicional').addClass('activaracordion');
            });
        });
    </script>
@endsection