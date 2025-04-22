<div class="modal fade" id="ModalEdit{{ $temario->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-transparent p-4">
                <h5 class="modal-title">EDITAR TEMARIO {{ $temario->nombre }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body bg-white p-4">
                <div class="row g-3 pt-3 pb-2 col-md-12">
                    <div class="form-group mb-2 mt-2 col-md-4">
                        <label class="mb-2">Imagen destacada</label>
                        <img src="/panel/cursos/temarios/{{ $temario->file }}" class="img-fluid form-control form-control-solid" alt="...">
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-8">
                        <div class="row">
                            <div class="form-group mb-2 mt-2 col-md-12">
                                <label class="mb-2">Nombre</label>
                                <input class="form-control form-control-solid" id="nombre" name="nombre" type="text" required value="{{ $temario->nombre }}" />
                            </div>

                            <div class="form-group mb-2 mt-2 col-md-12">
                                <label class="mb-2">Imagen destacada</label>
                                <input class="form-control form-control-solid" id="file" name="file" type="file" multiple="multiple" />
                            </div>

                            <div class="form-group mb-2 mt-2 col-md-12">
                                <label class="mb-2">Descripción</label>
                                <textarea class="form-control form-control-solid" name="descripcion" id="descripcion" rows="3" placeholder="descripcion">{{ $temario->descripcion }}</textarea>
                            </div>
                        </div>
                    </div>

                    <input id="estatus" name="estatus" type="hidden" value="{{ $temario->estatus }}" />
                    <input id="listado_id" name="listado_id" type="hidden" value="{{ $temario->listado_id }}" />
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