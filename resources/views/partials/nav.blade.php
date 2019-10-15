<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <!-- inicio -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('home') }}">Inicio <span class="sr-only">(current)</span></a>
            </li>

            <!-- módulo sesion -->
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    Hola, {{ Auth::user()->nombre1 }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Actualizar datos</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
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
                    Socios
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('home') }}">Listar</a>
                    <a class="dropdown-item" href="{{ route('socios.create') }}">Incorporar</a>
                    <a class="dropdown-item" href="{{ route('buscar') }}">Filtrar</a>
                </div>
            </li>

            <!-- módulo préstamos -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Préstamos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('prestamos.create') }}">Solicitar</a>
                    <a class="dropdown-item" href="{{ route('prestamos.index') }}">Listar</a>
                </div>
            </li>

            <!-- módulo registros contables -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Registros Contables
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('contables.create') }}">Registrar</a>
                    <a class="dropdown-item" href="{{ route('contables.index') }}">Listar</a>
                    <a class="dropdown-item" href="{{ route('crear_conciliacion') }}">Conciliación bancaria</a>
                </div>
            </li>

            <!-- módulo mantenedor -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Mantenedor
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('mantenedor_socios') }}">Socios</a>
                    <a class="dropdown-item" href="{{ route('mantenedor_prestamos') }}">Préstamos</a>
                    <a class="dropdown-item" href="{{ route('mantenedor_contables') }}">Registro contable</a>
                    <a class="dropdown-item" href="{{ route('mantenedor_usuarios') }}">Usuarios</a>
                </div>
            </li> 

            <!-- módulo ayuda -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Historial
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('historial.index') }}">Listar</a>
                    <a class="dropdown-item" href="#">Filtrar</a>
                </div>
            </li>

        </ul>

        <!-- formulario búsqueda -->
        <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('home') }}">
            <input class="form-control mr-sm-2" type="search" name="search" placeholder="Buscar" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
        </form>

    </div>
</nav>