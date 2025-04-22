@extends('layouts.admin')

@section('template_title')
    Listado de Temarios
@endsection

@section('estilos')
    <style>
        @media (min-width: 992px) {
            .modaltemario .modal-lg, .modaltemario .modal-xl {
                --bs-modal-width: 1200px;
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
                    <h6 class="mb-0 text-white font-14">Listado de temarios - {{ $message }}</h6>
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
                    <h6 class="mb-0 text-white font-14">Listado de temarios - {{ $message }}</h6>
                </div>
            </div>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-header bg-black pt-3 pb-3">
            <div class="d-flex align-items-center">
                <div>
                    <h6 class="mb-0 title_page text-white">TEMARIOS DE {{ $listado->nombre }}</h6>
                </div>

                <div class="d-flex ms-auto">
                    <a href="{{ URL::to('admin/cursoslistados') }}" class="ms-1 btn btn-dark mt-2 mt-lg-0 font-13 btn">
                        <i class="bx bx-log-out-circle"></i> REGRESAR
                    </a>

                    <form action="{{ route('cursostemarios.store') }}" class="ms-1" method="POST" enctype="multipart/form-data">
                        @csrf

                        <button type="button" class="btn btn-dark mt-2 mt-lg-0 font-13 btn" data-bs-toggle="modal" data-bs-target="#ModalCreate">
                            <i class="bx bxs-plus-square"></i>NUEVO TEMARIO
                        </button>

                        <input type="hidden" value="{{ $listado->id }}" id="listado_id" name="listado_id" />
                        <input type="hidden" value="1" id="estatus" name="estatus" />

                        @include('admin.cursos.temarios.create')
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
                            <th width="10%">Imagen</th>
                            <th width="20%">Nombre</th>
                            <th width="70%">Descripción</th>
                            <th width="10%">Módulos</th>
                            <th width="10%">Registrado</th>
                            <th width="10%">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($temarios as $temario)
                            @if($temario->listado_id == $listado->id)
                                @if($temario->estatus == "1")
                                    @php
                                        $originalDate = $listado->created_at;
                                        $newDate = date("d/m/Y", strtotime($originalDate));
                                    @endphp

                                    <tr>
                                        <td>{{ '#'.$temario->id }}</td>

                                        <td>
                                            <img src="https://pralemyfashionschool.com/panel/cursos/temarios/{{ $temario->file }}" class="img-responsive" width="40px" alt="">
                                        </td>

                                        <td>{{ $temario->nombre }}</td>
                                        <td>{{ $temario->descripcion }}</td>
                                        <td>{{ $temario->modulos_count.' Módulos' }}</td>
                                        <td>{{ $newDate }}</td>
                                        
                                        <td>
                                            <div class="d-flex order-actions">
                                                <a data-bs-toggle="modal" data-bs-target="#ModalShow{{ $temario->id }}" class="">
                                                    <i class="lni lni-eye"></i>
                                                </a>

                                                @include('admin.cursos.temarios.modalshow')

                                                <a href="{{ URL::to('admin/cursostemarios/' . $temario->id) }}" class="ms-1">
                                                    <i class="lni lni-circle-plus"></i>
                                                </a>

                                                <form action="{{ route('cursostemarios.update', $temario->id) }}" class="ms-1" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
            
                                                    <button type="button" class="btn boton-eliminar ms-1" data-bs-toggle="modal" data-bs-target="#ModalEdit{{ $temario->id }}">
                                                        <i class="bx bxs-edit"></i>
                                                    </button>

                                                    @include('admin.cursos.temarios.edit')
                                                </form>

                                                <form action="{{ route('estatus.update', $temario->id) }}" class="ms-1" method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    <button type="button" class="btn boton-eliminar ms-1" data-bs-toggle="modal" data-bs-target="#ModalPreDelete{{ $temario->id }}">
                                                        <i class="bx bxs-trash"></i>
                                                    </button>

                                                    <input type="hidden" value="2" id="estatus" name="estatus" />
                                                    <input type="hidden" value="cursostemarios" id="pagina" name="pagina" />

                                                    @include('admin.cursos.temarios.predelete')
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
                order: [5, 'desc'],
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
        $("#dynamic_temario").click(function () {
            ++i;
            $("#dynamicTemario").append('<div class="row g-3 pt-3 pb-2 col-md-12"><div class="form-group mb-2 mt-2 col-md-3"><input class="form-control form-control-solid" id="nombre" name="nombre[]" type="text" /></div><div class="form-group mb-2 mt-2 col-md-4"><input class="form-control form-control-solid" id="file" name="file[]" type="file" multiple="multiple" /></div><div class="form-group mb-2 mt-2 col-md-4"><input class="form-control form-control-solid" id="descripcion" name="descripcion[]" type="text" /></div><div class="form-group mb-2 mt-2 col-md-1"><button type="button" class="col-md-12 btn btn-danger remove-input-temario">-</button></div></div>'
                );
        });
        $(document).on('click', '.remove-input-temario', function () {
            $(this).parents('.row').remove();
        });
    </script>
@endsection