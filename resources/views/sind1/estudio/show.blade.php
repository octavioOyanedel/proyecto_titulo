@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">

            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Eliminar Nivel Educacional</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">
                    
                    <div class="text-center alertas alert alert-danger alert-dismissible fade show" role="alert">
                        <h4>Información Importante</h4>
                        <strong class="icono-alerta">Si elimina este registro no estará visible en ninguna de las tablas del modulo de estudios realizados.</strong>
                    </div>
                    <p class="text-center">¿Desea continuar con la eliminación de este estudio realizado <b>{{ $estudioRealizado->grado_academico_id }} {{ $estudioRealizado->institucion_id }} {{ $estudioRealizado->estado_grado_academico_id }} {{ $estudioRealizado->titulo_id }}</b>?</p>
                    <!-- Formulario -->
                    <form class="text-center" method="POST" action="{{ route('estudios.destroy', $estudioRealizado->id) }}">
                        
                        @csrf
                        @method('DELETE')                   

                        <a class="btn btn-secondary" href="{{ route('socios.show', $estudioRealizado->obtenerEstudioRealizadoSocio($estudioRealizado->id)->socio_id ) }}" role="button">Cancelar</a>
                        <button type="submit" class="btn btn-danger">Aceptar</button>      
                    </form>   
                </div>

            </div>
        </div>
    </div>
</div>
@endsection