@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            @include('partials.alertas')

            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Usuarios</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">

                    @if($usuarios->count() === 0)
                        <div class="alert alert-warning mt-4 text-center" role="alert">
                            <b>No existen registros.</b>
                        </div>
                    @else
                    <div>
                        @include('partials.components.filtros.usuarios')
                    </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th colspan="4"></th>
                                        <th scope="col">Usuario</th>
                                        <th scope="col">Correo</th>
                                        <th scope="col">Rol</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($usuarios as $us)
                                        <tr>
                                            <td class="text-center" with="50" scope="row" title="Ver detalle usuario"><a class="text-primary" href="{{ route('usuarios.show', $us->id) }}"><span>@svg('ver')</span></a></td>
                                            <td class="text-center" with="50" scope="row" title="Editar usuario"><a class="text-secondary" href="{{ route('usuarios.edit', $us->id) }}"><span>@svg('editar')</span></a></td>
                                            <td class="text-center" with="50" scope="row" title="Cambiar contraseña"><a class="text-warning" href="{{ route('passwords', ['id' => $us->id]) }}"><span>@svg('pass')</span></a></td>
                                            <td class="text-center" with="50" scope="row" title="Eliminar usuario"><a class="text-danger" href="{{ route('eliminar_usuario_form',$us->id) }}"><span>@svg('eliminar')</span></a></td>
                                            <td>@if($us->apellido2 != null) {{ $us->apellido1 }} {{ $us->apellido2 }}, @else {{ $us->apellido1 }}, @endif {{ $us->nombre1 }} {{ $us->nombre2 }}</td>
                                            <td>{{ $us->email }}</td>
                                            <td>{{ $us->rol_id }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="float-right mt-3">
                            {{ $usuarios->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection