@extends('layouts.admin')

@section('template_title')
    Listado de Módulos
@endsection

@section('estilos')
    <style>
        @media (min-width: 992px) {
            .modalmodulo .modal-lg, .modalmodulo .modal-xl {
                --bs-modal-width: 1300px;
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
                    <h6 class="mb-0 text-white font-14">Listado de módulos - {{ $message }}</h6>
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
                    <h6 class="mb-0 text-white font-14">Listado de módulos - {{ $message }}</h6>
                </div>
            </div>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-header bg-black pt-3 pb-3">
            <div class="d-flex align-items-center">
                <div>
                    <h6 class="mb-0 title_page text-white">MÓDULOS DE {{ $temario->nombre }}</h6>
                </div>

                <div class="d-flex ms-auto">
                    <a href="{{ URL::to('admin/cursoslistados/' . $temario->listado_id) }}" class="ms-1 btn btn-dark mt-2 mt-lg-0 font-13 btn">
                        <i class="bx bx-log-out-circle"></i> REGRESAR
                    </a>

                    <form id="identifier" action="{{ route('cursosmodulos.store') }}" class="ms-1" method="POST" enctype="multipart/form-data">
                        @csrf

                        <button type="button" class="btn btn-dark mt-2 mt-lg-0 font-13 btn" data-bs-toggle="modal" data-bs-target="#ModalCreate">
                            <i class="bx bxs-plus-square"></i>NUEVO MÓDULO
                        </button>

                        <input type="hidden" value="{{ $temario->id }}" id="temario_id" name="temario_id" />
                        <input type="hidden" value="1" id="estatus" name="estatus" />

                        @include('admin.cursos.modulos.create')
                    </form>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table id="example2" class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Registrado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody id="sortable-table">
                        @foreach($modulos as $modulo)
                            @if($modulo->temario_id == $temario->id && $modulo->estatus == "1")
                                @php
                                    $newDate = date("d/m/Y", strtotime($modulo->created_at));
                                @endphp

                                <tr data-id="{{ $modulo->id }}">
                                    <td>{{ '#'.$modulo->id }}</td>
                                    <td>{{ $modulo->nombre }}</td>
                                    <td>{{ Str::limit($modulo->descripcion, 80, '...') }}</td>
                                    <td>{{ $newDate }}</td>
                                        
                                    <td>
                                        <div class="d-flex order-actions">
                                            <form action="{{ route('cursosmodulos.update', $modulo->id) }}" class="ms-1" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
        
                                                <button type="button" class="btn boton-eliminar ms-1" data-bs-toggle="modal" data-bs-target="#ModalEdit{{ $modulo->id }}">
                                                    <i class="bx bxs-edit"></i>
                                                </button>

                                                @include('admin.cursos.modulos.edit')
                                            </form>

                                            <form action="{{ route('estatus.update', $modulo->id) }}" class="ms-1" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <button type="button" class="btn boton-eliminar ms-1" data-bs-toggle="modal" data-bs-target="#ModalPreDelete{{ $modulo->id }}">
                                                    <i class="bx bxs-trash"></i>
                                                </button>

                                                <input type="hidden" value="2" id="estatus" name="estatus" />
                                                <input type="hidden" value="cursosmodulos" id="pagina" name="pagina" />

                                                @include('admin.cursos.modulos.predelete')
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
				lengthChange: false,
                order: [3, 'desc'],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                }
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
    </script>

    <script>
        $(document).ready(function() {
            $('.informacion').summernote({
                placeholder: 'Ingresar información...',
                tabsize: 2,
                height: 500,
                toolbar: [
                    // Opciones de estilo
                    ['style', ['style']],
                    // Opciones de formato de texto
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']], // Agrega la opción de tamaño de fuente
                    // Color de texto y fondo
                    ['color', ['color']],
                    // Lista de viñetas y numerada
                    ['para', ['ul', 'ol', 'paragraph']],
                    // Opciones de inserción
                    ['insert', ['link', 'picture', 'video']],
                    // Otras opciones
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                fontSizes: ['8', '9', '10', '11', '12', '14', '16', '18', '20', '22', '24', '28', '32', '36', '48', '64', '82', '100']
            });
        });

        $(document).ready(function() {
            $('#informacion').summernote({
                placeholder: 'Ingresar información...',
                tabsize: 2,
                height: 500,
                toolbar: [
                    // Opciones de estilo
                    ['style', ['style']],
                    // Opciones de formato de texto
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']], // Agrega la opción de tamaño de fuente
                    // Color de texto y fondo
                    ['color', ['color']],
                    // Lista de viñetas y numerada
                    ['para', ['ul', 'ol', 'paragraph']],
                    // Opciones de inserción
                    ['insert', ['link', 'picture', 'video']],
                    // Otras opciones
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                fontSizes: ['8', '9', '10', '11', '12', '14', '16', '18', '20', '22', '24', '28', '32', '36', '48', '64', '82', '100']
            });
        });
    </script>

    <script>
        var el = document.getElementById('sortable-table');
        var sortable = Sortable.create(el, {
            animation: 150,
            onEnd: function (evt) {
                // Aquí puedes enviar el nuevo orden al servidor
                var ids = [];
                var rows = el.querySelectorAll('tr');
                rows.forEach(function(row) {
                    ids.push(row.getAttribute('data-id'));
                });

                // Hacer una solicitud AJAX para guardar el nuevo orden
                fetch('{{ route("cursosmodulos.updateOrder") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Agregar token CSRF
                    },
                    body: JSON.stringify({ ordermod: ids }) // Enviar el nuevo orden
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log('Orden guardado correctamente');
                    }
                })
                .catch(error => console.error('Error:', error));
            }
        });
    </script>
@endsection