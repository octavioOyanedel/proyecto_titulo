@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Mantenedor Estudios Realizados</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h4 class="mt-4"></h4>

                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-nivel-tab" data-toggle="tab" href="#nav-nivel" role="tab" aria-controls="nav-nivel" aria-selected="true">Nivel educacional</a>
                            <a class="nav-item nav-link" id="nav-institucion-tab" data-toggle="tab" href="#nav-institucion" role="tab" aria-controls="nav-institucion" aria-selected="true">Institución educacional</a>
                            <a class="nav-item nav-link" id="nav-estado-tab" data-toggle="tab" href="#nav-estado" role="tab" aria-controls="nav-estado" aria-selected="true">Estado</a>
                            <a class="nav-item nav-link" id="nav-titulo-tab" data-toggle="tab" href="#nav-titulo" role="tab" aria-controls="nav-titulo" aria-selected="true">Título</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        @include('partials.components.mantenedores.estudios.nivel')
                        @include('partials.components.mantenedores.estudios.institucion')
                        @include('partials.components.mantenedores.estudios.estado')
                        @include('partials.components.mantenedores.estudios.titulo')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@include('partials.modals.eliminar_nivel')
@include('partials.modals.eliminar_institucion')
@include('partials.modals.eliminar_estado_nivel')
@include('partials.modals.eliminar_titulo')