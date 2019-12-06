@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Distribución de Socios por Incorporación - Desvinculación {{ date('Y') }}</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">

                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th class="text-center" scope="col">Incorporaciones</th>
                                    <th class="text-center" scope="col">Desvinculaciones</th>
                                    <th class="text-center" scope="col">Diferencia</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                @for ($i = 1; $i <= 12; $i++)
                                    @php 
                                        $mes = (int) date('m'); 
                                    @endphp
                                    @if($i <= $mes)
                                        <tr>
                                            <td><b>{{ obtenerMesPorNumero($i) }}</b></td>
                                            <td class="text-center">
                                                @if($socio->obtenerVinculadosPorMes($i) != 0)
                                                    <a href="" title="Socios incorporados.">{{ $socio->obtenerVinculadosPorMes($i) }}</a>
                                                @else
                                                    {{ '0' }}
                                                @endif                                                
                                            </td>
                                            <td class="text-center">    
                                                @if($socio->obtenDesvinculadosPorMes($i) != 0)
                                                    <a href="" title="Socios descinculados.">{{ $socio->obtenDesvinculadosPorMes($i) }}</a>
                                                @else
                                                    {{ '0' }}
                                                @endif                                                     
                                            </td>
                                            <td class="text-center">
                                                @if($socio->obtenerVinculadosPorMes($i) - $socio->obtenDesvinculadosPorMes($i) != 0)
                                                    <a class="{{ ($socio->obtenerVinculadosPorMes($i) - $socio->obtenDesvinculadosPorMes($i) > 0) ? 'text-success' : 'text-danger' }}" href=""><b>{{ $socio->obtenerVinculadosPorMes($i) - $socio->obtenDesvinculadosPorMes($i) }}</b></a>
                                                @else
                                                    {{ '0' }}
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                    @php
                                        $total = $total +  ($socio->obtenerVinculadosPorMes($i) - $socio->obtenDesvinculadosPorMes($i))
                                    @endphp
                                @endfor
                                <tr>
                                    <td colspan="3" class="text-right"><b>Total</b></td>
                                    <td class="{{ ($total > 0) ? 'text-success' : 'text-danger' }} text-center"><b>{{ $total }}</b></td>    
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection