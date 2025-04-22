<ul class="metismenu" id="menu">
    <li class="{{ (request()->is('admin/cursoscategorias*')) ? 'mm-active' : '' }} {{ (request()->is('admin/cursoslistados*')) ? 'mm-active' : '' }} {{ (request()->is('admin/cursostemarios*')) ? 'mm-active' : '' }}">
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon">
                <i class="bx bx-book"></i>
            </div>

            <div class="menu-title">Nuestros cursos</div>
        </a>

        <ul>
            <li class="{{ (request()->is('admin/cursoscategorias*')) ? 'mm-active' : '' }}">
                <a href="{{ url('admin/cursoscategorias') }}">
                    <i class="bx bx-radio-circle"></i>
                    Categorías
                </a>
            </li>

            <li class="{{ (request()->is('admin/cursoslistados*')) ? 'mm-active' : '' }} {{ (request()->is('admin/cursostemarios*')) ? 'mm-active' : '' }}">
                <a href="{{ url('admin/cursoslistados') }}">
                    <i class="bx bx-radio-circle"></i>
                    Listado de cursos
                </a>
            </li>
        </ul>
    </li>

    <li class="{{ (request()->is('shop*')) ? 'mm-active' : '' }}">
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon">
                <i class="bx bx-shopping-bag"></i>
            </div>

            <div class="menu-title">Shop</div>
        </a>

        <ul>
            <li class="{{ (request()->is('admin/tiendacategorias*')) ? 'mm-active' : '' }}">
                <a href="{{ url('admin/tiendacategorias') }}" aria-expanded="true">
                    <i class="bx bx-radio-circle"></i>
                    Categorías
                </a>
            </li>

            <li class="{{ (request()->is('admin/tiendalistados*')) ? 'mm-active' : '' }}">
                <a href="{{ url('admin/tiendalistados') }}" aria-expanded="true">
                    <i class="bx bx-radio-circle"></i>
                    Listado de productos
                </a>
            </li>
        </ul>
    </li>

    <li class="{{ (request()->is('admin/asistencias*')) ? 'mm-active' : '' }}">
        <a href="{{ url('admin/asistencias') }}">
            <div class="parent-icon">
                <i class="lni lni-alarm-clock"></i>
            </div>

            <div class="menu-title">Asistencias</div>
        </a>
    </li>

    <li class="{{ (request()->is('admin/cupones*')) ? 'mm-active' : '' }}">
        <a href="{{ url('admin/cupones') }}">
            <div class="parent-icon">
                <i class="lni lni-dollar"></i>
            </div>

            <div class="menu-title">Cupones de descuento</div>
        </a>
    </li>

    <li class="{{ (request()->is('admin/encuentranos*')) ? 'mm-active' : '' }}">
        <a href="{{ url('admin/encuentranos') }}">
            <div class="parent-icon">
                <i class="bx bx-map"></i>
            </div>

            <div class="menu-title">Encuéntranos</div>
        </a>
    </li>

    <li class="{{ (request()->is('admin/nosotros*')) ? 'mm-active' : '' }}">
        <a href="{{ url('admin/nosotros') }}">
            <div class="parent-icon">
                <i class="bx bx-home"></i>
            </div>

            <div class="menu-title">Nosotros</div>
        </a>
    </li>

    <li class="{{ (request()->is('admin/shop*')) ? 'mm-active' : '' }}">
        <a href="{{ url('admin/shop') }}">
            <div class="parent-icon">
                <i class="bx bx-credit-card"></i>
            </div>

            <div class="menu-title">Listado de compras</div>
        </a>
    </li>

    <li class="{{ (request()->is('admin/politicas*')) ? 'mm-active' : '' }} {{ (request()->is('admin/terminos*')) ? 'mm-active' : '' }} {{ (request()->is('admin/libros*')) ? 'mm-active' : '' }}">
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon">
                <i class="bx bx-cog bx-spin"></i>
            </div>

            <div class="menu-title">Páginas</div>
        </a>

        <ul>
            <li class="{{ (request()->is('admin/politicas*')) ? 'mm-active' : '' }}">
                <a href="{{ url('admin/politicas') }}" aria-expanded="true">
                    <i class="bx bx-radio-circle"></i>
                    Políticas de datos
                </a>
            </li>

            <li class="{{ (request()->is('admin/terminos*')) ? 'mm-active' : '' }}">
                <a href="{{ url('admin/terminos') }}" aria-expanded="true">
                    <i class="bx bx-radio-circle"></i>
                    Términos y condiciones
                </a>
            </li>

            <li class="{{ (request()->is('admin/libros*')) ? 'mm-active' : '' }}">
                <a href="{{ url('admin/libros') }}" aria-expanded="true">
                    <i class="bx bx-radio-circle"></i>
                    Libro de reclamaciones
                </a>
            </li>
        </ul>
    </li>

    <li class="{{ (request()->is('admin/profesores*')) ? 'mm-active' : '' }}">
        <a href="{{ url('admin/profesores') }}">
            <div class="parent-icon">
                <i class="bx bx-user-circle"></i>
            </div>

            <div class="menu-title">Profesores</div>
        </a>
    </li>

    <li class="{{ (request()->is('users*')) ? 'mm-active' : '' }}">
        <a href="{{ url('users') }}">
            <div class="parent-icon">
                <i class="bx bx-user-circle"></i>
            </div>

            <div class="menu-title">Usuarios</div>
        </a>
    </li>

    <li class="{{ (request()->is('/*')) ? 'mm-active' : '' }}">
        <a href="{{ url('/') }}">
            <div class="parent-icon">
                <i class="bx bx-log-out-circle"></i>
            </div>

            <div class="menu-title">Regresar</div>
        </a>
    </li>
</ul>