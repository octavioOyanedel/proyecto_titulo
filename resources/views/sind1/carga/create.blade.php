@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">

            @include('partials.alertas')

            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Agregar Carga Familiar</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">

                    <!-- Formulario -->
                    <form method="POST" action="{{ route('cargas.store') }}">
                        @csrf

                        @include('partials.components.elementos.carga.rut')
                        @include('partials.components.elementos.carga.nombre1')
                        @include('partials.components.elementos.carga.nombre2')
                        @include('partials.components.elementos.carga.apellido1')
                        @include('partials.components.elementos.carga.apellido2')
                        @include('partials.components.elementos.carga.fecha_nac')
                        @include('partials.components.elementos.carga.parentesco')

                        <input name="socio_id" type="hidden" value="{{ request()->route()->id }}">


                        <!-- Botón submit -->
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button id="incorporar" type="submit" class="btn btn-primary" disabled>
                                    {{ __('Agregar') }}
                                </button>
                                <a class="btn btn-success" href="{{ route('estudios.create', ['id'=>request()->route()->id]) }}" role="button">Agregar Estudio</a>
                                <a class="btn btn-secondary" href="{{ route('home') }}" role="button">Finalizar</a>
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection