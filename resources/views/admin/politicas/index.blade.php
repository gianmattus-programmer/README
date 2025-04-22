@extends('layouts.admin')

@section('template_title')
    Políticas de datos
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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    @if ($message = Session::get('success'))
        <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2">
            <div class="d-flex align-items-center">
                <div class="font-30 text-white">
                    <i class="bx bxs-check-circle"></i>
                </div>

                <div class="ms-3">
                    <h6 class="mb-0 text-white font-14">Políticas de datos - {{ $message }}</h6>
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
                    <h6 class="mb-0 text-white font-14">Políticas de datos - {{ $message }}</h6>
                </div>
            </div>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-header bg-black pt-3 pb-3">
            <div class="d-flex align-items-center">
                <div>
                    <h6 class="mb-0 title_page text-white">PÁGINA POLÍTICAS DE DATOS</h6>
                </div>

                <!-- div class="d-flex ms-auto">
                    <form id="identifier" action="{{ route('adminpoliticas.store') }}" class="ms-1" method="POST" enctype="multipart/form-data">
                        @csrf

                        <button type="button" class="btn btn-dark mt-2 mt-lg-0 font-13 btn" data-bs-toggle="modal" data-bs-target="#ModalCreate">
                            <i class="bx bxs-plus-square"></i>CREAR INFORMACIÓN
                        </button>

                        <input type="hidden" value="1" id="estatus" name="estatus" />

                        @include('admin.politicas.create')
                    </form>
                </div -->
            </div>
        </div>

        <div class="card-body">
            @foreach($politicas as $politica)
                <form action="{{ route('adminpoliticas.update', $politica->id) }}" class="ms-1" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
            
                    <div class="row g-3 pt-3 pb-2 col-md-12">
                        <div class="form-group mb-2 mt-2 col-md-12">
                            <textarea class="informacion" id="informacion" name="informacion" cols="30" rows="10" required>{{ $politica->informacion }}</textarea>
                        </div>

                        <input id="estatus" name="estatus" type="hidden" value="{{ $politica->estatus }}" />
                    </div>
                
                    <div class="row g-3 pt-3 pb-2 col-md-12">
                        <div class="form-group mb-2 mt-2 col-md-12">
                            <button type="submit" class="btn btn-success col-md-12 font-14">ACTUALIZAR</button>
                        </div>
                    </div>
                </form>
            @endforeach
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
    </script>
@endsection