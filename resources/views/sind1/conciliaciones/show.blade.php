@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Conciliación Bancaria de {{ obtenerMesPorNumero($mes) }} de {{ $year }}</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">
                    @if($registros->count() === 0)
                        <div class="alert alert-dark mt-4 text-center" role="alert">
                            <b>No se han encontrado registros. <a href="{{ route('crear_conciliacion') }}">Volver atrás.</a></b>
                        </div>
                    @else 
                        <h4 class="mt-4 text-center">{{ $cuenta->tipo_cuenta_id }} N° {{ $cuenta->numero }} {{ $cuenta->banco_id }}</h4>
                        <h5 class="mt-4"></h5>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center text-success"></th>
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
                                            <td class="text-center" scope="row" title="Ver detalle registro contable"><a class="text-primary" href="{{ route('contables.show',['id' => $r->id]) }}"><span>@svg('ver')</span></a></td>
                                            <td class="text-center">{{ $r->fecha }}</td>
                                            <td class="text-center">{{ ($r->getOriginal('tipo_registro_contable_id') == 1) ? $r->numero_registro  : '-' }}</td>
                                            <td class="text-center">{{ ($r->getOriginal('tipo_registro_contable_id') == 2) ? $r->numero_registro  : '-' }}</td>
                                            <td><b>{{ $r->concepto_id }}</b>@if($r->socio), {{ $r->socio->nombre1 }} @endif @if($r->socio) {{ $r->socio->apellido2 }} @endif @if($r->asociado_id) {{ $r->asociado_id }} @endif</td>
                                            <td class="text-center">{{ ($r->cheque == null) ? 'Depósito' : $r->cheque }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> 
                    @endif                      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection