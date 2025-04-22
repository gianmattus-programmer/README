@extends('layouts.admin')

@section('template_title')
    Listado de productos
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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>

    @if ($message = Session::get('success'))
        <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2">
            <div class="d-flex align-items-center">
                <div class="font-30 text-white">
                    <i class="bx bxs-check-circle"></i>
                </div>

                <div class="ms-3">
                    <h6 class="mb-0 text-white font-14">Productos - {{ $message }}</h6>
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
                    <h6 class="mb-0 text-white font-14">Productos - {{ $message }}</h6>
                </div>
            </div>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-header bg-black pt-3 pb-3">
            <div class="d-flex align-items-center">
                <div>
                    <h6 class="mb-0 title_page text-white">LISTADO DE PRODUCTOS</h6>
                </div>

                <div class="ms-auto">
                    <form action="{{ route('tiendalistados.store') }}" class="ms-1" method="POST" enctype="multipart/form-data">
                        @csrf

                        <button type="button" class="btn btn-dark mt-2 mt-lg-0 font-13 btn" data-bs-toggle="modal" data-bs-target="#ModalCreate">
                            <i class="bx bxs-plus-square"></i>NUEVO CURSO
                        </button>

                        @include('admin.tienda.listados.create')
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
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Categoría</th>
                            <th>Precio</th>
                            <th>Descuento</th>
                            <th>Registrado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($listados as $listado)
                            @if($listado->estatus == "1")
                                @php
                                    $originalDate = $listado->created_at;
                                    $newDate = date("d/m/Y", strtotime($originalDate));
                                @endphp

                                <tr>
                                    <td>{{ '#'.$listado->id }}</td>

                                    <td>
                                        <img src="{{ asset('panel/tienda/listados') }}/{{ $listado->file }}" class="img-responsive" width="40px" alt="">
                                    </td>

                                    <td>{{ $listado->nombre }}</td>
                                    <td>{{ $listado->categoria->nombre }}</td>
                                    <td>{{ 'S/ '.$listado->precio }}</td>
                                    <td>{{ 'S/ '.$listado->descuento }}</td>
                                    <td>{{ $newDate }}</td>
                                    
                                    <td>
                                        <div class="d-flex order-actions">
                                            <form action="{{ route('tiendalistados.update', $listado->id) }}" class="ms-1" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
        
                                                <button type="button" class="btn boton-eliminar ms-1" data-bs-toggle="modal" data-bs-target="#ModalEdit{{ $listado->id }}">
                                                    <i class="bx bxs-edit"></i>
                                                </button>

                                                @include('admin.tienda.listados.edit')
                                            </form>

                                            <form action="{{ route('estatus.update', $listado->id) }}" class="ms-1" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <button type="button" class="btn boton-eliminar ms-1" data-bs-toggle="modal" data-bs-target="#ModalPreDelete{{ $listado->id }}">
                                                    <i class="bx bxs-trash"></i>
                                                </button>

                                                <input type="hidden" value="2" id="estatus" name="estatus" />
                                                <input type="hidden" value="tiendalistados" id="pagina" name="pagina" />

                                                @include('admin.tienda.listados.predelete')
                                            </form>
                                        </div>
                                    </td>
                                </tr>
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
                order: [8, 'desc'],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                }
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
    </script>

    <script>
        $('#informacion').summernote({
            placeholder: 'Ingresar información del módulo...',
            tabsize:2,
            height:300
        });

        $('.informacion').summernote({
            placeholder: 'Ingresar información del módulo...',
            tabsize:2,
            height:300
        });
    </script>
@endsection