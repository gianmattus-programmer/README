@extends('layouts.app')

@section('template_title')
    Mi Cuenta
@endsection

@section('estilos')
    <style>
        .tp-section__title {
            font-size: 25px;
            font-weight: 500;
            text-transform: uppercase;
        }
        .contact-page__comment-btn .btn-dark:hover {
            background-color: #fff !important;
            color: #1a1e21;
            border: 1px solid #1a1e21;
        }
        .thm-btn:hover::before {
            content: none;
        }
    </style>
@endsection

@section('content')
    <?php
        use App\Models\CursoCategoria;
        use App\Models\CursoListado;
        
        use App\Models\TiendaCategoria;
        use App\Models\TiendaListado;

        $listados = CursoListado::all();
        $categorias = CursoCategoria::all();
        
        $tlistados = TiendaListado::all();
        $tcategorias = TiendaCategoria::all();
    ?>

    @include('partials.blackheader')

    <div class="contact-page-area pt-170 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="contact-page-title mr-70">
                        <div class="about-section-title z-index  pb-10">
                            <h2 class="tp-section__title mb-30">
                                Acceder
                            </h2>
                        </div>
                    </div>

                    <div class="contact-page__comment-form">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row">
                                <div class="col-xxl-12 col-xl-12 col-lg-12">
                                    <div class="contact-page__comment-input">
                                        <label for="email" class="col-sm-12 col-form-label p-0">Correo electrónico*</label>
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-xxl-12 col-xl-12 col-lg-12">
                                    <div class="contact-page__comment-input">
                                        <label for="password" class="col-sm-12 col-form-label p-0">Ingresar contraseña*</label>
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-xxl-12">
                                    <div class="contact-page__comment-btn">
                                        <button type="submit" class="thm-btn btn-dark">Ingresar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="col-xl-6">
                    <div class="contact-page-title mr-70">
                        <div class="about-section-title z-index  pb-10">
                            <h2 class="tp-section__title mb-30">
                                Registrarse
                            </h2>
                        </div>
                    </div>

                    <div class="contact-page__comment-form">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row">
                                <div class="col-xxl-12 col-xl-12 col-lg-12">
                                    <div class="contact-page__comment-input">
                                        <label for="name" class="col-sm-12 col-form-label p-0">Nombre de usuario*</label>
                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-xxl-12 col-xl-12 col-lg-12">
                                    <div class="contact-page__comment-input">
                                        <label for="email" class="col-sm-12 col-form-label p-0">Correo electrónico*</label>
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-xxl-12 col-xl-12 col-lg-12">
                                    <div class="contact-page__comment-input">
                                        <label for="password" class="col-sm-12 col-form-label p-0">Ingresar contraseña*</label>
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-xxl-12 col-xl-12 col-lg-12">
                                    <div class="contact-page__comment-input">
                                        <label for="password-confirm" class="col-sm-12 col-form-label p-0">Confirmar contraseña*</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>

                                <div class="col-xxl-12">
                                    <div class="contact-page__comment-btn">
                                        <button type="submit" class="thm-btn btn-dark">Registrarme</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
   </div>

    @include('partials.footer')
@endsection

@section('footer_scripts')
    
@endsection