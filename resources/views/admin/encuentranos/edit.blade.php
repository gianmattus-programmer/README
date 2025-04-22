<div class="modal fade" id="ModalEdit{{ $encuentrano->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-transparent p-4">
                <h5 class="modal-title">EDITAR DATOS DE LA PÁGINA {{ $encuentrano->titulo }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body bg-white p-4">
                <div class="row g-3 pt-3 pb-2 col-md-12">
                    <div class="form-group mb-2 mt-2 col-md-4">
                        <img src="../panel/encuentranos/{{ $encuentrano->file }}" class="img-fluid" alt="...">
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-8">
                        <label class="mb-2">Titulo</label>
                        <input class="form-control form-control-solid" id="titulo" name="titulo" type="text" required value="{{ $encuentrano->titulo }}" />
                    
                        <label class="mt-3 mb-2">Sede</label>
                        <input class="form-control form-control-solid" id="sede" name="sede" type="text" required value="{{ $encuentrano->sede }}" />
                    
                        <label class="mt-3 mb-2">Imagen destacada</label>
                        <input class="form-control form-control-solid" id="file" name="file" type="file" />
                    </div>

                    <input class="form-control form-control-solid" id="estatus" name="estatus" type="hidden" value="{{ $encuentrano->estatus }}" />
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