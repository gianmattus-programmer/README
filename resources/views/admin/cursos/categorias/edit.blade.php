<div class="modal fade" id="ModalEdit{{ $categoria->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-transparent p-4">
                <h5 class="modal-title">EDITAR CATEGORÍA {{ $categoria->nombre }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body bg-white p-4">
                <div class="row g-3 pt-3 pb-2 col-md-12">
                    <div class="form-group mb-2 mt-2 col-md-4">
                        <img src="../panel/cursos/categorias/{{ $categoria->file }}" class="img-fluid" alt="...">
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-8">
                        <label class="mb-2">Nombre</label>
                        <input class="form-control form-control-solid" id="nombre" name="nombre" type="text" placeholder="nombre" required value="{{ $categoria->nombre }}" />
                    
                        <label class="mt-3 mb-2">Imagen destacada</label>
                        <input class="form-control form-control-solid" id="file" name="file" type="file" />

                        <label class="mt-3 mb-2">Descripción</label>
                        <textarea class="form-control form-control-solid" name="descripcion" id="descripcion" rows="2" placeholder="descripcion" required>{{ $categoria->descripcion }}</textarea>
                    </div>

                    <input class="form-control form-control-solid" id="estatus" name="estatus" type="hidden" value="{{ $categoria->estatus }}" />
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