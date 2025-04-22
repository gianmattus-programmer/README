<div class="modal fade" id="ModalCreate" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-black p-4">
                <h5 class="modal-title text-white">Crear nuevo curso</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body bg-white p-4">
                <div class="row g-3 pt-3 pb-2 col-md-12">
                    <div class="form-group mb-2 mt-2 col-md-6">
                        <label class="mb-2">Nombre</label>
                        <input class="form-control form-control-solid" id="nombre" name="nombre" type="text" required />
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-6">
                        <label class="mb-2">Imagen destacada</label>
                        <input class="form-control form-control-solid" id="file" name="file" type="file" />
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-6">
                        <label class="mb-2">Categoría</label>
                        <select class="form-control form-control-solid" id="cursocategorias_id" name="cursocategorias_id" type="select" required>
                            <option value="">Seleccionar</option>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-6">
                        <label class="mb-2">Profesor</label>
                        <select class="form-control form-control-solid" id="profesor_id" name="profesor_id" type="select" required>
                            <option value="">Seleccionar</option>
                            @foreach($rolus as $rolu)
                                @if($rolu->role_id == 3)
                                    @foreach($users as $user)
                                        @if($rolu->user_id == $user->id)
                                            <option value="{{ $user->id }}">{{ $user->first_name.' '.$user->last_name }}</option>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-6">
                        <label class="mb-2">Meses</label>
                        <input class="form-control form-control-solid" id="meses" name="meses" type="text" required />
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-6">
                        <label class="mb-2">Sesiones</label>
                        <input class="form-control form-control-solid" id="sesiones" name="sesiones" type="text" required />
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-12">
                        <label class="mb-2">Descripción</label>
                        <textarea class="form-control form-control-solid" name="descripcion" id="descripcion" rows="2" required></textarea>
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-6">
                        <label class="mb-2">Link de video</label>
                        <input class="form-control form-control-solid" id="video" name="video" type="text" required />
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-6">
                        <label class="mb-2">Imagen de portada</label>
                        <input class="form-control form-control-solid" id="portada" name="portada" type="file" required />
                    </div>

                    <input class="form-control form-control-solid" id="estatus" name="estatus" type="hidden" value="1" />
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