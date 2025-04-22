@extends('layouts.admin')

@section('template_title')
    Profesores
@endsection

@section('estilos')
    
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
                    <h6 class="mb-0 text-white font-14">Profesores - {{ $message }}</h6>
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
                    <h6 class="mb-0 text-white font-14">Profesores - {{ $message }}</h6>
                </div>
            </div>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-header bg-black">
            <div class="d-flex align-items-center">
                <div>
                    <h5 class="mb-0 title_page text-white">Todos los profesores</h5>
                </div>

                <div class="ms-auto">
                    <form action="{{ route('adminprofesores.store') }}" class="ms-1" method="POST">
                        @csrf

                        <button type="button" class="btn btn-dark mt-2 mt-lg-0 font-13 btn" data-bs-toggle="modal" data-bs-target="#ModalCreate">
                            <i class="bx bxs-plus-square"></i>CREAR PROFESOR
                        </button>

                        @include('admin.profesores.create')
                    </form>
                </div>
            </div>
        </div>
    
        <div class="card-body">
            <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Correo</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Cursos</th>
                            <th>Registrado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($rolus as $rolu)
                            @if($rolu->role_id == 3)
                                @foreach($users as $user)
                                    @if($rolu->user_id == $user->id)
                                        @php
                                            $originalDate = $user->created_at;
                                            $newDate = date("d/m/Y", strtotime($originalDate));
                                        @endphp

                                        <tr>
                                            <td>#00{{ $user->id }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->first_name }}</td>
                                            <td>{{ $user->last_name }}</td>
                                            <td>{{ $user->cursos_count.' cursos' }}</td>
                                            <td>{{ $newDate }}</td>
                                            
                                            <td>
                                                <div class="d-flex order-actions">
                                                    <a href="{{ URL::to('admin/profesores/' . $user->id) }}" class="">
                                                        <i class='lni lni-eye'></i>
                                                    </a>

                                                    <form action="{{ route('adminprofesores.update', $user->id) }}" class="ms-1" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                
                                                        <button type="button" class="btn boton-eliminar ms-1" data-bs-toggle="modal" data-bs-target="#ModalEdit{{ $user->id }}">
                                                            <i class="bx bxs-edit"></i>
                                                        </button>

                                                        @include('admin.profesores.edit')
                                                    </form>                                               
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
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
@endsection
