@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @include('partials.alertas')

            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Mantenedor Préstamos</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">

                    <h4 class="mt-4"></h4>
                    <div class="text-center">
                        <a class="btn btn-outline-success active mb-4" href="{{ route('mantenedor_prestamo_forma_pago') }}" role="button">Forma de Pago</a>
                    </div>
<!--
                    <div>
                        <a class="btn btn-success mt-4 mb-4" href="{{ route('formas_pago.create') }}">Agregar Forma de Pago</a>
                    </div>
-->
                    @if($formas_pago->count() === 0)
                        <div class="alert alert-dark mt-4 text-center" role="alert">
                            <b>No se han encontrado registros.</b>
                        </div>
                    @else
                        <div>
                            @include('partials.components.filtros.forma_pago')
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover data-tables table-striped table-bordered" id="tabla-formas-pago">
                                <thead>
                                    <tr>
                                        <th colspan="1"></th>
                                        <th class="" scope="col">Forma de pago</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($formas_pago as $f)
                                        <tr>
                                            <td width="50" class="text-center" scope="row" title="Editar forma de pago"><a class="text-secondary" href="{{ route('formas_pago.edit',$f) }}"><span>@svg('editar')</span></a></td>
                                        <!--
                                            <td width="50" class="text-center" scope="row" title="Eliminar forma de pago"><a class="text-danger" href="{{ route('formas_pago.show',$f->id) }}"><span>@svg('eliminar')</span></a></td>
                                        -->
                                            <td class="">{{ $f->nombre }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="float-right mt-3">
                            {{ $formas_pago->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
@endsection