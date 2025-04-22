@extends('layouts.app')

@section('template_title')
    Gracias
@endsection

@section('estilos')
    <style>
        .banner_encuentranos {

        }
        .banner_encuentranos img {
            width: 100%;
        }
        .data_encuentranos h3 {
            color: #000000;
            font-family: "Helvetica", Sans-serif;
            font-weight: 500;
        }
        .mis_cursos {
            
        }
        .product_carrito {
            width: 37%;
        }
        .table th, .table td {
            padding: 5px;
            vertical-align: middle;
        }
        .cont_pt {
            padding: 50px 30px;
            border: 2px solid #d5d8dc;
        }
        .pag_ava {
            margin-top: 20px;
        }
        .pre_cont {
            color: #000;
            font-size: 14px;
            margin-bottom: 5px;
            display: flex;
            width: 100%;
            font-weight: 500;
        }
        .pre_cont span {
            width: 50%;
        }
        .form_cont {
            padding: 50px 30px;
            border: 2px solid #d5d8dc;
        }
    </style>
@endsection

@section('content')
    @include('partials.blackheader')

    <div class="section_cursos">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="title_cat">
                        <h1>DETALLES DE TU COMPRA</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="data_encuentranos margeleft">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-xs-8">
                    <div class="row rowleft">
                        <table class="table align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th width="40%">Nombre</th>
                                    <th width="10%">Categoria</th>
                                    <th width="10%">Precio normal</th>
                                    <th width="10%">Promoción</th>
                                    <th width="10%">Cantidad</th>
                                    <th width="10%">Total</th>
                                </tr>
                            </thead>
                        
                            <tbody>
                                @foreach($detalles as $detalle)
                                    @if($detalle->checkout_id == $_GET['checkoutId'])
                                        <tr>
                                            <td>{{ $detalle->nombre }}</td>
                                            <td>{{ $detalle->categoria }}</td>
                                            <td>{{ 's/ '.number_format($detalle->precio, 2, '.', '') }}</td>
                                            <td>{{ 's/ '.number_format($detalle->descuento, 2, '.', '') }}</td>
                                            <td>{{ $detalle->cantidad }}</td>
                                            <td>
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
                        </table>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-xs-4">
                    <div class="prices_cart">
                        <div class="cont_pt">
                            @foreach($checkouts as $checkout)
                                @if($checkout->id == $_GET['checkoutId'])
                                    <p class="pre_cont">
                                        <span>SUBTOTAL</span> 
                                        <span>S/ <?php echo number_format($checkout->subtotal, 2, '.', ''); ?></span>
                                    </p>

                                    <?php $totp = $checkout->subtotal + $checkout->igv; ?>

                                    <p class="pre_cont">
                                        <span>IGV 18% </span>
                                        <span>S/ <?php echo number_format($checkout->igv, 2, '.', ''); ?></span>
                                    </p>

                                    <p class="pre_cont">
                                        <span></span>
                                        <span>S/ <?php echo number_format($checkout->igv + $checkout->subtotal, 2, '.', ''); ?></span>
                                    </p>

                                    <p class="pre_cont">
                                        <span>Descuento </span>
                                        <span>S/ <?php echo number_format($checkout->descuento, 2, '.', ''); ?></span>
                                    </p>

                                    <p class="pre_cont">
                                        <span>TOTAL </span>
                                        <span>S/ <?php echo number_format(($checkout->igv + $checkout->subtotal) - $checkout->descuento, 2, '.', ''); ?></span>
                                    </p>

                                    <p class="pre_cont">
                                        <span>MEDIO DE PAGO </span>
                                        <span>YAPE</span>
                                    </p>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.footer')
@endsection

@section('footer_scripts')
    
@endsection