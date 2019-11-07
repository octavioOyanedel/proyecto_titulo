@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            @include('partials.alertas')

            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Agregar Estudio Realizado Socio</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- Formulario -->
                    <form method="POST" action="{{ route('estudios.store') }}">
                        
                        @csrf

                        @include('partials.components.elementos.estudio.grado_academico')
                        @include('partials.components.elementos.estudio.institucion')                    
                        @include('partials.components.elementos.estudio.estado')
                        @include('partials.components.elementos.estudio.titulo')

                        <input name="socio_id" type="hidden" value="{{ request()->route()->id }}">

                        <!-- Botón submit -->
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button id="incorporar" type="submit" class="btn btn-primary">
                                    {{ __('Agregar') }}
                                </button>
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