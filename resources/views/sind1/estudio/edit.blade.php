@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="text-center card-header"><h3 class="mb-0">Editar Estudio Realizado Socio</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">

                    <!-- Formulario -->
                    <form method="POST" action="{{ route('estudios.update', $estudioRealizado->id) }}">
                        @csrf
                        @method('PUT')

                        @include('partials.components.elementos.estudio.grado_academico')
                        @include('partials.components.elementos.estudio.institucion')                    
                        @include('partials.components.elementos.estudio.estado')
                        @include('partials.components.elementos.estudio.titulo')   

                        <input type="hidden" name="socio_id" value="{{ $socio_id }}">                    
                        <input type="hidden" name="grado_original" value="{{ $estudioRealizado->getOriginal('grado_academico_id') }}">       
                        <input type="hidden" name="institucion_original" value="{{ $estudioRealizado->getOriginal('institucion_id') }}">       

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