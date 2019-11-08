@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Préstamo</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <h4>Información Préstamo</h4>
                        <table class="table table-hover table-striped table-bordered">
                            <thead></thead> 
                            <tbody>
                                <tr><th>Nombre</th><td>{{ $socio->nombre1 }} {{ $socio->nombre2 }} {{ $socio->apellido1 }} {{ $socio->apellido2 }}</td></tr>
                                <tr><th>Rut</th><td>{{ $socio->rut }}</td></tr>
                                <tr><th>Fecha de solicitud</th><td>{{ $request->fecha_solicitud }}</td></tr>
                                <tr><th>Número de egreso</th><td>{{ $request->numero_egreso }}</td></tr>
                                <tr><th>Cheque</th><td>{{ $request->cheque }}</td></tr>
                                <tr><th>Cantidad de cuotas</th><td>{{ $request->numero_cuotas }}</td></tr>
                                <tr><th>Estado préstamo</th><td>{{ $estado->nombre }}</td></tr>
                                <tr><th>Interés</th><td>{{ $interes->cantidad }}%</td></tr>
                                <tr><th>Método de pago</th><td>{{ $request->forma_pago_id }}</td></tr>
                            </tbody> 
                        </table>     
                        <h4>Información Cuotas</h4>
                        <table id="tabla_datos_laborales" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="centrar-td">Cuotas</th>
                                    <th class="centrar-td">Fecha de Pago Cuota</th>
                                    <th class="centrar-td">Monto de Cuota</th>
                                    <th class="centrar-td">Estado de Cuota</th>
                                </tr>
                            </thead>     
                            <tbody>

                            </tbody>
                        </table>            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection