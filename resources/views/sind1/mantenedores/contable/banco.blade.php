@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @include('partials.alertas')

            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Mantenedor Registros Contables</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">

                    <h4 class="mt-4"></h4>

                    <a class="btn btn-outline-primary" href="{{ route('mantenedor_contable_cuenta') }}" role="button">Cuenta Bancaria</a>
                    <a class="btn btn-outline-primary active" href="{{ route('mantenedor_contable_banco') }}" role="button">Banco</a>
                    <a class="btn btn-outline-primary" href="{{ route('mantenedor_contable_concepto') }}" role="button">Concepto</a>
                    <a class="btn btn-outline-primary" href="{{ route('mantenedor_contable_tipo_cuenta') }}" role="button">Tipo de Cuenta</a>
                    <a class="btn btn-outline-primary" href="{{ route('mantenedor_contable_asociado') }}" role="button">Asociado</a>

                    <div>
                        <a class="btn btn-success mt-4 mb-4" href="{{ route('bancos.create') }}">Agregar Banco</a>
                    </div>

                    @if($bancos->count() === 0)
                        <div class="alert alert-warning mt-4 text-center" role="alert">
                            <b>No existen registros.</b>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover data-tables table-striped table-bordered" id="tabla-bancos">
                                <thead>
                                    <tr>
                                        <th colspan="2"></th>
                                        <th class="" scope="col">Banco</th>
                                    </tr>
                                </thead>   
                                <tbody>
                                    @foreach($bancos as $b)
                                        <tr>                                                
                                            <td width="50" class="text-center" scope="row" title="Editar banco"><a class="text-secondary" href="{{ route('bancos.edit', $b) }}"><span>@svg('editar')</span></a></td>
                                            <td width="50" class="text-center" scope="row" title="Eliminar banco"><a class="text-danger" href="{{ route('bancos.show', $b) }}"><span>@svg('eliminar')</span></a></td>
                                            <td class="">{{ $b->nombre }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    <div class="float-right mt-3">
                        {{ $bancos->links() }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
@endsection