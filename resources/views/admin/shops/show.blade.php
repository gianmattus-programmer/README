@extends('layouts.admin')

@section('template_title')
    Detalle de la compra
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

    <div class="row">
        <div class="col-12 col-lg-9">
            <div class="card">
                <div class="card-body">
                    <div id="invoice">
                        <div class="invoice overflow-auto">
                            <div style="min-width: 600px">
                                <main>
                                    <div class="row contacts">
                                        <div class="col invoice-to">
                                            <div class="text-gray-light">DATOS DEL USUARIO:</div>
                                            <h2 class="to">{{ $checkout->user->first_name.' '.$checkout->user->last_name }}</h2>
                                            <div class="address">{{ $checkout->user->direccion }}</div>
                                            <div class="email">{{ $checkout->user->email }}</div>
                                            <div class="email">{{ $checkout->user->documento }}</div>
                                            <div class="email">{{ $checkout->user->celular }}</div>
                                        </div>
                                        
                                        <div class="col invoice-details">
                                            @php
                                                $originalcreated_at = $checkout->created_at;
                                                $created_at = date("d/m/Y", strtotime($originalcreated_at));

                                                $originalupdated_at = $checkout->updated_at;
                                                $updated_at = date("d/m/Y", strtotime($originalupdated_at));
                                            @endphp

                                            <h4 class="invoice-id">CÓDIGO - {{ 'PRA00'.$checkout->id }}</h4>
                                            <div class="date">Registro de compra: {{ $created_at }}</div>
                                            <div class="date">Última modificación: {{ $updated_at }}</div>
                                        </div>
                                    </div>

                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="text-left">PRODUCTO</th>
                                                <th class="text-right">CATEGORIA</th>
                                                <th class="text-right">PRECIO</th>
                                                <th class="text-right">PROMOCIÓN</th>
                                                <th class="text-right">CANTIDAD</th>
                                                <th class="text-right">TOTAL</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($detalles as $detalle)
                                                @if($detalle->checkout_id == $checkout->id)
                                                    <tr>
                                                        <td class="text-left">{{ $detalle->nombre }}</td>
                                                        <td class="text-left">{{ $detalle->categoria }}</td>
                                                        <td class="unit">{{ 's/ '.number_format($detalle->precio, 2, '.', '') }}</td>
                                                        <td class="unit">{{ 's/ '.number_format($detalle->descuento, 2, '.', '') }}</td>
                                                        <td class="qty">{{ $detalle->cantidad }}</td>
                                                        <td class="total">
                                                            @if($detalle->descuento)
                                                                {{ 's/ '.number_format($detalle->descuento * $detalle->cantidad, 2, '.', '') }}
                                                            @else
                                                                {{ 's/ '.number_format($detalle->precio * $detalle->cantidad, 2, '.', '') }}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>

                                        <tfoot>
                                            <tr>
                                                <td colspan="4"></td>
                                                <td>SUBTOTAL</td>
                                                <td>{{ 's/ '.number_format($checkout->subtotal, 2, '.', '') }}</td>
                                            </tr>

                                            <tr>
                                                <td colspan="4"></td>
                                                <td>IGV 18%</td>
                                                <td>{{ 's/ '.number_format($checkout->igv, 2, '.', '') }}</td>
                                            </tr>

                                            <tr>
                                                <td colspan="4"></td>
                                                <td></td>
                                                <td>{{ 's/ '.number_format($checkout->subtotal + $checkout->igv, 2, '.', '') }}</td>
                                            </tr>

                                            <tr>
                                                <td colspan="4"></td>
                                                <td>Descuento</td>
                                                <td>{{ 's/ '.number_format($checkout->descuento, 2, '.', '') }}</td>
                                            </tr>

                                            <tr>
                                                <td colspan="4"></td>
                                                <td>TOTAL PAGADO</td>
                                                <td>{{ 's/ '.number_format(($checkout->subtotal + $checkout->igv) - $checkout->descuento, 2, '.', '') }}</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </main>
                            </div>
                            
                            <div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-3">
            <div class="card radius-10 w-100">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Estado de la compra</h6>
                        </div>

                        <div class="dropdown ms-auto">
                            <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-horizontal-rounded font-22 text-option"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_scripts')
    
@endsection