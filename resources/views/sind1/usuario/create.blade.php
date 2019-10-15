@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header"><h3 class="mb-0">Nuevo Usuario</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- Formulario -->
                    <form method="POST" action="">
                        @csrf
                        
                        @include('partials.components.elementos.socio.nombre1') 
                        @include('partials.components.elementos.socio.nombre2') 
                        @include('partials.components.elementos.socio.apellido1') 
                        @include('partials.components.elementos.socio.apellido2') 
                        @include('partials.components.elementos.usuario.correo')
                        @include('partials.components.elementos.usuario.roles')       
                        @include('partials.components.elementos.usuario.pass')  
                        @include('partials.components.elementos.usuario.confirmar_pass')                     

                        <!-- Botón submit -->
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Agregar') }}
                                </button>
                            </div>
                        </div>                                                                                                                 <!-- fin form -->
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
