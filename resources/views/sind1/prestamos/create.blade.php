@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            @include('partials.alertas')
            
            <div class="card">

                <div class="card-header text-center"><h3 class="mb-0">Solicitar Préstamo</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- Formulario -->
                    <form method="POST" action="{{ route('simulacion') }}">
                        @csrf

                        @include('partials.components.elementos.prestamo.rut') 
                        @include('partials.components.elementos.prestamo.fecha_solicitud')
                        @include('partials.components.elementos.prestamo.numero_egreso')
                        @include('partials.components.elementos.prestamo.cuenta')
                        @include('partials.components.elementos.prestamo.metodos_pago')
                        @include('partials.components.elementos.prestamo.cheque')
                        @include('partials.components.elementos.prestamo.fecha_pago_deposito')
                        @include('partials.components.elementos.prestamo.monto')
                        @include('partials.components.elementos.prestamo.cuotas')

                        <input id="socio_id" name="socio_id" type="hidden" value="">

                        <!-- Botón submit -->
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button id="incorporar" type="submit" class="btn btn-primary" disabled="true">
                                    {{ __('Simular') }}
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
