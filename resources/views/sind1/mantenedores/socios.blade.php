@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3 class="mb-0">Mantenedor Socios</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h4 class="mt-4"></h4>

                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-sede-tab" data-toggle="tab" href="#nav-sede" role="tab" aria-controls="nav-sede" aria-selected="true">Sede</a>
                            <a class="nav-item nav-link" id="nav-area-tab" data-toggle="tab" href="#nav-area" role="tab" aria-controls="nav-area" aria-selected="false">Área</a>
                            <a class="nav-item nav-link" id="nav-cargo-tab" data-toggle="tab" href="#nav-cargo" role="tab" aria-controls="nav-cargo" aria-selected="false">Cargo</a>
                            <a class="nav-item nav-link" id="nav-estado-tab" data-toggle="tab" href="#nav-estado" role="tab" aria-controls="nav-estado" aria-selected="false">Estado socio</a>
                            <a class="nav-item nav-link" id="nav-nacionalidad-tab" data-toggle="tab" href="#nav-nacionalidad" role="tab" aria-controls="nav-nacionalidad" aria-selected="false">Nacionalidad</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        @include('partials.components.mantenedores.socios.sede')
                        @include('partials.components.mantenedores.socios.area')
                        @include('partials.components.mantenedores.socios.cargo')
                        @include('partials.components.mantenedores.socios.estado')
                        @include('partials.components.mantenedores.socios.nacion')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@include('partials.modals.eliminar_sede')
@include('partials.modals.eliminar_area')
@include('partials.modals.eliminar_cargo')
@include('partials.modals.eliminar_estado_socio')
@include('partials.modals.eliminar_nacionalidad')