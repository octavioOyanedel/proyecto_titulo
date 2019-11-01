@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Usuarios</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if($usuarios->count() === 0)
                        <div class="alert alert-warning mt-4 text-center" role="alert">
                            <b>No existen registros.</b>
                        </div>
                    @else                     
                        <div class="table-responsive">
                            <table class="table table-hover data-tables" id="tabla-usuarios">
                                <thead>
                                    <tr>
                                        <th class="text-center text-success" scope="col" title=""></th>
                                        <th class="text-center text-success" scope="col" title=""></th>
                                        <th class="text-center text-success" scope="col" title=""></th>
                                        <th class="text-center text-success" scope="col" title=""></th>
                                        <th scope="col">Usuario</th>
                                        <th scope="col">Correo</th>
                                        <th scope="col">Rol</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($usuarios as $u)
                                        <tr>
                                            <td class="text-center" with="50" scope="row" title="Ver detalle usuario"><a class="text-primary" href="{{ route('usuarios.show', $u) }}"><span>@svg('ver')</span></a></td>
                                            <td class="text-center" with="50" scope="row" title="Editar usuario"><a class="text-secondary" href="{{ route('usuarios.edit', $u) }}"><span>@svg('editar')</span></a></td>
                                            <td class="text-center" with="50" scope="row" title="Cambiar contraseña"><a class="text-warning" href="{{ route('usuarios.editPassword', $u) }}"><span>@svg('pass')</span></a></td>
                                            <td class="text-center" with="50" scope="row" title="Eliminar usuario"><a class="text-danger" data-toggle="modal" data-target="#eliminar_usuario" href="#"><span>@svg('eliminar')</span></a></td>
                                            <td>{{ $u->apellido1 }} {{ $u->apellido2 }}, {{ $u->nombre1 }} {{ $u->nombre2 }}</td>
                                            <td>{{ $u->email }}</td>
                                            <td>{{ $u->rol_id }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>                      
                        </div>
                    @endif 
                </div>
            </div>
        </div>
    </div>
</div>

@include('partials.modals.eliminar_usuario') 

@endsection