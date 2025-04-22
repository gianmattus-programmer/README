<div class="modal fade modaltemario" id="ModalCreate" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-transparent p-4">
                <h5 class="modal-title">Crear nuevo temario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body bg-white p-4" id="dynamicTemario">
                <div class="row g-3 pt-3 pb-2 col-md-12">
                    <div class="form-group mb-2 mt-2 col-md-3">
                        <label class="mb-2">Nombre</label>
                        <input class="form-control form-control-solid" id="nombre" name="nombre[]" type="text" required />
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-4">
                        <label class="mb-2">Imagen destacada</label>
                        <input class="form-control form-control-solid" id="file" name="file[]" type="file" multiple="multiple" />
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-4">
                        <label class="mb-2">Descripción</label>
                        <input class="form-control form-control-solid" id="descripcion" name="descripcion[]" type="text" required />
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-1">
                        <label class="mb-2">:</label>
                        <button type="button" class="btn btn-primary col-md-12" name="add_temario" id="dynamic_temario">+</button>
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