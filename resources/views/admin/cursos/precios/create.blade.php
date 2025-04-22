<div class="modal fade modalprecio" id="ModalCreate" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-black p-4">
                <h5 class="modal-title text-white">Registrar precios</h5>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body bg-white p-4" id="dynamicPrecio">
                <div class="row g-3 pt-3 pb-2 col-md-12">
                    <div class="form-group mb-2 mt-2 col-md-2">
                        <label class="mb-2">Precio</label>
                        <input class="form-control form-control-solid" id="precio" name="precio[]" type="number" required />
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-2">
                        <label class="mb-2">Descuento</label>
                        <input class="form-control form-control-solid" id="descuento" name="descuento[]" type="number" />
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-2">
                        <label class="mb-2">Fecha de inicio</label>
                        <input class="form-control form-control-solid" id="inicio" name="inicio[]" type="date" required />
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-2">
                        <label class="mb-2">Duración</label>
                        <input class="form-control form-control-solid" id="duracion" name="duracion[]" type="text" required />
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-3">
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
        </div>
    </div>
</div>