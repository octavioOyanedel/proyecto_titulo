@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Conciliación Bancaria</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h4 class="mt-4">{{ $cuenta->tipo_cuenta_id }} N° {{ $cuenta->numero }} {{ $cuenta->banco_id }}</h4>
                    <h5 class="mt-4"></h5>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">Fecha solicitud</th>
                                    <th class="text-center" scope="col">Egreso</th>
                                    <th class="text-center" scope="col">Ingreso</th>
                                    <th scope="col">Concepto</th>
                                    <th class="text-center" scope="col">Cheque</th>
                                </tr>
                            </thead> 
                            <tbody>
                                @foreach($registros as $r)              
                                    <tr>
                                        <td class="text-center">{{ $r->fecha }}</td>
                                        <td class="text-center">{{ ($r->getOriginal('tipo_registro_contable_id') == 1) ? $r->numero_registro  : '-' }}</td>
                                        <td class="text-center">{{ ($r->getOriginal('tipo_registro_contable_id') == 2) ? $r->numero_registro  : '-' }}</td>
                                        <td>{{ $r->concepto_id }} {{ $r->socio->nombre1 }} {{ $r->socio->apellido2 }} {{ $r->asociado_id }}</td>
                                        <td class="text-center">{{ ($r->cheque == null) ? 'Depósito' : $r->cheque }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection