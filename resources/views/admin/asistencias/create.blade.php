<div class="modal fade" id="ModalCreate" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-black p-4">
                <h5 class="modal-title text-white">Crear asistencia</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body bg-white p-4">
                <div class="row g-3 pt-3 pb-2 col-md-12">
                    @role('admin')
                        <div class="form-group mb-2 mt-2 col-md-6">
                            <label class="mb-2">Profesor</label>
                            <select class="form-control form-control-solid" id="profesor_id" name="profesor_id" type="select" required>
                                <option value="">Seleccionar</option>
                                @foreach($profesores as $profesor)
                                    <option value="{{ $profesor->id }}">{{ $profesor->first_name . ' ' . $profesor->last_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @else
                        <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}" />
                    @endrole
                    
                    <div class="form-group mb-2 mt-2 col-md-6">
                        <label class="mb-2">Alumnos</label>
                        <select class="form-control form-control-solid" id="user_id" name="user_id" type="select" required>
                            <option value="">Seleccionar</option>
                            @foreach($alumnos as $alumno)
                                <option value="{{ $alumno->id }}">{{ $alumno->first_name . ' ' . $alumno->last_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-6">
                        <label class="mb-2">Cursos</label>
                        <select class="form-control form-control-solid" id="listado_id" name="listado_id" type="select" required>
                            <option value="">Seleccionar</option>
                            @foreach($cursos as $curso)
                                <option value="{{ $curso->id }}">{{ $curso->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-6">
                        <label class="mb-2">Fecha</label>
                        <input class="form-control form-control-solid" id="fecha" name="fecha" type="date" required />
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-6">
                        <label class="mb-2">Hora</label>
                        <input class="form-control form-control-solid" id="hora" name="hora" type="time" required />
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