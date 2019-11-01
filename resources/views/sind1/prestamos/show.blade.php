@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Detalle Préstamo</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h4>Información Préstamo</h4>
                    <div class="table-responsive">                       
                        <table class="table table-hover">
                            <thead></thead>
                            <tbody>
                                <th>Nombre</th><td>
                                    {{ $prestamo->socio->nombre1 }} {{ $prestamo->socio->nombre2 }} {{ $prestamo->socio->apellido1 }} {{ $prestamo->socio->apellido2 }}
                                </td>
                                <tr><th>Rut</th><td>{{ $prestamo->socio->rut }}</td></tr>
                                <tr><th>Fecha de solicitud</th><td>{{ $prestamo->fecha_solicitud }}</td></tr>
                                <tr><th>Número de egreso</th><td>{{ $prestamo->numero_egreso }}</td></tr>
                                <tr><th>Cheque</th><td>{{ $prestamo->cheque }}</td></tr>     
                                <tr><th>Monto</th><td>{{ $prestamo->monto }}</td></tr>    
                                <tr><th>Número de cuotas</th><td>{{ $prestamo->numero_cuotas }}</td></tr>
                                <tr><th>Estado de préstamo</th><td>{{ $prestamo->estado_deuda_id }}</td></tr> 
                                <tr><th>Interés</th><td>{{ $prestamo->interes_id }}</td></tr>
                                <tr><th>Saldo</th><td>{{ formatoMoneda(calculoSaldo($prestamo->getOriginal('monto'),$interes->cantidad)) }}</td></tr>
                                <tr><th>Total</th><td>{{ formatoMoneda(calculoTotal($prestamo->getOriginal('monto'),$interes->cantidad)) }}</td></tr>
                                <tr><th>Método de pago</th><td>{{ $prestamo->forma_pago_id }}</td></tr>            
                            </tbody>
                        </table>
                    </div>
                
                    <h4>Información Cuotas</h4>
                    <div class="table-responsive">                       
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">Número de cuota</th>
                                    <th class="text-center">Fecha de pago</th>
                                    <th class="text-center">Monto</th>
                                    <th class="text-center">Estado de cuota</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($prestamo->cuotas as $c)  
                                    <tr>
                                        <td class="text-center">{{ $c->numero_cuota }}</td>
                                        <td class="text-center">{{ $c->fecha_pago }}</td>
                                        <td class="text-center">{{ $c->monto }}</td>
                                        <td class="text-center">{{ $c->estado_deuda_id }}</td>
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
