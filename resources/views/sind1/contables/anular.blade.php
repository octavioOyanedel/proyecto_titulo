@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-9">

            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Anular Registro</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">
                    <!-- Formularios -->
                    <h4 class="text-center">Registro Exixtente</h4>
                    <form method="POST" action="">

                        @csrf

                        <!-- Botón submit -->
                        <div class="form-group row mb-0">
                            <div id="anular_existente" class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Anular') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <h4 class="text-center">Registro Nuevo</h4>
                    <form method="POST" action="{{ route('anular_registro') }}">

                        @csrf

                        @include('partials.components.elementos.contable.cuentas')
                        @include('partials.components.elementos.contable.tipo_registro_anular')
                        @include('partials.components.elementos.contable.numero_registro_anular')
                        @include('partials.components.elementos.contable.cheque_anular')
                        @include('partials.components.elementos.contable.detalle')

                        <!-- Botón submit -->
                        <div class="form-group row mb-0">
                            <div id="anular" class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Anular') }}
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