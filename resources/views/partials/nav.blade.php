
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light shadow p-3 mb-5 bg-white rounded">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <!-- inicio -->
            <li class="nav-item mr-4">
                <a class="nav-link p-0 mt-1 text-secundary" href="{{ route('home') }}"><span class="">@svg('home')</span><span class="sr-only">(current)</span></a>
            </li>

            <!-- módulo sesion -->
            <li class="nav-item dropdown mr-4">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    Hola, <span class="font-weight-bold text-dark">{{ Auth::user()->nombre1 }}</span> <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item sub-item" href="{{ route('usuarios.edit', Auth::user()) }}">Actualizar Datos</a>
                    <a class="dropdown-item sub-item" href="{{ route('passwords', Auth::user()) }}">Cambiar Contraseña</a>
                    <a class="dropdown-item sub-item" href=""
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Salir') }}<span class="float-right text-secundary">@svg('salir')</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>

            <!-- módulo socios -->
            <li class="nav-item dropdown mr-3">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span id="span-socios">Socios</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @if(Auth::user()->rol_id != 'Invitado')
                        <a class="dropdown-item sub-item" href="{{ route('socios.create') }}">Agregar</a>
                    @endif
                    <a class="dropdown-item sub-item" href="{{ route('home') }}">Listar</a>
                    <a class="dropdown-item sub-item" href="{{ route('filtro_socios_form') }}">Filtrar</a>
                </div>
            </li>

            <!-- módulo socios -->
            <li class="nav-item dropdown mr-3">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span id="span-cargas">Cargas Familiares</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item sub-item" href="{{ route('cargas.index') }}">Listar</a>
                </div>
            </li>

            <!-- módulo préstamos -->
            <li class="nav-item dropdown mr-3">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span id="span-prestamos">Préstamos</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @if(Auth::user()->rol_id != 'Invitado')
                        <a class="dropdown-item sub-item" href="{{ route('prestamos.create') }}">Solicitar</a>
                    @endif
                    <a class="dropdown-item sub-item" href="{{ route('prestamos.index') }}">Listar</a>
                    <a class="dropdown-item sub-item" href="{{ route('filtro_prestamos_form') }}">Filtrar</a>
                </div>
            </li>

            <!-- módulo registros contables -->
            <li class="nav-item dropdown mr-3">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span id="span-contables">Registros Contables</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @if(Auth::user()->rol_id != 'Invitado')
                        <a class="dropdown-item sub-item" href="{{ route('contables.create') }}">Registrar</a>
                    @endif
                    <a class="dropdown-item sub-item" href="{{ route('contables.index') }}">Listar</a>
                    <a class="dropdown-item sub-item" href="{{ route('filtro_contables_form') }}">Filtrar</a>
                    @if(Auth::user()->rol_id != 'Invitado')
                        <a class="dropdown-item sub-item" href="{{ route('crear_conciliacion') }}">Conciliación Bancaria</a>
                        <a class="dropdown-item sub-item" href="{{ route('anular_registro_form') }}">Anular Registro</a>
                    @endif
                </div>
            </li>

            <!-- módulo registros contables -->
            <li class="nav-item dropdown mr-3">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span id="span-estadisticas">Estadísticas</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item sub-item" href="{{ route('estadisticas_sede_area') }}">Socios por Sede - Área</a>
                    <a class="dropdown-item sub-item" href="{{ route('estadisticas_cargo') }}">Socios por Cargo</a>
                    <a class="dropdown-item sub-item" href="{{ route('estadisticas_comuna_ciudad') }}">Socios por Comuna - Ciudad</a>
                    <a class="dropdown-item sub-item" href="{{ route('estadisticas_nacionalidad') }}">Socios por Nacionalidad</a>
                    <a class="dropdown-item sub-item" href="{{ route('estadisticas_incorporados_desvinculados') }}">Socios por Incorporación - Desvinculación</a>
                    <a class="dropdown-item sub-item" href="{{ route('estadisticas_estudio') }}">Socios Según Nivel Educacional</a>
                    <a class="dropdown-item sub-item" href="{{ route('estadisticas_carga') }}">Cargas Familiares</a>
                </div>
            </li>

            @if(Auth::user()->rol_id === 'Administrador')
                <!-- módulo historial -->
                <li class="nav-item dropdown mr-3">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span id="span-historial">Historial</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item sub-item" href="{{ route('historial.index') }}">Listar</a>
                        <a class="dropdown-item sub-item" href="{{ route('filtro_historial_form') }}">Filtrar</a>
                    </div>
                </li>
            @endif

            @if(Auth::user()->rol_id != 'Invitado')
            <!-- módulo usuarios -->
                <li class="nav-item dropdown mr-3">
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
            @endif

        </ul>

        @include('partials.components.nav.buscar')

    </div>
</nav>