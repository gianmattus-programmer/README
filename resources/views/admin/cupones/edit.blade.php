<div class="modal fade" id="ModalEdit{{ $cupon->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-black p-4">
                <h5 class="modal-title text-white">EDITAR CUPÓN</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body bg-white p-4">
                <div class="row g-3 pt-3 pb-2 col-md-12">
                    <div class="form-group mb-2 mt-2 col-md-6">
                        <label class="mb-2">Porcentaje(%)</label>
                        <input class="form-control form-control-solid" id="porcentaje" name="porcentaje" type="number" required value="{{ $cupon->porcentaje }}" />
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-6">
                        <label class="mb-2">Código</label>
                        <input class="form-control form-control-solid" id="codigo" name="codigo" type="text" required value="{{ $cupon->codigo }}" />
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-6">
                        <label class="mb-2">Activo</label>
                        <select class="form-control form-control-solid" id="estado" name="estado" type="select" required>
                            <option value="{{ $cupon->estado }}">{{ $cupon->estado }}</option>
                            <option value="">Seleccionar</option>
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                    </div>

                    <input class="form-control form-control-solid" id="estatus" name="estatus" type="hidden" value="{{ $cupon->estatus }}" />
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