<div class="modal fade" id="ModalEdit{{ $precio->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-black p-4">
                <h5 class="modal-title text-white">EDITAR PRECIO</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body bg-white p-4">
                <div class="row g-3 pt-3 pb-2 col-md-12">
                    <div class="form-group mb-2 mt-2 col-md-6">
                        <label class="mb-2">Precio</label>
                        <input class="form-control form-control-solid" id="precio" name="precio" type="number" required value="{{ $precio->precio }}" />
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-6">
                        <label class="mb-2">Descuento</label>
                        <input class="form-control form-control-solid" id="descuento" name="descuento" type="number" value="{{ $precio->descuento }}" />
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-6">
                        <label class="mb-2">Fecha de inicio</label>
                        <input class="form-control form-control-solid" id="inicio" name="inicio" type="date" required value="{{ $precio->inicio }}" />
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-6">
                        <label class="mb-2">Duración</label>
                        <input class="form-control form-control-solid" id="duracion" name="duracion" type="text" required value="{{ $precio->duracion }}" />
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-6">
                        <label class="mb-2">Horarios</label>
                        <input class="form-control form-control-solid" id="horarios" name="horarios" type="text" required value="{{ $precio->horarios }}" />
                    </div>

                    <input id="estatus" name="estatus" type="hidden" value="{{ $precio->estatus }}" />
                    <input type="hidden" value="{{ $precio->listado_id }}" id="listado_id" name="listado_id" />
                </div>
            </div>

            <div class="modal-footer bg-light">
                <div class="row g-3 pt-3 pb-2 col-md-12">
                    <div class="form-group mb-2 mt-2 col-md-6">
                        <button type="button" class="btn btn-dark col-md-12 font-14" data-bs-dismiss="modal">CANCELAR</button>
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-6">
                        <button type="submit" class="btn btn-success col-md-12 font-14">ACTUALIZAR</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>