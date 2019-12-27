@extends('layouts.app')

@section('content')

<div class="ml-5 mr-5">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Documentación</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">

                	<a href=""><h3>1. Barra de Navegación</h3></a>
                		<img src="{{ asset('images/nav.png') }}" class="rounded img-fluid" alt="Barra de navegación">
	                	<a href=""><h4>1.1 Módulos</h4></a>
	                		<img src="{{ asset('images/modulos.png') }}" class="rounded img-fluid" alt="Módulos">
	                	<a href=""><h4>1.2 Búsqueda Rápida</h4></a>
	                		<img src="{{ asset('images/busqueda.png') }}" class="rounded img-fluid" alt="Búsqueda rápida">

					<a href=""><h3>2. Filtro de Listados</h3></a>
						<a href=""><h4>2.1 Exportar a Excel</h4></a>
						<a href=""><h4>2.2 Filtro de Tabla</h4></a>

					<a href=""><h3>3. Roles de Usuario</h3></a>

					<a href=""><h3>4. Recuperación de Contraseña</h3></a>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
