<div class="modal fade modalprecio" id="ModalPrecioCreate{{ $listado->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form id="identifier" action="{{ route('cursosmodulos.store') }}" class="" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" value="{{ $listado->id }}" id="listado_id" name="listado_id" />
                <input type="hidden" value="1" id="estatus" name="estatus" />
                
                <div class="modal-header py-0 p-0">
                    <ul class="nav nav-tabs nav-primary col-md-12" role="tablist">
                        <li class="nav-item col-md-6 p-3 bg-black" role="presentation">
                            <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab" aria-selected="true">
                                <h5 class="modal-title text-white">Crear precio</h5>
                            </a>
                        </li>

                        <li class="nav-item col-md-6 p-3 bg-dark" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab" aria-selected="false" tabindex="-1">
                                <h5 class="modal-title text-white">Editar precio</h5>
                            </a>
                        </li>
                    </ul>
                </div>
                
                <div class="modal-body bg-white p-4" id="dynamicPrecio">
                    <div class="row g-3 pt-3 pb-2 col-md-12">
                        <div class="form-group mb-2 mt-2 col-md-2">
                            <label class="mb-2">Precio</label>
                            <input class="form-control form-control-solid" id="precio" name="precio[]" type="number" required />
                        </div>

                        <div class="form-group mb-2 mt-2 col-md-2">
                            <label class="mb-2">Fecha de inicio</label>
                            <input class="form-control form-control-solid" id="inicio" name="inicio[]" type="date" required />
                        </div>

                        <div class="form-group mb-2 mt-2 col-md-3">
                            <label class="mb-2">Duración</label>
                            <input class="form-control form-control-solid" id="duracion" name="duracion[]" type="text" required />
                        </div>

                        <div class="form-group mb-2 mt-2 col-md-4">
                            <label class="mb-2">Horarios</label>
                            <input class="form-control form-control-solid" id="horarios" name="horarios[]" type="text" required />
                        </div>

                        <div class="form-group mb-2 mt-2 col-md-1">
                            <label class="mb-2">:</label>
                            <button type="button" class="btn-primary col-md-12 form-control text-white" name="add_precio" id="dynamic_precio">+</button>
                        </div>
                    </div>
                </div>

                <div class="modal-footer bg-light">
                    <div class="row g-3 pt-3 pb-2 col-md-12">
                        <div class="form-group mb-2 mt-2 col-md-6">
                            <button type="button" class="btn btn-dark col-md-12 font-14" data-bs-dismiss="modal">CANCELAR</button>
                        </div>

                        <div class="form-group mb-2 mt-2 col-md-6">
                            <button type="submit" class="btn btn-primary col-md-12 font-14">GUARDAR</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>