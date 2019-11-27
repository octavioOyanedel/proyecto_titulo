@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Detalle Registro Contable</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">

                    <h4>Información Registro Contable</h4>
                    <div class="table-responsive">                     
                        <table class="table table-hover table-bordered table-stripred">
                            <thead></thead>
                            <tbody>
                                <tr><th>Registrado por</th>
                                <td>{{ $registroContable->usuario->nombre1 }} {{ $registroContable->usuario->nombre2 }} {{ $registroContable->usuario->apellido1 }} {{ $registroContable->usuario->apellido1 }}</td></tr>
                                <tr><th>Fecha de solicitud</th><td>{{ $registroContable->fecha }}</td></tr>
                                <tr><th>Tipo de registro</th><td>{{ $registroContable->tipo_registro_contable_id }}</td></tr>
                                <tr><th>Concepto</th><td><b>{{ $registroContable->concepto_id }}</b>@if($registroContable->socio != null),{{ $registroContable->socio->apellido1 }} {{ $registroContable->socio->apellido2 }}, {{ $registroContable->socio->nombre1 }} {{ $registroContable->socio->nombre12 }}@endif @if($registroContable->asociado != null){{ $registroContable->asociado->concepto }} - {{ $registroContable->asociado->nombre }}@endif</td></tr>
                                <tr><th>Número de registro</th><td>{{ $registroContable->numero_registro }}</td></tr>
                                <tr><th>Cheque</th><td>{{ ($registroContable->cheque == null) ? 'Depósito' : $registroContable->cheque }}</td></tr>
                                <tr><th>Monto</th><td>@if($registroContable->monto){{ $registroContable->monto }} @else {{ '-' }} @endif</td></tr>
                                <tr><th>Cuenta</th><td>@if($registroContable->cuenta){{ $registroContable->cuenta->tipo_cuenta_id }} N° {{ $registroContable->cuenta->numero }} @else {{ '-' }} @endif</td></tr>
                                <tr><th>Banco</th><td>@if($registroContable->cuenta){{ $registroContable->cuenta->banco_id }} @else {{ '-' }} @endif</td></tr>
                                <tr><th>Detalle</th><td>@if($registroContable->detalle){{ $registroContable->detalle }} @else {{ '-' }} @endif</td></tr>                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
