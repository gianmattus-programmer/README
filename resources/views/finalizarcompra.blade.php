@extends('layouts.app')

@section('template_title')
    Finalizar compra
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
        #pag_yapea {
            display: none;
        }
        .modalyape label {
            text-transform: uppercase;
            font-weight: 600;
            color: #000;
            font-size: 18px;
        }
        .modalyape p {
            font-size: 14px;
            font-weight: 400;
            color: #000;
            line-height: 22px;
        }
        .solo_pago {
            display: none;
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
                        <h1>Finalizar compra</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mis_cursos margeleft">
        <div class="container">
            <form action="{{ route('checkout.store') }}" class="form_che" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-lg-7 col-md-7 col-xs-7">
                        <div class="form_cont">
                            <div class="row">
                                <div class="col-xxl-6 col-xl-6 col-lg-6">
                                    <div class="contact-page__comment-input">
                                        <label for="first_name" class="col-sm-12 col-form-label p-0">Nombres*</label>
                                        <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required autofocus>

                                        @if ($errors->has('first_name'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-xxl-6 col-xl-6 col-lg-6">
                                    <div class="contact-page__comment-input">
                                        <label for="last_name" class="col-sm-12 col-form-label p-0">Apellidos*</label>
                                        <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required autofocus>

                                        @if ($errors->has('last_name'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('last_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-xxl-12 col-xl-12 col-lg-12">
                                    <div class="contact-page__comment-input">
                                        <label for="email" class="col-sm-12 col-form-label p-0">Correo electrónico*</label>
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-xxl-6 col-xl-6 col-lg-6">
                                    <div class="contact-page__comment-input">
                                        <label for="dni" class="col-sm-12 col-form-label p-0">DNI*</label>
                                        <input id="dni" type="number" class="form-control{{ $errors->has('dni') ? ' is-invalid' : '' }}" name="dni" value="{{ old('dni') }}" required autofocus>

                                        @if ($errors->has('dni'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('dni') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-xxl-6 col-xl-6 col-lg-6">
                                    <div class="contact-page__comment-input">
                                        <label for="pais" class="col-sm-12 col-form-label p-0">País*</label>
                                        <input id="pais" type="text" class="form-control{{ $errors->has('pais') ? ' is-invalid' : '' }}" name="pais" value="{{ old('pais') }}" required autofocus>

                                        @if ($errors->has('pais'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('pais') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-xxl-6 col-xl-6 col-lg-6">
                                    <div class="contact-page__comment-input">
                                        <label for="ciudad" class="col-sm-12 col-form-label p-0">Ciudad*</label>
                                        <input id="ciudad" type="text" class="form-control{{ $errors->has('ciudad') ? ' is-invalid' : '' }}" name="ciudad" value="{{ old('ciudad') }}" required autofocus>

                                        @if ($errors->has('ciudad'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('ciudad') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-xxl-6 col-xl-6 col-lg-6">
                                    <div class="contact-page__comment-input">
                                        <label for="distrito" class="col-sm-12 col-form-label p-0">Distrito*</label>
                                        <input id="distrito" type="text" class="form-control{{ $errors->has('distrito') ? ' is-invalid' : '' }}" name="distrito" value="{{ old('distrito') }}" required autofocus>

                                        @if ($errors->has('distrito'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('distrito') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 col-md-5 col-xs-5">
                        <div class="prices_cart">
                            <div class="cont_pt">
                                <h5>Seleccionar método de pago</h5>

                                <div class="radio">
                                    <label>
                                        <input type="radio" name="metodo" value="Transferencia interbancaria" onclick="mostrarSeccion('transferencia')" />
                                        Transferencia interbancaria
                                    </label>
                                </div>

                                @role('admin')
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="metodo" value="Paga con Mercado Pago" onclick="mostrarSeccion('mercadopago')" />
                                            Tarjeta de crédito y débito
                                        </label>
                                    </div>
                                @endrole

                                <div class="radio">
                                    <label>
                                        <input checked type="radio" name="metodo" value="Paga con Yape" onclick="mostrarSeccion('yape')" />
                                        Paga con YAPE/PLIN
                                    </label>
                                </div>

                                <div class="row">
                                    <div class="col-xxl-10 col-xl-10 col-lg-10">
                                        <div class="contact-page__comment-input">
                                            <input id="cod_desc" type="text" class="form-control" name="cod_desc" placeholder="¿Tienes código de descuento?" />
                                        </div>
                                    </div>
    
                                    <div class="col-xxl-2 col-xl-2 col-lg-2">
                                        <div class="contact-page__comment-input">
                                            <button type="button" class="btn btn-primary" onclick="aplicarCupon()">Aplicar</button>
                                        </div>
                                    </div>
                                </div>

                                @foreach($carts as $cart)
                                    <input type="hidden" id="product_id" name="product_id" value="{{ $cart->product->id }}" />
                                    <input type="hidden" id="producto" name="producto" value="{{ $cart->product->nombre }}" />

                                    <input type="hidden" id="categoria_id" name="categoria_id" value="{{ $cart->categoria_id }}" />

                                    <input type="hidden" id="cursocategorias_id" name="cursocategorias_id[]" value="{{ $cart->categoria_id }}" />
                                    <input type="hidden" id="listado_id" name="listado_id[]" value="{{ $cart->product->id }}" />
                                    <input type="hidden" id="precio_id" name="precio_id[]" value="{{ $cart->precio_id }}" />
                                    <input type="hidden" id="nombre" name="nombre[]" value="{{ $cart->product->nombre }}" />
                                    <input type="hidden" id="categoria" name="categoria[]" value="{{ $cart->categoria }}" />
                                    <input type="hidden" id="precio" name="precio[]" value="{{ $cart->precio }}" />
                                    <input type="hidden" id="desc" name="desc[]" value="{{ $cart->descuento }}" />
                                    <input type="hidden" id="cantidad" name="cantidad[]" value="{{ $cart->quantity }}" />
                                    <input type="hidden" id="inicio" name="inicio[]" value="0" />
                                    <input type="hidden" id="duracion" name="duracion[]" value="0" />
                                    <input type="hidden" id="horarios" name="horarios[]" value="0" />
                                @endforeach

                                <input type="hidden" name="igv_data" id="igv_data" value="18">

                                <p class="pre_cont">
                                    <span>SUBTOTAL</span> 
                                    <span id="suttotal">S/ <?php echo number_format($total, 2, '.', ''); ?></span>
                                </p>

                                <p class="pre_cont solo_pago">
                                    <span>DESCUENTO</span> 
                                    <span id="tot_desc">- S/ 0.00</span>
                                </p>

                                <p class="pre_cont solo_pago">
                                    <span></span> 
                                    <span id="desc_pors">S/ 0.00</span>
                                </p>

                                <p class="pre_cont">
                                    <span>IGV 18% </span>
                                    <span id="igb">S/ 0.00</span>
                                </p>
                                
                                <p class="pre_cont">
                                    <span>TOTAL </span>
                                    <span id="tot_pago">S/ 0.00</span>
                                </p>
                                
                                <input type="hidden" name="subtotal" id="subtotal" value="{{ $total }}" />
                                <input type="hidden" name="igv" id="igv" value="" />
                                <input type="hidden" name="descuento" id="descuento" value="" />
                                <input type="hidden" name="total" id="total" value="" />
                                <input type="hidden" id="estatus" name="estatus" value="1">
                                <input type="hidden" name="mer_pago" id="mer_pago" value="" />

                                <div id="transferencia" class="pag_ava">
                                    <button type="submit" id="btn_pagar" class="btn_pago_cart btn btn-dark text-center pt-2 col-md-12">
                                        REALIZAR PAGO CON TRANSFERENCIA
                                    </button>
                                </div>

                                <div id="mercadopago" class="pag_ava" style="display: none;">
                                    <button type="button" id="checkout-button">Iniciar Pago</button>
                                </div>

                                <div id="yape" class="pag_ava" style="display: none;">
                                    <button type="button" id="btn_pagar" class="btn_pago_cart btn btn-dark text-center pt-2 col-md-12" data-bs-toggle="modal" data-bs-target="#ModalCreate">
                                        REALIZAR PAGO CON YAPE
                                    </button>
                                </div>

                                <div class="modal fade modalyape" id="ModalCreate" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body bg-white p-4">
                                                <div class="row g-3 py-0 my-0 col-md-12">
                                                    <div class="form-group mb-2 mt-2 col-md-6">
                                                        <img src="{{ asset('public/imagenes/qr_yapeplin_pralemy.jpeg') }}" class="img-fluid" alt="...">
                                                    </div>

                                                    <div class="form-group mb-2 mt-2 col-md-6 text-center">
                                                        <label class="mb-2"><b>Monto:</b> <span id="mont_yape">S/ 0.00</span></label><br>
                                                        <label class="mb-2"><b>Procedimiento:</b></label>

                                                        <p>
                                                            Haz click en realizar pedido para que se muestre el qr del Yape <br><br>
                                                            Agrega nuestro Número: <a href="tel:947204985">947 204 985</a><br>
                                                            Titular: Antonella Dusek Granados<br><br>
                                                            Luego de realizar el abono confirmar el pago enviando la constancia a nuestro whatsapp. Muchas Gracias!
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer bg-light">
                                                <div class="row g-3 pt-0 pb-2 col-md-12">
                                                    <div class="form-group mb-2 mt-2 col-md-6">
                                                        <button type="button" class="btn btn-dark col-md-12 font-14" data-bs-dismiss="modal">CANCELAR</button>
                                                    </div>

                                                    <div class="form-group mb-2 mt-2 col-md-6">
                                                        <button type="submit" class="btn btn-success col-md-12 font-14">PAGAR</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @include('partials.footer')
@endsection

@section('footer_scripts')
    <script src="https://sdk.mercadopago.com/js/v2"></script>
me
    <script>
        function mostrarSeccion(seccion) {
            // Ocultar todas las secciones
            document.getElementById('transferencia').style.display = 'none';
            document.getElementById('mercadopago').style.display = 'none';
            document.getElementById('yape').style.display = 'none';

            // Mostrar la sección seleccionada
            document.getElementById(seccion).style.display = 'block';
        }
    </script>

    <script>
        function aplicarCupon() {
            const codigo = document.getElementById('cod_desc').value;
            const subtotalElement = document.getElementById('suttotal');
            const descuentoElement = document.getElementById('tot_desc');
            const descPorsElement = document.getElementById('desc_pors');
            const igbElement = document.getElementById('igb');
            const totalElement = document.getElementById('tot_pago');
            const totalInputElement = document.getElementById('total');
            const merpago = document.getElementById('mer_pago');
            const igvInputElement = document.getElementById('igv');
            const descuentoInputElement = document.getElementById('descuento'); // Input de descuento
            const montYapeElement = document.getElementById('mont_yape');
            const soloPagoElements = document.querySelectorAll('.solo_pago');

            let subtotal = parseFloat(subtotalElement.textContent.replace('S/ ', ''));

            if (!codigo) {
                soloPagoElements.forEach(el => el.style.display = 'none');

                const igv = subtotal * (parseFloat(document.getElementById('igv_data').value) / 100);
                igbElement.textContent = `S/ ${igv.toFixed(2)}`;
                igvInputElement.value = igv.toFixed(2);

                const totalConIgv = subtotal + igv;
                totalElement.textContent = `S/ ${totalConIgv.toFixed(2)}`;
                totalInputElement.value = totalConIgv.toFixed(2);
                merpago.value = totalConIgv.toFixed(2);
                montYapeElement.textContent = `S/ ${totalConIgv.toFixed(2)}`;
                descuentoInputElement.value = "0.00"; // Restablecemos el descuento a cero

            } else {
                soloPagoElements.forEach(el => el.style.display = 'block');
                soloPagoElements.forEach(el => el.style.display = 'inline-flex');

                fetch(`{{ url('verificar-cupon')}}?codigo=${codigo}`, { method: 'GET' })
                    .then(response => response.json())
                    .then(data => {
                        if (data.existe) {
                            const descuento = subtotal * (data.porcentaje / 100);
                            const totalConDescuento = subtotal - descuento;

                            descuentoElement.textContent = `- S/ ${descuento.toFixed(2)}`;
                            descuentoInputElement.value = descuento.toFixed(2); // Actualizamos el input de descuento
                            descPorsElement.textContent = `S/ ${totalConDescuento.toFixed(2)}`;

                            const igv = totalConDescuento * (parseFloat(document.getElementById('igv_data').value) / 100);
                            igbElement.textContent = `S/ ${igv.toFixed(2)}`;
                            igvInputElement.value = igv.toFixed(2);

                            const totalFinal = totalConDescuento + igv;
                            totalElement.textContent = `S/ ${totalFinal.toFixed(2)}`;
                            totalInputElement.value = totalFinal.toFixed(2);
                            merpago.value = totalFinal.toFixed(2);
                            montYapeElement.textContent = `S/ ${totalFinal.toFixed(2)}`;

                        } else {
                            alert('Código de descuento inválido o expirado');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Hubo un error al aplicar el cupón. Inténtalo de nuevo.');
                    });
            }
        }

        // Aplicar IGV por defecto en el subtotal cuando se carga la página
        document.addEventListener('DOMContentLoaded', aplicarCupon);
    </script>
    
    <script>
        document.getElementById('checkout-button').addEventListener('click', function (event) {
            event.preventDefault();

            const formData = new FormData(document.querySelector('.form_che'));

            fetch("{{ route('crear-preferencia') }}", {
                method: "POST",
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const mp = new MercadoPago("{{ env('MERCADO_PAGO_CLIENT_ID') }}", {
                        locale: 'es-PE'
                    });

                    // Inicializa el checkout
                    mp.checkout({
                        preference: {
                            id: data.preferenceId
                        },
                        autoOpen: true, // Abrir el checkout automáticamente
                        render: {
                            container: '#checkout-button',
                            label: 'Pagar con Mercado Pago'
                        }
                    });

                    // Captura el evento de éxito del pago
                    mp.on("payment", function(response) {
                        if (response.status === "approved") {
                            // Envía el formulario al controlador
                            document.querySelector('.form_che').submit();
                        } else {
                            console.log("Respuesta de pago:", response);
                            alert('Pago no aprobado. Intenta con otro método.');
                        }
                    });
                } else {
                    alert('Error al crear la preferencia.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    </script>
@endsection
