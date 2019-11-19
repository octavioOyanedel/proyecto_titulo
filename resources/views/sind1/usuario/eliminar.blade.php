@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">

            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Eliminar Usuario</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">
                    
                    <div class="text-center alertas alert alert-danger" role="alert">
                        <h4>Información Importante</h4>
                        <strong class="icono-alerta">Si elimina este registro no podrá acceder al sistema despues del próximo cierre de sesión.</strong>
                    </div>
                    <!-- Formulario -->
                    <form class="text-center" method="POST" action="{{ route('usuarios.destroy', $usuario) }}">
                        
                        @csrf
                        @method('DELETE')   

                        <p class="text-center">¿Desea continuar con la desvinculación del usuario <b>{{ $usuario->nombre1 }} {{ $usuario->apellido1 }}</b>?</p>

                        <a class="btn btn-secondary" href="{{ route('usuarios.index') }}" role="button">Cancelar</a>
                        <button type="submit" class="btn btn-danger">Aceptar</button>      
                    </form>   
                </div>

            </div>
        </div>
    </div>
</div>
@endsection