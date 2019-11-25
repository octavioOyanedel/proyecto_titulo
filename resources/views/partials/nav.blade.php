
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
                    <a class="dropdown-item sub-item" href="{{ route('mantenedor_estudio_nivel') }}">Nivel Educacional</a>
                    <a class="dropdown-item sub-item" href="{{ route('mantenedor_prestamo_forma_pago') }}">Préstamos</a>    
                    <a class="dropdown-item sub-item" href="{{ route('mantenedor_contable_cuenta') }}">Registros Contables</a>                                     
                </div>
            </li>
        </ul>

        @include('partials.components.nav.buscar')     

    </div>
</nav>