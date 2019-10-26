@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Registrar Egreso - Ingreso</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- Formulario -->
                    <form method="POST" action="">
                        @csrf

                        @include('partials.components.elementos.contable.fecha_solicitud')
                        @include('partials.components.elementos.contable.numero_registro')
                        @include('partials.components.elementos.prestamo.cheque')
                        @include('partials.components.elementos.prestamo.monto')
                        @include('partials.components.elementos.contable.tipo_registro')
                        @include('partials.components.elementos.contable.cuentas')
                        @include('partials.components.elementos.contable.conceptos')
                        @include('partials.components.elementos.contable.socios')
                        @include('partials.components.elementos.contable.asociados')

                        <!-- Botón submit -->
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>                                                                                                                 <!-- fin form -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection