<div class="modal fade" id="ModalShow{{ $listado->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-black p-4">
                <h5 class="modal-title text-white">CURSO {{ $listado->nombre }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body bg-white p-4">
                <div class="row g-3 pt-3 pb-2 col-md-12">
                    <div class="form-group mb-2 mt-2 col-md-4">
                        <label class="mb-2">Imagen destacada</label>
                        <img src="../panel/cursos/listados/{{ $listado->file }}" class="img-fluid form-control form-control-solid" alt="...">

                        <label class="mt-3 mb-2">Imagen de portada</label>
                        <img src="../panel/cursos/listados/portadas/{{ $listado->portada }}" class="img-fluid form-control form-control-solid" alt="...">
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-8">
                        <div class="row">
                            <div class="form-group mb-2 mt-2 col-md-6">
                                <label class="mb-2">Categoría</label>
                                <select class="form-control form-control-solid des_form" id="cursocategorias_id" name="cursocategorias_id" type="select">
                                    @foreach($categorias as $categoria)
                                        @if($categoria->id == $listado->cursocategorias_id)
                                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-2 mt-2 col-md-6">
                                <label class="mb-2">Profesor</label>
                                <select class="form-control form-control-solid" id="profesor_id" name="profesor_id" type="select" required>
                                    <option value="{{ $listado->profesor_id }}">{{ $listado->user->first_name.' '.$listado->user->last_name }}</option>
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

                            <div class="form-group mb-2 mt-2 col-md-12">
                                <label class="mb-2">Link de video</label>
                                <input class="form-control form-control-solid des_form" id="video" name="video" type="text" value="{{ $listado->video }}" />
                            </div>

                            <div class="form-group mb-2 mt-2 col-md-6">
                                <label class="mb-2">Meses</label>
                                <input class="form-control form-control-solid des_form" id="meses" name="meses" type="text" value="{{ $listado->meses }}" />
                            </div>

                            <div class="form-group mb-2 mt-2 col-md-6">
                                <label class="mb-2">Sesiones</label>
                                <input class="form-control form-control-solid des_form" id="sesiones" name="sesiones" type="text" value="{{ $listado->sesiones }}" />
                            </div>

                            <div class="form-group mb-2 mt-2 col-md-12">
                                <label class="mb-2">Descripción</label>
                                <textarea class="form-control form-control-solid des_form" name="descripcion" id="descripcion" rows="3" placeholder="descripcion">{{ $listado->descripcion }}</textarea>
                            </div>
                        </div>
                    </div>

                    <input class="form-control form-control-solid" id="estatus" name="estatus" type="hidden" value="{{ $listado->estatus }}" />
                </div>
            </div>

            <div class="modal-footer bg-light">
                <div class="row g-3 pt-3 pb-2 col-md-12">
                    <div class="form-group mb-2 mt-2 col-md-6"></div>

                    <div class="form-group mb-2 mt-2 col-md-6">
                        <button type="button" class="btn btn-dark col-md-12 font-14" data-bs-dismiss="modal">CERRAR</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>