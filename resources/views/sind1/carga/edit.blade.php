@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Editar Carga Familiar</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">

                    <!-- Formulario -->
                    <form method="POST" action="{{ route('cargas.update', $cargaFamiliar->id) }}">
                        @csrf
                        @method('PUT')

                        @include('partials.components.elementos.carga.rut')
                        @include('partials.components.elementos.carga.nombre1')
                        @include('partials.components.elementos.carga.nombre2')
                        @include('partials.components.elementos.carga.apellido1')
                        @include('partials.components.elementos.carga.apellido2')
                        @include('partials.components.elementos.carga.fecha_nac')
                        <input type="hidden" name="socio_id" value="{{ $cargaFamiliar->getOriginal('socio_id') }}">                        
                        @include('partials.components.elementos.carga.parentesco')
                        <input type="hidden" name="rut_original" value="{{ $cargaFamiliar->getOriginal('rut') }}">

                        <!-- Botón submit -->
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Editar') }}
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