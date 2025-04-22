<div class="modal fade" id="ModalShow{{ $libro->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-black p-4">
                <h5 class="modal-title text-white">DETALLES DE LA SOLICITUD</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body bg-white p-4">
                <div class="row g-3 pt-3 pb-2 col-md-12">
                    <div class="form-group mb-0 mt-2 col-md-12">
                        <label class="">
                            <b>Nombres y apellidos:</b>
                            {{ $libro->nombre.' '.$libro->ape_pat.' '.$libro->ape_mat }}
                        </label>
                    </div>

                    <div class="form-group mb-0 mt-2 col-md-12">
                        <label class="">
                            <b>Correo:</b> {{ $libro->email }}
                        </label>
                    </div>

                    <div class="form-group mb-0 mt-2 col-md-12">
                        <label class="">
                            <b>Domicilio:</b> {{ $libro->domicilio }}
                        </label>
                    </div>

                    <div class="form-group mb-0 mt-2 col-md-6">
                        <label class="">
                            <b>Tipo de documento:</b> {{ $libro->tip_doc }}
                        </label>
                    </div>

                    <div class="form-group mb-0 mt-2 col-md-6">
                        <label class="">
                            <b>Número de documento:</b> {{ $libro->num_doc }}
                        </label>
                    </div>

                    <div class="form-group mb-0 mt-2 col-md-4">
                        <label class="">
                            <b>Bien:</b> {{ $libro->bien }}
                        </label>
                    </div>

                    <div class="form-group mb-0 mt-2 col-md-4">
                        <label class="">
                            <b>Tipo de moneda:</b> {{ $libro->tip_mon }}
                        </label>
                    </div>

                    <div class="form-group mb-0 mt-2 col-md-4">
                        <label class="">
                            <b>Monto:</b> {{ $libro->monto }}
                        </label>
                    </div>

                    <div class="form-group mb-0 mt-2 col-md-12">
                        <label class="">
                            <b>Descripción:</b> {{ $libro->descripcion }}
                        </label>
                    </div>

                    <div class="form-group mb-0 mt-2 col-md-12">
                        <label class="">
                            <b>Motivo:</b> {{ $libro->motivo }}
                        </label>
                    </div>

                    <div class="form-group mb-0 mt-2 col-md-6">
                        <label class="">
                            <b>Detalles:</b> {{ $libro->detalles }}
                        </label>
                    </div>

                    <div class="form-group mb-0 mt-2 col-md-6">
                        <label class="">
                            <b>Pedido:</b> {{ $libro->pedido }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="modal-footer bg-light">
                <div class="row g-3 pt-3 pb-2 col-md-12">
                    <div class="form-group mb-2 mt-2 col-md-6"></div>

                    <div class="form-group mb-2 mt-2 col-md-6">
                        <button type="button" class="btn btn-dark col-md-12 font-14" data-bs-dismiss="modal">CERRAR</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>