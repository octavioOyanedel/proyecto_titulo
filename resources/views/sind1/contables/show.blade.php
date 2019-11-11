@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Detalle Registro Contable</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h4>Información registro contable</h4>
                    <div class="table-responsive">                     
                        <table class="table table-hover table-bordered table-stripred">
                            <thead></thead>
                            <tbody>
                                <tr><th>Registrado por</th>
                                <td>{{ $registroContable->usuario->nombre1 }} {{ $registroContable->usuario->nombre2 }} {{ $registroContable->usuario->apellido1 }} {{ $registroContable->usuario->apellido1 }}</td></tr>
                                <tr><th>Fecha de solicitud</th><td>{{ $registroContable->fecha }}</td></tr>
                                <tr><th>Tipo de registro</th><td>{{ $registroContable->tipo_registro_contable_id }}</td></tr>
                                <tr><th>Concepto</th><td>{{ $registroContable->concepto_id }}, {{ $registroContable->socio->nombre1 }} {{ $registroContable->socio->apellido2 }} {{ $registroContable->asociado_id }}</td></tr>
                                <tr><th>Detalle</th><td>{{ $registroContable->detalle }}</td></tr>
                                <tr><th>Número de registro</th><td>{{ $registroContable->numero_registro }}</td></tr>
                                <tr><th>Cheque</th><td>{{ $registroContable->cheque }}</td></tr>
                                <tr><th>Monto</th><td>{{ $registroContable->monto }}</td></tr>
                                <tr><th>Cuenta</th><td>{{ $registroContable->cuenta->tipo_cuenta_id }} N° {{ $registroContable->cuenta->numero }}</td></tr>
                                <tr><th>Banco</th><td> {{ $registroContable->cuenta->banco_id }}</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
