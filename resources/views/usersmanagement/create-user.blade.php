@extends('layouts.admin')

@section('template_title')
    Crear Cliente
@endsection

@section('estilos')
    
@endsection

@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Administrador</div>

        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">
                        <i class="bx bx-home-alt"></i></a>
                    </li>

                    <li class="breadcrumb-item active" aria-current="page">Crear cliente</li>
                </ol>
            </nav>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2">
            <div class="d-flex align-items-center">
                <div class="font-35 text-white">
                    <i class="bx bxs-check-circle"></i>
                </div>

                <div class="ms-3">
                    <h6 class="mb-0 text-white">Administrador - Usuario</h6>
                    <div class="text-white">{{ $message }}</div>
                </div>
            </div>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($message = Session::get('danger'))
        <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2">
            <div class="d-flex align-items-center">
                <div class="font-35 text-white">
                    <i class="bx bxs-check-circle"></i>
                </div>

                <div class="ms-3">
                    <h6 class="mb-0 text-white">Administrador - Usuario</h6>
                    <div class="text-white">{{ $message }}</div>
                </div>
            </div>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="d-lg-flex align-items-center mb-4 gap-3">
                <div class="position-relative">
                    <h5>Crear cliente</h5>
                </div>
                
                <div class="ms-auto">
                    <a href="{{ url('users') }}" class="btn btn-primary radius-30 mt-2 mt-lg-0 font-13 btn">
                        <i class="bx bxs-plus-square"></i>Regresar
                    </a>
                </div>
            </div>

            <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="card-body">
                    <div class="bs-stepper-content">
                        <div class="row g-3 pt-3 pb-2">
                            <div class="form-group mb-2 mt-2 col-md-4">
                                <label class="mb-2">Nombres:</label>
                                <input class="form-control form-control-solid" id="first_name" name="first_name" type="text" required />
                            </div>

                            <div class="form-group mb-2 mt-2 col-md-4">
                                <label class="mb-2">Apellidos:</label>
                                <input class="form-control form-control-solid" id="last_name" name="last_name" type="text" required />
                            </div>

                            <div class="form-group mb-2 mt-2 col-md-4">
                                <label class="mb-2">Correo electrónico:</label>
                                <input class="form-control form-control-solid" id="email" name="email" type="email" required />
                            </div>

                            <div class="form-group mb-2 mt-2 col-md-4">
                                <label class="mb-2">Contraseña:</label>
                                <input class="form-control form-control-solid" id="password" name="password" type="password" required />
                            </div>

                            <div class="form-group mb-2 mt-2 col-md-4">
                                <label class="mb-2">Confirmar contraseña:</label>
                                <input class="form-control form-control-solid" id="password_confirmation" name="password_confirmation" type="password" required />
                            </div>

                            <div class="form-group mb-2 mt-2 col-md-4">
                                <label class="mb-2">Estado:</label>
                                <select class="form-control form-control-solid" id="estado" name="estado" type="select" required>
                                    <option value="">Seleccionar</option>
                                    <option value="Activo">Activo</option>
                                    <option value="Inactivo">Inactivo</option>
                                </select>
                            </div>

                            <div class="form-group mb-2 mt-2 col-md-4">
                                <label class="mb-2">:</label>
                                <button class="btn btn-success px-4 col-md-12" type="submit">
                                    Crear <i class='bx bx-check ms-2'></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('footer_scripts')
    
@endsection