
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
                    <a class="dropdown-item sub-item" href="{{ route('usuarios.edit', Auth::user()) }}">Actualizar datos</a>
                    <a class="dropdown-item sub-item" href="{{ route('usuarios.editPassword', Auth::user()) }}">Cambiar contraseña</a>
                    <a class="dropdown-item sub-item" href="{{ route('logout') }}"
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
                    <a class="dropdown-item sub-item" href="{{ route('home') }}">Listar</a>
                    <a class="dropdown-item sub-item" href="{{ route('socios.create') }}">Incorporar</a>
                    <a class="dropdown-item sub-item" href="{{ route('filtro_socios') }}">Filtrar</a>
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
                    <a class="dropdown-item sub-item" href="{{ route('filtro_prestamos') }}">Filtrar</a>
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
                    <a class="dropdown-item sub-item" href="{{ route('filtro_contables') }}">Filtrar</a>
                    <a class="dropdown-item sub-item" href="{{ route('crear_conciliacion') }}">Conciliación bancaria</a>
                </div>
            </li>

            <!-- módulo mantenedor -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span id="span-mantenedores">Mantenedor</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item sub-item" href="{{ route('mantenedor_socios') }}">Socios</a>
                    <a class="dropdown-item sub-item" href="{{ route('mantenedor_prestamos') }}">Préstamos</a>
                    <a class="dropdown-item sub-item" href="{{ route('mantenedor_contables') }}">Registro contable</a>
                    <a class="dropdown-item sub-item" href="{{ route('mantenedor_usuarios') }}">Usuarios</a>
                </div>
            </li> 

            <!-- módulo ayuda -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span id="span-historial">Historial</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item sub-item" href="{{ route('historial.index') }}">Listar</a>
                    <a class="dropdown-item sub-item" href="{{ route('filtro_historial') }}">Filtrar</a>
                </div>
            </li>

        </ul>

        <!-- formulario búsqueda -->
        <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('home') }}">
            <button type="button" class="btn btn-sm btn-outline-dark rounded-circle mr-2 pb-0" data-container="body" data-toggle="popover" data-placement="left" data-content="Búsqueda de socio/s por rut, nombre (primero o segundo), apellido (paterno o materno), celular, anexo, correo y dirección.">
              ?
            </button>
            <input class="form-control mr-sm-2" type="search" name="search" placeholder="Buscar socio/s" aria-label="Search">
            <button class="btn btn-dark my-2 my-sm-0" type="submit">Buscar</button>
        </form>

    </div>
</nav>