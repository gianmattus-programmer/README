<div class="section_footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="title_foot">
                    <h5>COMPAÑÍA</h5>

                    <p>
                        <a href="{{ url('nosotros') }}">
                            Sobre nosotros
                        </a>
                    </p>

                    <p>
                        <a href="{{ url('encuentranos') }}">
                            Encuéntranos
                        </a>
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-3">
                <div class="title_foot">
                    <h5>CURSOS Y PROGRAMAS</h5>

                    @foreach($categorias as $categoria)
                        @if($categoria->estatus == 1)
                            <p>
                                <a href="{{ url('/cursos/'.$categoria->id.'/'.str_replace(' ', '-', strtolower($categoria->nombre))) }}">
                                    {{ $categoria->nombre }}
                                </a>
                            </p>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="col-lg-3 col-md-3">
                <div class="title_foot">
                    <h5>SHOP</h5>

                    <p>
                        <a href="{{ url('nosotros') }}">
                            Materiales PDF
                        </a>
                    </p>

                    <p>
                        <a href="{{ url('encuentranos') }}">
                            Clóset Pralemy
                        </a>
                    </p>

                    <p>
                        <a href="{{ url('encuentranos') }}">
                            Emprende con nosotros
                        </a>
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-3">
                <div class="title_foot">
                    <h5>ENLACES DE AYUDA</h5>

                    <p>
                        <a href="{{ url('politicas-de-datos') }}">
                            Política de datos
                        </a>
                    </p>

                    <p>
                        <a href="{{ url('terminos-y-condiciones') }}">
                            Términos y condiciones
                        </a>
                    </p>

                    <p>
                        <a href="{{ url('libro-de-reclamaciones') }}">
                            Libro de reclamaciones
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section_prefooter">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="copy_foot">
                    <p>PRALEMY FASHION SCHOOL. PRALEMY S.A.C. TODOS LOS DERECHOS RESERVADOS.</p>
                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="socials_foot">
                    <a href="https://www.instagram.com/pralemycom/" target="_BLANK" class="">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                
                    <a href="https://www.facebook.com/pralemy/" target="_BLANK" class="">
                        <i class="fa-brands fa-facebook"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="boton_wsp">
    <a class="btn btn-wsp" href="https://wa.me/51955572220" target="_BLANK">
        <i class="fa-brands fa-whatsapp"></i> Whatsapp
    </a>
</div>