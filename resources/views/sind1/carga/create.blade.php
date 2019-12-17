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
                        <input name="desde" type="hidden" value="{{ request()->route()->desde }}">
                            @if(request()->route()->desde != '' && request()->route()->desde != null)
                                @if(request()->route()->desde === 'create')
                                    <div class="text-center">
                                        <button id="incorporar" type="submit" class="btn btn-primary mt-2" disabled>{{ __('Agregar Carga') }}</button>
                                        <a class="btn btn-success mt-2 mr-2 ml-2" href="{{ route('estudios.create', ['id'=>request()->route()->id, 'desde'=>request()->route()->desde]) }}" role="button">Continuar y Agregar Estudio</a>
                                        <a class="btn btn-secondary mt-2" href="{{ route('home') }}" role="button">Finalizar Registro Socio</a>
                                    </div>
                                @else
                                    <!-- Botón submit -->
                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button id="incorporar" type="submit" class="btn btn-primary" disabled>{{ __('Agregar Carga') }}</button>
                                        </div>
                                    </div>
                                @endif
                            @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection