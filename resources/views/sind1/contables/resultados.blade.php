@extends('layouts.app')

@section('content')
<div class="ml-5 mr-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Resultados Búsqueda de Registros Contables</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">

                    @if($registros->count() === 0)
                        <div class="alert alert-dark mt-4 text-center" role="alert">
                            <b>No se han encontrado registros contables. <a href="{{ route('contables.create') }}">Registrar nuevo.</a></b>
                        </div>
                    @else
                        <div>
                            @include('partials.components.filtros.contables_busqueda')
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center text-success" scope="col" title="">&nbsp;</th>
                                        <th class="text-center" scope="col">Fecha de solicitud</th>
                                        <th class="text-center" scope="col">Tipo de registro</th>
                                        <th class="text-center" scope="col">Número de registro</th>
                                        <th class="text-center" scope="col">Cheque</th>
                                        <th class="text-center" scope="col">Monto</th>
                                        <th class="" scope="col">Concepto</th>
                                        <th class="" scope="col">Detalle</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($registros as $r)
                                        <tr>
                                            <td class="text-center" scope="row" title="Ver detalle registro contable"><a class="text-primary" href="{{ route('contables.show',['id' => $r->id]) }}"><span>@svg('ver')</span></a></td>
                                            <td class="text-center">{{ $r->fecha }}</td>
                                            <td class="text-center">{{ $r->tipo_registro_contable_id }}</td>
                                            <td class="text-center">{{ $r->numero_registro }}</td>
                                            <td class="text-center" title="@if($r->cheque != null) {{ '' }} @else {{ 'Ingreso sin cheque asociado.' }} @endif">@if($r->cheque != null) {{ $r->cheque }} @else {{ '-' }} @endif</td>
                                            <td class="text-center">{{ $r->monto }}</td>
                                            <td class="">
                                                <b>{{ $r->concepto_id }}</b>@if($r->socio != null) - {{ $r->socio->apellido1 }} {{ $r->socio->apellido2 }}, {{ $r->socio->nombre1 }} {{ $r->socio->nombre2 }}@endif
                                                @if($r->asociado != null){{ $r->asociado->concepto }} - {{ $r->asociado->nombre }}@endif
                                            </td>
                                            <td title="@if($r->detalle != null) {{ '' }} @else {{ 'Sin detalle asociado.' }} @endif">@if($r->detalle != null) {{ $r->detalle }} @else {{ '-' }} @endif</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="float-right mt-3">
                            {{ $registros->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection