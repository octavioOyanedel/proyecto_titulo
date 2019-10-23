@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3 class="mb-0">Mantenedor Prestamos</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h4 class="mt-4"></h4>

                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-forma-pago-tab" data-toggle="tab" href="#nav-forma-pago" role="tab" aria-controls="nav-forma-pago" aria-selected="true">Forma de pago</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        @include('partials.components.mantenedores.prestamos.forma_pago')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@include('partials.modals.eliminar_forma_pago')