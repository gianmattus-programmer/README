@extends('layouts.app')

@section('template_title')
    Libro de reclamaciones
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
        .alert-success {
            
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
                        <h1>LIBRO DE RECLAMACIONES</h1>

                        <p>Conforme a lo establecido en el código de la Protección y Defensa del Consumidor, ponemos a disposición de nuestros usuarios el libro de reclamaciones.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="data_encuentranos margeleft">
        <div class="container">
            <div class="row">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success border-0 bg-success alert-dismissible fade show p-3 pl-2 pr-2 col-lg-12 col-md-12 col-xs-12">
                        <div class="d-flex align-items-center">
                            <div class="text-white pl-3">
                                <i class="fa-sharp fa-solid fa-check-circle"></i>
                            </div>

                            <div class="ms-2">
                                <p class="mb-0 text-white font-14">{{ $message }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="col-lg-12 col-md-12 col-xs-12">
                    <form action="{{ route('adminlibros.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12">
                                <label class="col-sm-12 col-form-label p-0 mb-2">
                                    <b>1. Identificación del Consumidor Reclamante</b>
                                </label>
                            </div>
                            
                            <div class="col-xxl-4 col-xl-4 col-lg-4">
                                <div class="contact-page__comment-input">
                                    <label for="nombre" class="col-sm-12 col-form-label p-0">Nombre</label>
                                    <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ old('nombre') }}" required autofocus>

                                    @if ($errors->has('nombre'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('nombre') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-xxl-4 col-xl-4 col-lg-4">
                                <div class="contact-page__comment-input">
                                    <label for="ape_pat" class="col-sm-12 col-form-label p-0">Apellido Paterno</label>
                                    <input id="ape_pat" type="text" class="form-control{{ $errors->has('ape_pat') ? ' is-invalid' : '' }}" name="ape_pat" value="{{ old('ape_pat') }}" required autofocus>

                                    @if ($errors->has('ape_pat'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('ape_pat') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-xxl-4 col-xl-4 col-lg-4">
                                <div class="contact-page__comment-input">
                                    <label for="ape_mat" class="col-sm-12 col-form-label p-0">Apellido Materno</label>
                                    <input id="ape_mat" type="text" class="form-control{{ $errors->has('ape_mat') ? ' is-invalid' : '' }}" name="ape_mat" value="{{ old('ape_mat') }}" required autofocus>

                                    @if ($errors->has('ape_mat'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('ape_mat') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-xxl-3 col-xl-3 col-lg-3">
                                <div class="contact-page__comment-input">
                                    <label for="reclamo" class="col-sm-12 col-form-label p-0">Fecha de Reclamo</label>
                                    <input id="reclamo" type="date" class="form-control{{ $errors->has('reclamo') ? ' is-invalid' : '' }}" name="reclamo" value="{{ old('reclamo') }}" required autofocus>

                                    @if ($errors->has('reclamo'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('reclamo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-xxl-3 col-xl-3 col-lg-3">
                                <div class="contact-page__comment-input">
                                    <label for="domicilio" class="col-sm-12 col-form-label p-0">Domicilio (Dirección completa)</label>
                                    <input id="domicilio" type="text" class="form-control{{ $errors->has('domicilio') ? ' is-invalid' : '' }}" name="domicilio" value="{{ old('domicilio') }}" required autofocus>

                                    @if ($errors->has('domicilio'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('domicilio') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-xxl-3 col-xl-3 col-lg-3">
                                <div class="contact-page__comment-input">
                                    <label for="tip_doc" class="col-sm-12 col-form-label p-0">Tipo de Documento</label>
                                    <select id="tip_doc" type="select" class="form-control{{ $errors->has('tip_doc') ? ' is-invalid' : '' }}" name="tip_doc" required autofocus>
                                        <option value="">SELECCIONAR</option>
                                        <option value="DNI">DNI</option>
                                        <option value="PASAPORTE">PASAPORTE</option>
                                        <option value="RUC">RUC</option>
                                    </select>

                                    @if ($errors->has('tip_doc'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('tip_doc') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-xxl-3 col-xl-3 col-lg-3">
                                <div class="contact-page__comment-input">
                                    <label for="num_doc" class="col-sm-12 col-form-label p-0">Número de Documento</label>
                                    <input id="num_doc" type="number" class="form-control{{ $errors->has('num_doc') ? ' is-invalid' : '' }}" name="num_doc" value="{{ old('num_doc') }}" required autofocus>

                                    @if ($errors->has('num_doc'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('num_doc') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-xxl-12 col-xl-12 col-lg-12">
                                <div class="contact-page__comment-input">
                                    <label for="email" class="col-sm-12 col-form-label p-0">Correo electrónico</label>
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-xs-12">
                                <label class="col-sm-12 col-form-label p-0 mb-2">
                                    <b>2. Identificación del Bien Contratado</b>
                                </label>
                            </div>

                            <div class="col-xxl-4 col-xl-4 col-lg-4">
                                <div class="contact-page__comment-input">
                                    <label for="bien" class="col-sm-12 col-form-label p-0">Bien Contratado</label>
                                    <input id="bien" type="text" class="form-control{{ $errors->has('bien') ? ' is-invalid' : '' }}" name="bien" value="{{ old('bien') }}" required autofocus>

                                    @if ($errors->has('bien'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('bien') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-xxl-4 col-xl-4 col-lg-4">
                                <div class="contact-page__comment-input">
                                    <label for="tip_mon" class="col-sm-12 col-form-label p-0">Selecciona la moneda</label>
                                    <select id="tip_mon" type="select" class="form-control{{ $errors->has('tip_mon') ? ' is-invalid' : '' }}" name="tip_mon" required autofocus>
                                        <option value="">SELECCIONAR</option>
                                        <option value="SOLES">SOLES</option>
                                        <option value="DOLARES">DOLARES</option>
                                        <option value="EUROS">EUROS</option>
                                    </select>

                                    @if ($errors->has('tip_mon'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('tip_mon') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-xxl-4 col-xl-4 col-lg-4">
                                <div class="contact-page__comment-input">
                                    <label for="monto" class="col-sm-12 col-form-label p-0">Monto del bien contratado</label>
                                    <input id="monto" type="number" class="form-control{{ $errors->has('monto') ? ' is-invalid' : '' }}" name="monto" value="{{ old('monto') }}" required autofocus>

                                    @if ($errors->has('monto'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('monto') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-xxl-12 col-xl-12 col-lg-12">
                                <div class="contact-page__comment-input">
                                    <label for="descripcion" class="col-sm-12 col-form-label p-0">Descripción del bien contratado</label>
                                    <input id="descripcion" type="text" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" name="descripcion" value="{{ old('descripcion') }}" required autofocus>

                                    @if ($errors->has('descripcion'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('descripcion') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-xs-12">
                                <label class="col-sm-12 col-form-label p-0 mb-2">
                                    <b>3. Detalle de Reclamación y Pedido del Consumidor</b>
                                </label>
                            </div>

                            <div class="col-xxl-4 col-xl-4 col-lg-4">
                                <div class="contact-page__comment-input">
                                    <label for="motivo" class="col-sm-12 col-form-label p-0">Seleccionar Motivo</label>
                                    <select id="motivo" type="select" class="form-control{{ $errors->has('motivo') ? ' is-invalid' : '' }}" name="motivo" required autofocus>
                                        <option value="">SELECCIONAR</option>
                                        <option value="RECLAMO">RECLAMO</option>
                                        <option value="QUEJA">QUEJA</option>
                                    </select>

                                    @if ($errors->has('motivo'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('motivo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-xxl-4 col-xl-4 col-lg-4">
                                <div class="contact-page__comment-input">
                                    <label for="detalles" class="col-sm-12 col-form-label p-0">Detalles</label>
                                    <input id="detalles" type="text" class="form-control{{ $errors->has('detalles') ? ' is-invalid' : '' }}" name="detalles" value="{{ old('detalles') }}" required autofocus>

                                    @if ($errors->has('detalles'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('detalles') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-xxl-4 col-xl-4 col-lg-4">
                                <div class="contact-page__comment-input">
                                    <label for="pedido" class="col-sm-12 col-form-label p-0">Pedido</label>
                                    <input id="pedido" type="text" class="form-control{{ $errors->has('pedido') ? ' is-invalid' : '' }}" name="pedido" value="{{ old('pedido') }}" required autofocus>

                                    @if ($errors->has('pedido'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('pedido') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <input type="hidden" id="estatus" name="estatus" value="1">

                            <div class="col-xxl-12 col-xl-12 col-lg-12">
                                <div class="contact-page__comment-input">
                                    <button type="submit" class="btn btn-dark text-center pt-2 pb-2 col-md-12 mb-3">Enviar Solicitud</button>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-xs-12">
                                <label class="col-sm-12 col-form-label p-0 mb-2">
                                    RECLAMO: Disconformidad relacionada con los productos o servicios.<br>
                                    QUEJA : Disconformidad no relacionada a los productos o servicios; malestar o descontento respecto a la atención al público.<br>
                                    *La formulación del reclamo no impide acudir a otras vías de solución de controversias ni es requisito previo para interponer una denuncia ante el INDECOPI.<br>
                                    *El proveedor deberá dar respuesta al reclamo en un plazo no mayor a treinta (30) días calendario, pudiendo ampliar el plazo hasta por treinta (30) días más, previa comunicación al consumidor.
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('partials.footer')
@endsection

@section('footer_scripts')
    
@endsection