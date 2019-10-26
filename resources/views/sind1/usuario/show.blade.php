@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Detalle Usuario</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h4>Información personal</h4>
                    <div class="table-responsive">                     
                        <table class="table table-hover">
                            <thead></thead>
                            <tbody>
                                <tr><th>Nombre</th>
                                <td>{{ $usuario->nombre1 }} {{ $usuario->nombre2 }} {{ $usuario->apellido1 }} {{ $usuario->apellido2 }}</td></tr>
                                <tr><th>Correo</th><td>{{ $usuario->email }}</td></tr>
                                <tr><th>Rol</th><td>{{ $usuario->rol_id }}</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection