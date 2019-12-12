@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            @include('partials.alertas')

            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Detalle Préstamo</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">

                    <h4>Información Préstamo</h4>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped">
                            <thead></thead>
                            <tbody>
                                <tr><th>Nombre</th><td>
                                    {{ $prestamo->socio->nombre1 }} {{ $prestamo->socio->nombre2 }} {{ $prestamo->socio->apellido1 }} {{ $prestamo->socio->apellido2 }}
                                </td></tr>
                                <tr><th>Rut</th><td>{{ $prestamo->socio->rut }}</td></tr>
                                <tr><th>Fecha de solicitud</th><td>{{ $prestamo->fecha_solicitud }}</td></tr>
                                <tr><th>Número de egreso</th><td>{{ $prestamo->numero_egreso }}</td></tr>
                                <tr><th>Método de pago</th><td>{{ $prestamo->forma_pago_id }}</td></tr>
                                @if($prestamo->getOriginal('forma_pago_id') === 1)
                                    <tr><th>Cheque</th><td>{{ $prestamo->cheque }}</td></tr>
                                @else
                                    <tr><th>Fecha de pago depósito</th><td>{{ $prestamo->fecha_pago_deposito }}</td></tr>
                                @endif
                                <tr><th>Monto</th><td>{{ $prestamo->monto }}</td></tr>
                                @if($prestamo->getOriginal('forma_pago_id') === 1)
                                    <tr><th>Interés</th><td>{{ $prestamo->interes_id }}%</td></tr>
                                    <tr><th>Saldo</th><td>{{ formatoMoneda(calculoSaldo($prestamo->getOriginal('monto'),$prestamo->interes_id)) }}</td></tr>
                                    <tr><th>Total</th><td>{{ formatoMoneda(calculoTotal($prestamo->getOriginal('monto'),$prestamo->interes_id)) }}</td></tr>
                                    <tr><th>Número de cuotas</th><td>{{ $prestamo->numero_cuotas }}</td></tr>
                                @endif
                                <tr><th>Estado de préstamo</th><td>
                                    <span class="texto-deuda shadow-sm p-1 rounded">{{ textoDeudaPrestamo($prestamo->getOriginal('estado_deuda_id')) }}</span>
                                </td></tr>
                            </tbody>
                        </table>
                    </div>
                    @if($prestamo->getOriginal('forma_pago_id') === 1)
                        <h4>Información Cuotas</h4>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">Cuota N°</th>
                                        <th class="text-center">Fecha de pago</th>
                                        <th class="text-center">Monto</th>
                                        <th class="text-center">Estado Cuota</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($prestamo->cuotas as $p)
                                        <tr>
                                            <td class="text-center">{{ $p->numero_cuota }}</td>
                                            <td class="text-center">{{ $p->fecha_pago }}</td>
                                            <td class="text-center">{{ $p->monto }}</td>
                                            <td class="text-center">
                                                <span class="texto-deuda shadow-sm p-1 rounded">{{ textoDeudaCuota($p->getOriginal('estado_deuda_id')) }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                        <tr>
                                            <td class="text-right" colspan="2"><b>Total</b></td>
                                            <td class="text-center"><b>{{ formatoMoneda(calculoTotal($prestamo->getOriginal('monto'),$prestamo->interes_id)) }}</b></td>
                                            <td></td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    @endif
                    @if(Auth::user()->rol_id != 'Invitado')
                        @if($prestamo->getOriginal('forma_pago_id') === 2 && ($prestamo->getOriginal('estado_deuda_id') === 2 || $prestamo->getOriginal('estado_deuda_id') === 3))
                            <a class="btn btn-primary" href="{{ route('cancelar_deposito', ['id' => $prestamo->id]) }}" role="button">Cancelar Préstamo</a>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
