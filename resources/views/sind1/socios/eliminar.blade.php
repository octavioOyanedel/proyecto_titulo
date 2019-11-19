@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">

            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Descincular Socio</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">
                    
                    <div class="text-center alertas alert alert-danger" role="alert">
                        <h4>Información Importante</h4>
                        <strong class="icono-alerta">Si elimina este registro no estará visible en ninguna de las tablas del modulo de socios.</strong>
                    </div>
                    <!-- Formulario -->
                    <form class="text-center" method="POST" action="{{ route('socios.destroy', $socio) }}">
                        
                        @csrf
                        @method('DELETE')   
                        <p class="text-center">¿Desea continuar con la desvinculación del socio <b>{{ $socio->nombre1 }} {{ $socio->apellido1 }}</b>?</p>
                        <p class="text-center">Seleccione motivo de desvinculación</p>
                        @include('partials.components.elementos.socio.situacion_desvincular')
                        <input type="hidden" name="user_id" value="{{ $socio->id }}">
                        <a class="btn btn-secondary" href="{{ route('home') }}" role="button">Cancelar</a>
                        <button type="submit" class="btn btn-danger">Aceptar</button>      
                    </form>   
                </div>

            </div>
        </div>
    </div>
</div>
@endsection