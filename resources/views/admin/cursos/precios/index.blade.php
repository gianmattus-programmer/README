@extends('layouts.admin')

@section('template_title')
    Listado de precios
@endsection

@section('estilos')
    <style>
        .nav-tabs {
            border: none;
        }
        .nav-item a {
            width: 100%;
            height: auto;
            background: transparent;
            border: none;
            border-radius: 0;
            background-color: transparent !important;
            padding: 0;
        }
        .nav-primary.nav-tabs .nav-link.active {
            border: none;
        }
        .nav-tabs .nav-link:focus, .nav-tabs .nav-link:hover {
            border-color: transparent !important;
        }
        @media (min-width: 992px) {
            .modalprecio .modal-lg, .modalprecio .modal-xl {
                --bs-modal-width: 1000px;
            }
        }
    </style>
@endsection

@section('content')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    @if ($message = Session::get('success'))
        <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2">
            <div class="d-flex align-items-center">
                <div class="font-30 text-white">
                    <i class="bx bxs-check-circle"></i>
                </div>

                <div class="ms-3">
                    <h6 class="mb-0 text-white font-14">Listado de precios - {{ $message }}</h6>
                </div>
            </div>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($message = Session::get('danger'))
        <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2">
            <div class="d-flex align-items-center">
                <div class="font-30 text-white">
                    <i class="bx bxs-check-circle"></i>
                </div>

                <div class="ms-3">
                    <h6 class="mb-0 text-white font-14">Listado de precios - {{ $message }}</h6>
                </div>
            </div>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-header bg-black pt-3 pb-3">
            <div class="d-flex align-items-center">
                <div>
                    <h6 class="mb-0 title_page text-white">PRECIOS DE {{ $listado->nombre }}</h6>
                </div>

                <div class="d-flex ms-auto">
                    <a href="{{ URL::to('admin/cursoslistados') }}" class="ms-1 btn btn-dark mt-2 mt-lg-0 font-13 btn">
                        <i class="bx bx-log-out-circle"></i> REGRESAR
                    </a>

                    <form action="{{ route('cursosprecios.store') }}" class="ms-1" method="POST" enctype="multipart/form-data">
                        @csrf

                        <button type="button" class="btn btn-dark mt-2 mt-lg-0 font-13 btn" data-bs-toggle="modal" data-bs-target="#ModalCreate">
                            <i class="bx bxs-plus-square"></i>AGREGAR PRECIO
                        </button>

                        <input type="hidden" value="{{ $listado->id }}" id="listado_id" name="listado_id" />
                        <input type="hidden" value="1" id="estatus" name="estatus" />

                        @include('admin.cursos.precios.create')
                    </form>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table id="example2" class="table">
                    <thead class="">
                        <tr>
                            <th>#</th>
                            <th>Inicio</th>
                            <th>Duración</th>
                            <th>Horarios</th>
                            <th>Precio</th>
                            <th>Descuento</th>
                            <th>Registrado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($precios as $precio)
                            @if($precio->listado_id == $listado->id)
                                @if($precio->estatus == "1")
                                    @php
                                        $originalDate = $precio->created_at;
                                        $newDate = date("d/m/Y", strtotime($originalDate));
                                    @endphp

                                    <tr>
                                        <td>{{ '#'.$precio->id }}</td>
                                        <td>{{ $precio->inicio }}</td>
                                        <td>{{ $precio->duracion }}</td>
                                        <td>{{ $precio->horarios }}</td></td>
                                        <td>{{ 'S/ '.$precio->precio }}</td>
                                        <td>{{ 'S/ '.$precio->descuento }}</td>
                                        <td>{{ $newDate }}</td>
                                        
                                        <td>
                                            <div class="d-flex order-actions">
                                                <form action="{{ route('cursosprecios.update', $precio->id) }}" class="ms-1" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
            
                                                    <button type="button" class="btn boton-eliminar ms-1" data-bs-toggle="modal" data-bs-target="#ModalEdit{{ $precio->id }}">
                                                        <i class="bx bxs-edit"></i>
                                                    </button>

                                                    @include('admin.cursos.precios.edit')
                                                </form>

                                                <form action="{{ route('estatus.update', $precio->id) }}" class="ms-1" method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    <button type="button" class="btn boton-eliminar ms-1" data-bs-toggle="modal" data-bs-target="#ModalPreDelete{{ $precio->id }}">
                                                        <i class="bx bxs-trash"></i>
                                                    </button>

                                                    <input type="hidden" value="2" id="estatus" name="estatus" />
                                                    <input type="hidden" value="cursosprecios" id="pagina" name="pagina" />

                                                    @include('admin.cursos.precios.predelete')
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('footer_scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
    <script src="//cdn.datatables.net/plug-ins/1.10.12/sorting/datetime-moment.js"></script>

    <script>
        $(document).ready(function() {
            $.fn.dataTable.moment('DD/MM/YYYY');
            
            var table = $('#example2').DataTable( {
				lengthChange: true,
                order: [6, 'desc'],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                }
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript">
        var i = 0;
        $("#dynamic_precio").click(function () {
            ++i;
            $("#dynamicPrecio").append('<div class="row g-3 pt-3 pb-2 col-md-12"><div class="form-group mb-2 mt-2 col-md-2"><input class="form-control form-control-solid" id="precio" name="precio[]" type="number" /></div><div class="form-group mb-2 mt-2 col-md-2"><input class="form-control form-control-solid" id="descuento" name="descuento[]" type="number" /></div><div class="form-group mb-2 mt-2 col-md-2"><input class="form-control form-control-solid" id="inicio" name="inicio[]" type="date" /></div><div class="form-group mb-2 mt-2 col-md-2"><input class="form-control form-control-solid" id="duracion" name="duracion[]" type="text" /></div><div class="form-group mb-2 mt-2 col-md-3"><input class="form-control form-control-solid" id="horarios" name="horarios[]" type="text" /></div><div class="form-group mb-2 mt-2 col-md-1"><button type="button" class="col-md-12 btn btn-danger remove-input-precio">-</button></div></div>'
                );
        });

        $(document).on('click', '.remove-input-precio', function () {
            $(this).parents('.row').remove();
        });
    </script>
@endsection