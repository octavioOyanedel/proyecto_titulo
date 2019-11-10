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
                                <tr><th>Fecha de solicitud</th><td>{{ formatoFecha($request->fecha_solicitud) }}</td></tr>
                                <tr><th>Número de egreso</th><td>{{ $request->numero_egreso }}</td></tr>
                                <tr><th>Método de pago</th><td>{{ $request->forma_pago_id }}</td></tr>
                                @if($forma_pago_original === '1')
                                    <tr><th>Cheque</th><td>{{ $request->cheque }}</td></tr>  
                                @else
                                    <tr><th>Fecha de pago depósito</th><td>{{ formatoFecha($request->fecha_pago_deposito) }}</td></tr>  
                                @endif                                                               
                                <tr><th>Monto</th><td>{{ formatoMoneda($request->monto) }}</td></tr>                         
                                @if($forma_pago_original === '1')
                                    <tr><th>Interés</th><td>{{ $interes->cantidad }}%</td></tr>
                                    <tr><th>Saldo</th><td>{{ formatoMoneda(calculoSaldo($request->monto, $interes->cantidad)) }}</td></tr>
                                    <tr><th>Total</th><td>{{ formatoMoneda(calculoTotal($request->monto, $interes->cantidad)) }}</td></tr>
                                    <tr><th>Cantidad de cuotas</th><td>{{ $request->numero_cuotas }}</td></tr>   
                                @endif  
                          
                            </tbody> 
                        </table>    
                    </div> 
                    @if($forma_pago_original === '1')
                        <div class="table-responsive">
                            <h4>Información Cuotas</h4>
                            <table id="tabla_datos_laborales" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center centrar-td">Cuota N°</th>
                                        <th class="text-center centrar-td">Fecha de Pago</th>                                   
                                        <th class="text-center centrar-td">Monto</th>

                                    </tr>
                                </thead>     
                                <tbody>
                                    @foreach($cuotas as $c)
                                        <tr>
                                            <td class="text-center">{{ $c['numero'] }}</td>
                                            <td class="text-center">{{ $c['fecha'] }}</td>    
                                            <td class="text-center">{{ formatoMoneda($c['monto']) }}</td>                               
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th class="text-right centrar-td" colspan="2">Total</th>
                                        <th class="text-center centrar-td">{{ $total }}</th>                                                                    
                                    </tr>
                                </tbody>
                            </table>            
                        </div>
                    @endif
                    {{-- formulario oculto con datos de prestamo --}}
                    <form method="POST" action="{{ route('prestamos.store') }}">
                        @csrf
                        <input name="fecha_solicitud" type="hidden" value="{{ $request->fecha_solicitud }}">
                        <input name="numero_egreso" type="hidden" value="{{ $request->numero_egreso }}">
                        <input name="cheque" type="hidden" value="{{ $request->cheque }}">
                        <input name="deposito" type="hidden" value="{{ $request->deposito }}">
                        <input name="fecha_pago_deposito" type="hidden" value="{{ $request->fecha_pago_deposito }}">
                        <input name="monto" type="hidden" value="{{ $request->monto }}">
                        <input name="numero_cuotas" type="hidden" value="{{ $request->numero_cuotas }}">
                        <input name="socio_id" type="hidden" value="{{ $socio->id }}">
                        <input name="estado_deuda_id" type="hidden" value="{{ $estado->id }}">
                        <input name="interes_id" type="hidden" value="{{ $interes->id }}">
                        <input name="forma_pago_id" type="hidden" value="{{ $forma_pago_original }}">
                        <!-- Botón submit -->
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary float-right">
                                    {{ __('Solicitar') }}
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