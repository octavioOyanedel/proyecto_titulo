@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Listado de Préstamos</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if($prestamos->count() === 0)
                        <div class="alert alert-warning mt-4 text-center" role="alert">
                            <b>No existen registros.</b>
                        </div>
                    @else 
                        <div class="table-responsive">
                            <table class="table table-hover data-tables" id="tabla-prestamos">
                                <thead>
                                    <tr>
                                        <th class="text-center text-success" scope="col" title=""></th>
                                        <th scope="col">Nombre socio</th>
                                        <th class="text-center" scope="col">Fecha de solicitud</th>
                                        <th class="text-center" scope="col">Número de egreso</th>
                                        <th class="text-center" scope="col">Cheque</th>
                                        <th class="text-center" scope="col">Monto</th>
                                        <th class="text-center" scope="col">Número de cuotas</th>
                                        <th class="text-center" scope="col">Estado de préstamo</th>
                                        <th class="text-center" scope="col">Interés</th>
                                        <th class="text-center" scope="col">Método de pago</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($prestamos as $p)
                                        <tr>
                                            <td width="50" class="text-center" scope="row" title="Ver detalle préstamo"><a class="text-primary" href="{{ route('prestamos.show',$p) }}"><span>@svg('ver')</span></a></td>
                                            <td class="text-center">{{ $p->socio->apellido1 }} {{ $p->socio->apellido2 }} {{ $p->socio->nombre1 }} {{ $p->socio->nombre2 }} </td>
                                            <td class="text-center">{{ $p->fecha_solicitud }}</td>
                                            <td class="text-center">{{ $p->numero_egreso }}</td>
                                            <td class="text-center">{{ $p->cheque }}</td>
                                            <td class="text-center">{{ $p->monto }}</td>
                                            <td class="text-center">{{ $p->numero_cuotas }}</td>
                                            <td class="text-center">{{ $p->estado_deuda_id }}</td>
                                            <td class="text-center">{{ $p->interes_id }}</td>
                                            <td class="text-center">{{ $p->forma_pago_id }}</td>
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
