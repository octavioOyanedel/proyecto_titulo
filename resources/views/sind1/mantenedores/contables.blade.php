@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3 class="mb-0">Mantenedor Registros Contables</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h4 class="mt-4"></h4>

                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-cuenta-tab" data-toggle="tab" href="#nav-cuenta" role="tab" aria-controls="nav-cuenta" aria-selected="true">Cuenta</a>
                            <a class="nav-item nav-link" id="nav-concepto-tab" data-toggle="tab" href="#nav-concepto" role="tab" aria-controls="nav-concepto" aria-selected="true">Concepto</a>
                            <a class="nav-item nav-link" id="nav-asociado-tab" data-toggle="tab" href="#nav-asociado" role="tab" aria-controls="nav-asociado" aria-selected="true">Asociado</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        @include('partials.components.mantenedores.contables.cuenta')
                        @include('partials.components.mantenedores.contables.concepto')
                        @include('partials.components.mantenedores.contables.asociado')
                    </div>                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection