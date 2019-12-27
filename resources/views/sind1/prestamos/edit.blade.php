@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            @include('partials.alertas')

            <div class="card">

                <div class="card-header text-center"><h3 class="mb-0">Editar Préstamo</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">

                    <!-- Formulario -->
                    <form method="POST" action="{{ route('prestamos.update',$prestamo) }}">

                        @csrf
                        @method('PUT')

                        @include('partials.components.elementos.prestamo.numero_egreso')
                        @include('partials.components.elementos.prestamo.cuenta')
                        @include('partials.components.elementos.prestamo.cheque')

                        <input name="prestamo_id" type="hidden" value="{{ $prestamo->id }}">
                        <input name="numero_registro_original" type="hidden" value="{{ $prestamo->numero_egreso }}">
                        <input name="cheque_original" type="hidden" value="{{ $prestamo->cheque }}">

                        <!-- Botón submit -->
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button id="incorporar" type="submit" class="btn btn-primary">
                                    {{ __('Editar') }}
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