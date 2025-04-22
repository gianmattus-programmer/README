@extends('layouts.admin')

@section('template_title')
    Compras
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
                    <h6 class="mb-0 text-white font-14">Categorías - {{ $message }}</h6>
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
                    <h6 class="mb-0 text-white font-14">Categorías - {{ $message }}</h6>
                </div>
            </div>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-header bg-black pt-3 pb-3">
            <div class="d-flex align-items-center">
                <div>
                    <h6 class="mb-0 title_page text-white">LISTADO DE COMPRAS</h6>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table id="example2" class="table">
                    <thead class="">
                        <tr>
                            <th>#</th>
                            <th>Usuario</th>
                            <th>Método de pago</th>
                            <th>Total</th>
                            <th>Estado</th>
                            <th>Registrado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($checkouts as $checkout)
                            @php
                                $originalDate = $checkout->created_at;
                                $newDate = date("d/m/Y", strtotime($originalDate));
                            @endphp

                            <tr>
                                <td>{{ 'PRA00'.$checkout->id }}</td>
                                <td>{{ $checkout->user->first_name.' '.$checkout->user->last_name }}</td>
                                <td>{{ $checkout->metodo }}</td>
                                <td>{{ 's/ '.number_format($checkout->total, 2, '.', '') }}</td>

                                <td>
                                    @if($checkout->estatus == 1)
                                        <div class="badge rounded-pill text-info bg-light-info p-2 text-uppercase px-3">
                                            <i class="bx bxs-circle align-middle me-1"></i
                                            >Procesando
                                        </div>
                                    @elseif($checkout->estatus == 2)
                                        <div class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3">
                                            <i class="bx bxs-circle align-middle me-1"></i
                                            >Pagado
                                        </div>
                                    @elseif($checkout->estatus == 3)
                                        <div class="badge rounded-pill text-primary bg-light-primary p-2 text-uppercase px-3">
                                            <i class="bx bxs-circle align-middle me-1"></i
                                            >Completado
                                        </div>
                                    @else
                                        <div class="badge rounded-pill text-danger bg-light-danger p-2 text-uppercase px-3">
                                            <i class="bx bxs-circle align-middle me-1"></i
                                            >Cancelado
                                        </div>
                                    @endif
                                </td>

                                <td>{{ $newDate }}</td>
                                
                                <td>
                                    <div class="d-flex order-actions">
                                        <a href="{{ URL::to('admin/shop/' . $checkout->id) }}" class="">
                                            <i class='lni lni-eye'></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
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