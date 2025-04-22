<div class="modal fade modalmodulo" id="ModalEdit{{ $modulo->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-transparent p-4">
                <h5 class="modal-title">EDITAR MÓDULO {{ $modulo->nombre }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body bg-white p-4">
                <div class="row g-3 pt-3 pb-2 col-md-12">
                    <div class="form-group mb-2 mt-2 col-md-12">
                        <label class="mb-2">Nombre</label>
                        <input class="form-control form-control-solid" id="nombre" name="nombre" type="text" required value="{{ $modulo->nombre }}" />
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-12">
                        <label class="mb-2">Descripción</label>
                        <textarea class="form-control form-control-solid" id="descripcion" name="descripcion" rows="4" required>{{ $modulo->descripcion }}</textarea>
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-12">
                        <label class="mb-2">Información</label>
                        <textarea class="informacion" id="informacion" name="informacion" cols="30" rows="10" required>{{ $modulo->informacion }}</textarea>
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-12">
                        <label class="mb-2">Examén final</label>
                        <select class="form-control form-control-solid" id="examen" name="examen" type="select" required>
                            <option value="{{ $modulo->examen }}">{{ $modulo->examen }}</option>
                            <option value="">Seleccionar</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>

                    <input id="estatus" name="estatus" type="hidden" value="{{ $modulo->estatus }}" />
                    <input type="hidden" value="{{ $temario->id }}" id="temario_id" name="temario_id" />
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