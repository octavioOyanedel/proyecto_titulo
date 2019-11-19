@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Editar Usuario</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">

                    <!-- Formulario -->
                    <form method="POST" action="{{ route('usuarios.update', $usuario) }}">   

                        @csrf
                        @method('PUT')

                        @include('partials.components.elementos.usuario.nombre1') 
                        @include('partials.components.elementos.usuario.nombre2') 
                        @include('partials.components.elementos.usuario.apellido1') 
                        @include('partials.components.elementos.usuario.apellido2') 
                        @include('partials.components.elementos.usuario.correo')
                        @include('partials.components.elementos.usuario.roles')  

                        <input type="hidden" name="email_original" value="{{ $usuario->email }}">
                        <!-- Botón submit -->
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button id="incorporar" type="submit" class="btn btn-primary" disabled="true">
                                    {{ __('Editar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- fin form -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection