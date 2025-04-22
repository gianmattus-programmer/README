@extends('layouts.admin')

@section('template_title')
    Asistencias
@endsection

@section('estilos')
    <style>
        
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
                    <h6 class="mb-0 text-white font-14">{{ $message }}</h6>
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
                    <h6 class="mb-0 text-white font-14">{{ $message }}</h6>
                </div>
            </div>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-header bg-black pt-3 pb-3">
            <div class="d-flex align-items-center">
                <div>
                    <h6 class="mb-0 title_page text-white">LISTADO DE ASISTENCIAS</h6>
                </div>

                <div class="ms-auto">
                    <form action="{{ route('adminasistencias.store') }}" class="ms-1" method="POST" enctype="multipart/form-data">
                        @csrf

                        <button type="button" class="btn btn-dark mt-2 mt-lg-0 font-13 btn" data-bs-toggle="modal" data-bs-target="#ModalCreate">
                            <i class="bx bxs-plus-square"></i>NUEVO ASISTENCIA
                        </button>

                        @include('admin.asistencias.create')
                    </form>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                @role('admin')
                    <table id="example2" class="table">
                        <thead class="">
                            <tr>
                                <th>#</th>
                                <th>Profesor</th>
                                <th>Alumno</th>
                                <th>Curso</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Registrado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($asistencias as $asistencia)
                                @if($asistencia->estatus == "1")
                                    @php
                                        $originalDate = $asistencia->created_at;
                                        $newDate = date("d/m/Y", strtotime($originalDate));
                                    @endphp

                                    <tr>
                                        <td>{{ '#'.$asistencia->id }}</td>
                                        
                                        <td>
                                            @foreach($users as $user)
                                                @if($user->id == $asistencia->profesor_id)
                                                    {{ $user->first_name . ' ' . $user->last_name }}
                                                @endif
                                            @endforeach
                                        </td>

                                        <td>
                                            @foreach($users as $user)
                                                @if($user->id == $asistencia->user_id)
                                                    {{ $user->first_name . ' ' . $user->last_name }}
                                                @endif
                                            @endforeach
                                        </td>

                                        <td>{{ $asistencia->listado->nombre }}</td>
                                        <td>{{ $asistencia->fecha }}</td>
                                        <td>{{ $asistencia->hora }}</td>
                                        <td>{{ $newDate }}</td>
                                        
                                        <td>
                                            <div class="d-flex order-actions">
                                                <form action="{{ route('adminasistencias.update', $asistencia->id) }}" class="ms-1" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
            
                                                    <button type="button" class="btn boton-eliminar ms-1" data-bs-toggle="modal" data-bs-target="#ModalEdit{{ $asistencia->id }}">
                                                        <i class="bx bxs-edit"></i>
                                                    </button>

                                                    @include('admin.asistencias.edit')
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <table id="example3" class="table">
                        <thead class="">
                            <tr>
                                <th>#</th>
                                <th>Alumno</th>
                                <th>Curso</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Registrado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($asistencias as $asistencia)
                                @if($asistencia->estatus == "1")
                                    @php
                                        $originalDate = $asistencia->created_at;
                                        $newDate = date("d/m/Y", strtotime($originalDate));
                                    @endphp

                                    <tr>
                                        <td>{{ '#'.$asistencia->id }}</td>
                                        
                                        <td>
                                            @foreach($users as $user)
                                                @if($user->id == $asistencia->user_id)
                                                    {{ $user->first_name . ' ' . $user->last_name }}
                                                @endif
                                            @endforeach
                                        </td>

                                        <td>{{ $asistencia->listado->nombre }}</td>
                                        <td>{{ $asistencia->fecha }}</td>
                                        <td>{{ $asistencia->hora }}</td>
                                        <td>{{ $newDate }}</td>
                                        
                                        <td>
                                            <div class="d-flex order-actions">
                                                <form action="{{ route('adminasistencias.update', $asistencia->id) }}" class="ms-1" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
            
                                                    <button type="button" class="btn boton-eliminar ms-1" data-bs-toggle="modal" data-bs-target="#ModalEdit{{ $asistencia->id }}">
                                                        <i class="bx bxs-edit"></i>
                                                    </button>

                                                    @include('admin.asistencias.edit')
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                @endrole
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
@endsection