@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            @include('partials.alertas')

            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Editar Egreso - Ingreso</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">

                    <!-- Formulario -->
                    <form method="POST" action="{{ route('contables.update', $registro->id) }}">
                        @csrf
                        @method('PUT')

                        @include('partials.components.elementos.contable.fecha_solicitud')
                        @include('partials.components.elementos.contable.tipo_registro')
                        @include('partials.components.elementos.contable.numero_registro')
                        @include('partials.components.elementos.contable.cheque')
                        @include('partials.components.elementos.contable.monto')
                        @include('partials.components.elementos.contable.cuentas')
                        @include('partials.components.elementos.contable.concepto')
                        @include('partials.components.elementos.contable.detalle')
                        @include('partials.components.elementos.contable.socios')
                        @include('partials.components.elementos.contable.asociados')
                        <input id="usuario_id" name="usuario_id" type="hidden" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="numero_registro_original" value="{{ $registro->numero_registro }}">
                        <input type="hidden" name="tipo_registro_contable_original" value="{{ $registro->getOriginal('tipo_registro_contable_id') }}">
                        <input type="hidden" name="cheque_original" value="{{ $registro->cheque }}">

                        <!-- Botón submit -->
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button id="incorporar" type="submit" class="btn btn-primary">
                                    {{ __('Editar') }}
                                </button>
                            </div>
                        </div>
                        <!-- fin form -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection