@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @include('partials.alertas')

            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Mantenedor Registros Contables</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">

                    <h4 class="mt-4"></h4>

                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-cuenta-tab" data-toggle="tab" href="#nav-cuenta" role="tab" aria-controls="nav-cuenta" aria-selected="true">Cuenta</a>
                            <a class="nav-item nav-link" id="nav-concepto-tab" data-toggle="tab" href="#nav-concepto" role="tab" aria-controls="nav-concepto" aria-selected="true">Concepto</a>
                            <a class="nav-item nav-link" id="nav-asociado-tab" data-toggle="tab" href="#nav-asociado" role="tab" aria-controls="nav-asociado" aria-selected="true">Asociado</a>
                            <a class="nav-item nav-link" id="nav-banco-tab" data-toggle="tab" href="#nav-banco" role="tab" aria-controls="nav-banco" aria-selected="true">Banco</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        @include('partials.components.mantenedores.contables.cuenta')
                        @include('partials.components.mantenedores.contables.concepto')
                        @include('partials.components.mantenedores.contables.asociado')
                        @include('partials.components.mantenedores.contables.banco')
                    </div>                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection