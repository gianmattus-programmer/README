<div class="modal fade" id="ModalCreate" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-black p-4">
                <h5 class="modal-title text-white">Crear nuevo profesor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body bg-white p-4">
                <div class="row g-3 pt-3 pb-2 col-md-12">
                    <div class="form-group mb-2 mt-2 col-md-4">
                        <label class="mb-2">Nombres:</label>
                        <input class="form-control form-control-solid" id="first_name" name="first_name" type="text" required />
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-4">
                        <label class="mb-2">Apellidos:</label>
                        <input class="form-control form-control-solid" id="last_name" name="last_name" type="text" required />
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-4">
                        <label class="mb-2">Correo electrónico:</label>
                        <input class="form-control form-control-solid" id="email" name="email" type="email" required />
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-4">
                        <label class="mb-2">DNI/Pasaporte:</label>
                        <input class="form-control form-control-solid" id="documento" name="documento" type="number" required />
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-4">
                        <label class="mb-2">Celular:</label>
                        <input class="form-control form-control-solid" id="celular" name="celular" type="number" required />
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-4">
                        <label class="mb-2">Dirección:</label>
                        <input class="form-control form-control-solid" id="direccion" name="direccion" type="text" required />
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-4">
                        <label class="mb-2">Contraseña:</label>
                        <input class="form-control form-control-solid" id="password" name="password" type="password" required />
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-4">
                        <label class="mb-2">Confirmar contraseña:</label>
                        <input class="form-control form-control-solid" id="password_confirmation" name="password_confirmation" type="password" required />
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-4">
                        <label class="mb-2">Estado:</label>
                        <select class="form-control form-control-solid" id="estatus" name="estatus" type="select" required>
                            <option value="">Seleccionar</option>
                            <option value="1">Activo</option>
                            <option value="2">Inactivo</option>
                        </select>
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