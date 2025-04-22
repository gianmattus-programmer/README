@extends('layouts.app')

@section('template_title')
    Carrito de compras
@endsection

@section('estilos')
    <style>
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
                        <h1>Carrito de compras</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mis_cursos margeleft">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-xs-8">
                    <div class="row rowleft">
                        <table class="table align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th width="15%">Imagen</th>
                                    <th width="45%">Nombre</th>
                                    <th>Categoria</th>
                                    <th>Precio</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php $suma = 0; ?>

                                @foreach($listados as $listado)
                                    @foreach($cantidades as $cantidad)
                                        @if($cantidad->shopping_cart_id == $shopping_cart_id)
                                            @if($cantidad->listado_id == $listado->id)
                                                <tr>
                                                    <td>
                                                        <img src="/panel/cursos/listados/{{ $listado->file }}" class="product_carrito" alt="product img">
                                                    </td>

                                                    <td>{{ $listado->nombre }}</td>
                                                    <td>{{ $listado->categoria->nombre }}</td>
                                                    <td>
                                                        @foreach($precios as $precio)
                                                            @if($cantidad->precio_id == $precio->id)
                                                                {{ 's/ '.number_format($precio->precio, 2, '.', '') }}

                                                                <?php $suma += $cantidad->cantidad * $precio->precio; ?>
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                </tr>
                                            @endif
                                        @endif
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-xs-4">
                    <div class="prices_cart">
                        <div class="cont_pt">
                            <p class="pre_cont">
                                <span>SUBTOTAL</span> 
                                <span>S/ <?php echo number_format($suma, 2, '.', ''); ?></span>
                            </p>

                            <?php
                                $igv = $suma * (18 / 100);
                                $totp = $suma + $igv;
                            ?>

                            <p class="pre_cont">
                                <span>IGV 18% </span>
                                <span>S/ <?php echo number_format($igv, 2, '.', ''); ?></span>
                            </p>
                            
                            <p class="pre_cont">
                                <span>TOTAL </span>
                                <span>S/ <?php echo number_format($totp, 2, '.', ''); ?></span>
                            </p>

                            <div id="pag_ava" class="pag_ava">
                                <a href="{{ url('/finalizarcompra') }}" class="btn btn-dark col-md-12">
                                    PROCEDER A PAGAR
                                </a>
                            </div>
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
