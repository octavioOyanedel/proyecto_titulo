@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">

            @include('partials.alertas')

            <div class="card">
                <div class="card-header text-center">
                    <h3 class="mb-0">Nuevo Usuario</h3>
                </div>

                <div class="card-body shadow-lg p-3 bg-white rounded">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- Formulario -->
                    <form method="POST" action="{{ route('usuarios.store') }}">
                        @csrf
                        
                        @include('partials.components.elementos.usuario.nombre1') 
                        @include('partials.components.elementos.usuario.nombre2') 
                        @include('partials.components.elementos.usuario.apellido1') 
                        @include('partials.components.elementos.usuario.apellido2') 
                        @include('partials.components.elementos.usuario.correo')
                        <hr>
                        @include('partials.components.elementos.usuario.pass')  
                        @include('partials.components.elementos.usuario.confirmar_pass')  
                        <hr>
                        @include('partials.components.elementos.usuario.roles')  
                        <!-- Botón submit -->
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button id="incorporar" type="submit" class="btn btn-primary" disabled="true">
                                    {{ __('Agregar') }}
                                </button>
                            </div>
                        </div>
                    </form>                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
