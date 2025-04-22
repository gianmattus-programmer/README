<div class="modal fade modaltemario" id="ModalEdit{{ $listado->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-black p-4">
                <h5 class="modal-title text-white">EDITAR PRODUCTO {{ $listado->nombre }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body bg-white p-4">
                <div class="row g-3 pt-3 pb-2 col-md-12">
                    <div class="form-group mb-2 mt-2 col-md-4">
                        <label class="mb-2">Imagen destacada</label>
                        <img src="{{ asset('panel/tienda/listados') }}/{{ $listado->file }}" class="img-fluid form-control form-control-solid" alt="...">
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-8">
                        <div class="row">
                            <div class="form-group mb-2 mt-2 col-md-12">
                                <label class="mb-2">Nombre</label>
                                <input class="form-control form-control-solid" id="nombre" name="nombre" type="text" required value="{{ $listado->nombre }}" />
                            </div>

                            <div class="form-group mb-2 mt-2 col-md-6">
                                <label class="mb-2">Categoría</label>
                                <select class="form-control form-control-solid" id="tiendacategoria_id" name="tiendacategoria_id" type="select" required>
                                    @foreach($categorias as $categoria)
                                        @if($categoria->id == $listado->tiendacategoria_id)
                                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                        @endif
                                    @endforeach
                                    <option value="">Seleccionar</option>
                                    @foreach($categorias as $categoria)
                                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-2 mt-2 col-md-6">
                                <label class="mb-2">Imagen destacada</label>
                                <input class="form-control form-control-solid" id="file" name="file" type="file" />
                            </div>

                            <div class="form-group mb-2 mt-2 col-md-6">
                                <label class="mb-2">Precio</label>
                                <input class="form-control form-control-solid" id="precio" name="precio" type="number" required value="{{ $listado->precio }}" />
                            </div>

                            <div class="form-group mb-2 mt-2 col-md-6">
                                <label class="mb-2">Descuento</label>
                                <input class="form-control form-control-solid" id="descuento" name="descuento" type="number" value="{{ $listado->descuento }}" />
                            </div>

                            <div class="form-group mb-2 mt-2 col-md-6">
                                <label class="mb-2">Estado</label>
                                <select class="form-control form-control-solid" id="estado" name="estado" type="select" required>
                                    <option value="{{ $listado->estado }}">{{ $listado->estado }}</option>
                                    <option value="">Seleccionar</option>
                                    <option value="Activo">Activo</option>
                                    <option value="Inactivo">Inactivo</option>
                                </select>
                            </div>

                            <div class="form-group mb-2 mt-2 col-md-12">
                                <label class="mb-2">Descripción</label>
                                <textarea class="form-control form-control-solid" name="descripcion" id="descripcion" rows="2" required>{{ $listado->descripcion }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-12">
                        <div class="row">
                            <div class="form-group mb-2 mt-2 col-md-12">
                                <label class="mb-2">Información</label>
                                <textarea class="informacion" id="informacion" name="informacion" cols="30" rows="10" required>{{ $listado->informacion }}</textarea>
                            </div>
                        </div>
                    </div>

                    <input class="form-control form-control-solid" id="estatus" name="estatus" type="hidden" value="{{ $listado->estatus }}" />
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