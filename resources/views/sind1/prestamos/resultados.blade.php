@extends('layouts.app')

@section('content')

<div class="ml-5 mr-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Resultados Búsqueda de Préstamos</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">

                    @if($prestamos->count() === 0)
                        <div class="alert alert-dark mt-4 text-center" role="alert">
                            <b>No se han encontrado préstamos registradoss. <a href="{{ route('prestamos.create') }}">Solicitar préstamo.</a></b>
                        </div>
                    @else
                        <div>
                            @include('partials.components.filtros.prestamos_busqueda')
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th class="text-center" scope="col">Estado de préstamo</th>
                                        <th scope="col">Nombre socio</th>
                                        <th class="text-center" scope="col">Rut</th>
                                        <th class="text-center" scope="col">Fecha de solicitud</th>
                                        <th class="text-center" scope="col">Número de egreso</th>
                                        <th scope="col">Cuenta</th>
                                        <th scope="col">Método de pago</th>
                                        <th class="text-center" scope="col">Cheque</th>
                                        <th class="text-center" scope="col">Monto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($prestamos as $p)
                                        <tr>
                                            <td width="50" class="text-center" scope="row" title="Ver detalle préstamo"><a class="text-primary" href="{{ route('prestamos.show',$p) }}"><span>@svg('ver')</span></a></td>
                                            <td class="text-center">
                                                <span class="texto-deuda shadow-sm p-1 rounded">{{ textoDeudaPrestamo($p->getOriginal('estado_deuda_id')) }}</span>
                                            </td>
                                            <td class="">@if($p->socio->apellido2 != null) {{ $p->socio->apellido1 }} {{ $p->socio->apellido2 }}, @else {{ $p->socio->apellido1 }}, @endif {{ $p->socio->nombre1 }} {{ $p->socio->nombre2 }} </td>
                                            <td class="text-center">{{ $p->socio->rut }}</td>
                                            <td class="text-center">{{ $p->fecha_solicitud }}</td>
                                            <td class="text-center">{{ $p->numero_egreso }}</td>
                                            <td>{{ $p->cuenta_id }}</td>
                                            <td>{{ $p->forma_pago_id }}</td>
                                            <td class="text-center">{{ celdaCadena($p->cheque) }}</td>
                                            <td class="text-center">{{ $p->monto }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="float-right mt-3">
                            {{ $prestamos->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
