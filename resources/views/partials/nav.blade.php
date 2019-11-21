
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light shadow p-3 mb-5 bg-white rounded">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <!-- inicio -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">Inicio <span class="sr-only">(current)</span></a>
            </li>

            <!-- módulo sesion -->
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    Hola, {{ Auth::user()->nombre1 }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item sub-item" href="{{ route('usuarios.edit', Auth::user()) }}">Actualizar Datos</a>
                    <a class="dropdown-item sub-item" href="{{ route('passwords', Auth::user()) }}">Cambiar Contraseña</a>
                    <a class="dropdown-item sub-item" href=""
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Salir') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>

            <!-- módulo socios -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span id="span-socios">Socios</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item sub-item" href="{{ route('socios.create') }}">Incorporar</a>
                    <a class="dropdown-item sub-item" href="{{ route('home') }}">Listar</a>
                    <a class="dropdown-item sub-item" href="{{ route('filtro_socios_form') }}">Filtrar</a>
                </div>
            </li>

            <!-- módulo préstamos -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span id="span-prestamos">Préstamos</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item sub-item" href="{{ route('prestamos.create') }}">Solicitar</a>
                    <a class="dropdown-item sub-item" href="{{ route('prestamos.index') }}">Listar</a>
                    <a class="dropdown-item sub-item" href="{{ route('filtro_prestamos_form') }}">Filtrar</a>
                </div>
            </li>

            <!-- módulo registros contables -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span id="span-contables">Registros Contables</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item sub-item" href="{{ route('contables.create') }}">Registrar</a>
                    <a class="dropdown-item sub-item" href="{{ route('contables.index') }}">Listar</a>
                    <a class="dropdown-item sub-item" href="{{ route('filtro_contables_form') }}">Filtrar</a>
                    <a class="dropdown-item sub-item" href="{{ route('crear_conciliacion') }}">Conciliación Bancaria</a>
                    <a class="dropdown-item sub-item" href="">Anular Registro</a>
                </div>
            </li>

            <!-- módulo historial -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span id="span-historial">Historial</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item sub-item" href="{{ route('historial.index') }}">Listar</a>
                    <a class="dropdown-item sub-item" href="{{ route('filtro_historial_form') }}">Filtrar</a>
                </div>
            </li>

            <!-- módulo usuarios -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span id="span-usuarios">Usuarios</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item sub-item" href="{{ route('register') }}">Agregar</a>
                    <a class="dropdown-item sub-item" href="{{ route('usuarios.index') }}">Listar</a>
                </div>
            </li>

            <!-- módulo mantenedor -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span id="span-mantenedores">Mantenedor</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item sub-item" href="{{ route('mantenedor_socio_sede') }}">Socios</a>
                    <a class="dropdown-item sub-item" href="{{ route('mantenedor_carga_parentesco') }}">Cargas Familiares</a>
                </div>
            </li>
        </ul>

        <!-- formulario búsqueda socio-->
        <div id="buscador-socio" class="d-none">
            <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('home') }}">
                <button type="button" class="btn btn-sm btn-outline-primary rounded-circle mr-2 pb-0" data-container="body" data-toggle="popover" data-placement="left" data-content="Búsqueda de socio(s) por medio de: rut, nombre (primero o segundo), apellido (paterno o materno), celular, anexo, correo y dirección.">?</button>
                <input class="form-control mr-sm-2" type="search" name="buscar_socio" placeholder="Buscar socio(s)" aria-label="Search">
                <button class="btn btn-primary my-2 my-sm-0" type="submit">Buscar</button>
            </form>
        </div>


        <!-- formulario búsqueda prestamo-->
        <div id="buscador-prestamo" class="d-none">
            <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('prestamos.index') }}">
                <button type="button" class="btn btn-sm btn-outline-success rounded-circle mr-2 pb-0" data-container="body" data-toggle="popover" data-placement="left" data-content="Búsqueda de prestamo(s) por medio de: número de egreso y cheque.">?</button>
                <input class="form-control mr-sm-2" type="search" name="buscar_prestamo" placeholder="Buscar prestamo(s)" aria-label="Search">
                <button class="btn btn-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>
        </div>

        <!-- formulario búsqueda registros contables-->
        <div id="buscador-contable" class="d-none">
            <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('contables.index') }}">
                <button type="button" class="btn btn-sm btn-outline-dark rounded-circle mr-2 pb-0" data-container="body" data-toggle="popover" data-placement="left" data-content="Búsqueda de registro(s) contable(s) por medio de: número de registro y cheque.">?</button>
                <input class="form-control mr-sm-2" type="search" name="buscar_registro" placeholder="Buscar registro(s)" aria-label="Search">
                <button class="btn btn-dark my-2 my-sm-0" type="submit">Buscar</button>
            </form>
        </div>

        <!-- formulario búsqueda usuarios-->
        <div id="buscador-usuario" class="d-none">
            <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('usuarios.index') }}">
                <button type="button" class="btn btn-sm btn-outline-danger rounded-circle mr-2 pb-0" data-container="body" data-toggle="popover" data-placement="left" data-content="Búsqueda de usuario(s) por medio de: primer o segundo nombre, apellido paterno o materno y correo.">?</button>
                <input class="form-control mr-sm-2" type="search" name="buscar_usuario" placeholder="Buscar usuario(s)" aria-label="Search">
                <button class="btn btn-danger my-2 my-sm-0" type="submit">Buscar</button>
            </form>
        </div>
    </div>
</nav>