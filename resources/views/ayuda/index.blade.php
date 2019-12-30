@extends('layouts.app')

@section('content')

<div class="ml-5 mr-5">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Documentación</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">

                	{{-- índice --}}
                	<h3>Índice</h3>
					<ul class="list-unstyled">
						<li><a href="#barra_navegacion">1 Barra de Navegación</a>
							<ul class="list-unstyled ml-1">
								<li><a href="#modulos">1.1 Módulos</a>
									<ul class="list-unstyled ml-2">
										<li><a href="">1.1.1 Módulo Usuario Logeado</a>
											<ul class="list-unstyled ml-3">
												<li><a href="">1.1.1.1 Actualizar Datos</a></li>
												<li><a href="">1.1.1.2 Cambiar Contraseña</a></li>
												<li><a href="">1.1.1.3 Salir</a></li>
											</ul>
										</li>
										<li><a href="">1.1.2 Módulo Socios</a>
											<ul class="list-unstyled ml-3">
												<li><a href="">1.1.2.1 Incorporar</a>
													<ul class="list-unstyled ml-4">
														<li><a href="">1.1.2.1.1 Datos Socio</a></li>
														<li><a href="">1.1.2.1.2 Carga Familiar</a></li>
														<li><a href="">1.1.2.1.3 Nivel Educacional</a></li>
													</ul>
												</li>
												<li><a href="">1.1.2.2 Listar</a></li>
												<li><a href="">1.1.2.3 Filtrar</a></li>
											</ul>
										</li>
										<li><a href="">1.1.3 Módulo Cargas Familiares</a>
											<ul class="list-unstyled ml-3">
												<li><a href="">1.1.3.1 Listar</a></li>
											</ul>
										</li>
										<li><a href="">1.1.4 Módulo Préstamos</a>
											<li><a href="">1.1.4.1 Solicitar</a></li>
											<li><a href="">1.1.4.2 Listar</a></li>
											<li><a href="">1.1.4.3 Filtrar</a></li>
										</li>
										<li><a href="">1.1.5 Módulo Registros Contables</a>
											<ul class="list-unstyled ml-3">
												<li><a href="">1.1.5.1 Registrar</a></li>
												<li><a href="">1.1.5.2 Listar</a></li>
												<li><a href="">1.1.5.3 Filtrar</a></li>
												<li><a href="">1.1.5.4 Conciliación Bancaria</a></li>
												<li><a href="">1.1.5.5 Anular Registro</a></li>
											</ul>
										</li>
										<li><a href="">1.1.6 Módulo Estadísticas</a>
											<ul class="list-unstyled ml-3">
												<li><a href="">1.1.6.1 Socios por Sede – Área</a></li>
												<li><a href="">1.1.6.2 Socios por Cargo</a></li>
												<li><a href="">1.1.6.3 Socios por Comuna – Ciudad</a></li>
												<li><a href="">1.1.6.4 Socios por Nacionalidad</a></li>
												<li><a href="">1.1.6.5 Socios por Incorporación – Desvinculación</a></li>
												<li><a href="">1.1.6.6 Socios Según Nivel Educacional</a></li>
												<li><a href="">1.1.6.7 Cargas Familiares</a></li>
											</ul>
										</li>
										<li><a href="">1.1.7 Módulo Historial</a>
											<ul class="list-unstyled ml-3">
												<li><a href="">1.1.5.2 Listar</a></li>
												<li><a href="">1.1.5.3 Filtrar</a></li>
											</ul>
										</li>
										<li><a href="">1.1.8 Módulo Usuarios</a>
											<ul class="list-unstyled ml-3">
												<li><a href="">1.1.5.2 Agregar</a></li>
												<li><a href="">1.1.5.3 Filtrar</a></li>
											</ul>
										</li>
										<li><a href="">1.1.9 Módulo Mantenedor</a>
											<ul class="list-unstyled ml-3">
												<li><a href="">1.1.9.1 Socios</a></li>
												<li><a href="">1.1.9.2 Cargas Familiares</a></li>
												<li><a href="">1.1.9.3 Nivel Educacional</a></li>
												<li><a href="">1.1.9.4 Préstamos</a></li>
												<li><a href="">1.1.9.5 Registros Contables</a></li>
											</ul>
										</li>
										<li><a href="">1.1.10 Módulo Ayuda</a>
											<ul class="list-unstyled ml-3">
												<li><a href="">1.1.10.1 Documentación</a></li>
											</ul>
										</li>
									</ul>
								</li>
								<li><a href="">1.2 Búsqueda Rápida</a></li>
							</ul>
						</li>
						<li><a href="">2. Filtro de Listados</a>
							<ul class="list-unstyled ml-1">
								<li><a href="">2.1 Exportar a Excel</a></li>
								<li><a href="">2.2 Búsqueda Rápida</a></li>
							</ul>
						</li>
						<li><a href="">3. Roles de Usuario</a></li>
						<li><a href="">4. Recuperación de Contraseña por Correo Electrónico</a></li>
					</ul>

					{{-- contenido --}}
					<h3>Contenido</h3>
					<ul class="list-unstyled">
						<li>
							<a name="barra_navegacion"><b>1 Barra de Navegación:</b></a>
							<p><img src="{{ asset('images/nav.png') }}" class="rounded img-fluid" alt="Barra de navegación"></p>
							<p>Sección de la aplicación web desde la cual se puede acceder a los distintos módulos del sistema (estos módulos están disponibles según perfil de usuario, para mayor detalle ver XXX). Estos módulos son los siguientes: </p>
							<ol>
								<li>Usuario Logeado</li>
								<li>Socios</li>
								<li>Cargas Familiares</li>
								<li>Préstamos</li>
								<li>Registros Contables</li>
								<li>Estadísticas</li>
								<li>Historial</li>
								<li>Usuarios</li>
								<li>Mantenedor</li>
								<li>Ayuda</li>
							</ol>
							<ul class="list-unstyled ml-1">
								<li><a name="modulos"><b>1.1 Módulos</b></a>
									<p><img src="{{ asset('images/modulos.png') }}" class="rounded img-fluid" alt="Módulos"></p>
									<p>Estos enlaces permiten el ingreso las distintas funcionalidades con las que cuenta la aplicación web.</p>
									<ul class="list-unstyled ml-2">
										<li><a name=""><b>1.1.1 Módulo Usuario Logeado</b></a>
											<p><img src="{{ asset('images/m-usuario-logueado.png') }}" class="rounded img-fluid" alt="Módulo Usuario Logeado"></p>
											<p>Este módulo permite la edición de los datos personales y contraseña del usuario que actualmente se encuentra con sesión iniciada.</p>
											<ul class="list-unstyled ml-3">
												<li><a name=""><b>1.1.1.1 Actualizar Datos</b></a>
													<p><img src="{{ asset('images/f-actualizar-usuario.png') }}" class="rounded img-fluid" alt="Actualizar Datos de Usuario"></p>
													<p>Formulario permite actualizar los datos del usuario que actualmente esta logueado en el sistema.</p>
												</li>
												<li><a name=""><b>1.1.1.2 Cambiar Contraseña</b></a>
													<p><img src="{{ asset('images/f-modificar-pass-usuario.png') }}" class="rounded img-fluid" alt="Cambiar Contraseña de Usuario"></p>
													<p>Formulario permite actualizar la contraseña de usuario, las contraseñas deben tener como mínimo 8 caracteres alfanuméricos (solo números y letras).</p>
												</li>
												<li><a name=""><b>1.1.1.3 Salir</b></a>
													<p><img src="{{ asset('images/salir.png') }}" class="rounded img-fluid" alt="Módulo Usuario Logeado"></p>
													<p>Enlace que permite salir de la aplicación y cerrar sesión del sistema.</p>
												</li>
											</ul>
										</li>
										<li><a name=""><b>1.1.2 Módulo Socios</b></a>
												<p><img src="{{ asset('images/m-socios.png') }}" class="rounded img-fluid" alt="Módulo Usuario Logeado"></p>
												<p>Este módulo permite la incorporación, visualización, edición y eliminación de registros de socios, cargas familiares y estudios realizados.</p>
											<ul class="list-unstyled ml-3">
												<li><a name=""><b>1.1.2.1 Incorporar</b></a>
													<p>xxx.</p>
													<ul class="list-unstyled ml-4">
														<li><a name=""><b>1.1.2.1.1 Datos Socio</b></a>
															<p><img src="{{ asset('images/f-incorporar-socio.png') }}" class="rounded img-fluid" alt="Formulario Incorporar Socio"></p>
															<p></p>
														</li>
														<li><a name=""><b>1.1.2.1.2 Carga Familiar</b></a>
															<p><img src="{{ asset('images/f-incorporar-carga.png') }}" class="rounded img-fluid" alt="Formulario Incorporar Socio"></p>
															<p>xxx.</p>
														</li>
														<li><a name=""><b>1.1.2.1.3 Nivel Educacional</b></a>
															<p><img src="{{ asset('images/f-incorporar-estudio.png') }}" class="rounded img-fluid" alt="Formulario Incorporar Estudio"></p>
															<p>xxx.</p>
														</li>
													</ul>
												</li>
												<li><a name=""><b>1.1.2.2 Listar</b></a>
													<p><img src="{{ asset('images/listar-socio.png') }}" class="rounded img-fluid" alt="Listado de Socios"></p>
													<p>xxx.</p>
												</li>
												<li><a name=""><b>1.1.2.3 Filtrar</b></a>
													<p><img src="{{ asset('images/filtrar-socios.png') }}" class="rounded img-fluid" alt="Filtrado de Socios"></p>
													<p>xxx.</p>
												</li>
											</ul>
										</li>
										<li><a name=""><b>1.1.3 Módulo Cargas Familiares</b></a>
											<p><img src="{{ asset('images/m-cargas.png') }}" class="rounded img-fluid" alt="Módulo Cargas Familiares"></p>
											<p>xxx.</p>
											<ul class="list-unstyled ml-3">
												<li><a name=""><b>1.1.3.1 Listar</b></a>
													<p><img src="{{ asset('images/listar-cargas.png') }}" class="rounded img-fluid" alt="Listado de Cargas Familiares"></p>
													<p>xxx.</p>
												</li>
											</ul>
										</li>
										<li><a name=""><b>1.1.4 Módulo Préstamos</b></a>
											<li><a name=""><b>1.1.4.1 Solicitar</b></a></li>
											<li><a name=""><b>1.1.4.2 Listar</b></a></li>
											<li><a name=""><b>1.1.4.3 Filtrar</b></a></li>
										</li>
										<li><a name=""><b>1.1.5 Módulo Registros Contables</b></a>
											<ul class="list-unstyled ml-3">
												<li><a name=""><b>1.1.5.1 Registrar</b></a></li>
												<li><a name=""><b>1.1.5.2 Listar</b></a></li>
												<li><a name=""><b>1.1.5.3 Filtrar</b></a></li>
												<li><a name=""><b>1.1.5.4 Conciliación Bancaria</b></a></li>
												<li><a name=""><b>1.1.5.4 Anular Registro</b></a></li>
											</ul>
										</li>
										<li><a name=""><b>1.1.6 Módulo Estadísticas</b></a>
											<ul class="list-unstyled ml-3">
												<li><b><a name="">1.1.6.1 Socios por Sede – Área</b></a></li>
												<li><b><a name="">1.1.6.2 Socios por Cargo</b></a></li>
												<li><b><a name="">1.1.6.3 Socios por Comuna – Ciudad</b></a></li>
												<li><b><a name="">1.1.6.4 Socios por Nacionalidad</b></a></li>
												<li><b><a name="">1.1.6.5 Socios por Incorporación – Desvinculación</b></a></li>
												<li><b><a name="">1.1.6.6 Socios Según Nivel Educacional</b></a></li>
												<li><b><a name="">1.1.6.7 Cargas Familiares</b></a></li>
											</ul>
										</li>
										<li><a name=""><b>1.1.7 Módulo Historial</b></a>
											<ul class="list-unstyled ml-3">
												<li><a name=""><b>1.1.5.2 Listar</b></a></li>
												<li><a name=""><b>1.1.5.3 Filtrar</b></a></li>
											</ul>
										</li>
										<li><a name=""><b>1.1.8 Módulo Usuarios</b></a>
											<ul class="list-unstyled ml-3">
												<li><a name=""><b>1.1.5.2 Agregar</b></a></li>
												<li><a name=""><b>1.1.5.3 Filtrar</b></a></li>
											</ul>
										</li>
										<li><a name=""><b>1.1.9 Módulo Mantenedor</b></a>
											<ul class="list-unstyled ml-3">
												<li><a name=""><b>1.1.9.1 Socios</b></a></li>
												<li><a name=""><b>1.1.9.2 Cargas Familiares</b></a></li>
												<li><a name=""><b>1.1.9.3 Nivel Educacional</b></a></li>
												<li><a name=""><b>1.1.9.4 Préstamos</b></a></li>
												<li><a name=""><b>1.1.9.5 Registros Contables</b></a></li>
											</ul>
										</li>
										<li><a name=""><b>1.1.10 Módulo Ayuda</b></a>
											<ul class="list-unstyled ml-3">
												<li><a name=""><b>1.1.10.1 Documentación</b></a></li>
											</ul>
										</li>
									</ul>
								</li>
								<li><a name=""><b>1.2 Búsqueda Rápida</b></a></li>
							</ul>
						</li>
						<li><a name=""><b>Filtro de Listados</b></a>
							<ul class="list-unstyled ml-1">
								<li><b><a name="">2.1 Exportar a Excel</b></a></li>
								<li><b><a name="">2.2 Búsqueda Rápida</b></a></li>
							</ul>
						</li>
						<li><b><a name="">3 Roles de Usuario</b></a></li>
						<li><b><a name="">4 Recuperación de Contraseña por Correo Electrónico</b></a></li>
					</ul>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
