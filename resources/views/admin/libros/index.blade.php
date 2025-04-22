@extends('layouts.admin')

@section('template_title')
    Libro de reclamaciones
@endsection

@section('estilos')
    <style>
        
    </style>
@endsection

@section('content')
    <div class="card">
        <div class="card-header bg-black pt-3 pb-3">
            <div class="d-flex align-items-center">
                <div>
                    <h6 class="mb-0 title_page text-white">LIBRO DE RECLAMACIONES</h6>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table id="example2" class="table">
                    <thead class="">
                        <tr>
                            <th>#</th>
                            <th>Nombres</th>
                            <th>Número de documento</th>
                            <th>Correo electrónico</th>
                            <th>Fecha de Reclamo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($libros as $libro)
                            @if($libro->estatus == "1")
                                @php
                                    $originalDate = $libro->reclamo;
                                    $newDate = date("d/m/Y", strtotime($originalDate));
                                @endphp

                                <tr>
                                    <td>{{ '#'.$libro->id }}</td>
                                    <td>{{ $libro->nombre.' '.$libro->ape_pat.' '.$libro->ape_mat }}</td>
                                    <td>{{ $libro->num_doc }}</td>
                                    <td>{{ $libro->email }}</td>
                                    <td>{{ $newDate }}</td>
                                    
                                    <td>
                                        <div class="d-flex order-actions">
                                            <a data-bs-toggle="modal" data-bs-target="#ModalShow{{ $libro->id }}" class="">
                                                <i class="lni lni-eye"></i>
                                            </a>

                                            @include('admin.libros.show')
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
                order: [4, 'desc'],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                }
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
    </script>
@endsection