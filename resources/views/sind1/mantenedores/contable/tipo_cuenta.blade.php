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
                    <div class="text-center">
                        <a class="btn btn-outline-success" href="{{ route('mantenedor_contable_cuenta') }}" role="button">Cuenta Bancaria</a>
                        <a class="btn btn-outline-success" href="{{ route('mantenedor_contable_banco') }}" role="button">Banco</a>
                        <a class="btn btn-outline-success" href="{{ route('mantenedor_contable_concepto') }}" role="button">Concepto</a>
                        <a class="btn btn-outline-success active" href="{{ route('mantenedor_contable_tipo_cuenta') }}" role="button">Tipo de Cuenta</a>
                        <a class="btn btn-outline-success" href="{{ route('mantenedor_contable_asociado') }}" role="button">Asociado</a>                        
                    </div>

                    <div>
                        <a class="btn btn-primary mt-4 mb-4" href="{{ route('tipos_cuentas.create') }}">Agregar Tipo de Cuenta</a>  
                    </div>

                    @if($tipos_cuenta->count() === 0)
                        <div class="alert alert-dark mt-4 text-center" role="alert">
                            <b>No se han encontrado registros.</b>
                        </div>
                    @else
                        <div>                                                                                   
                            @include('partials.components.filtros.tipo_cuenta')                         
                        </div>                     
                        <div class="table-responsive">
                            <table class="table table-hover data-tables table-striped table-bordered" id="tabla-cuentas">
                                <thead>
                                    <tr>
                                        <th colspan="2"></th>
                                        <th class="" scope="col">Tipo cuenta</th>
                                    </tr>
                                </thead>   
                                <tbody>
                                    @foreach($tipos_cuenta as $t)
                                        <tr>                                                
                                            <td width="50" class="text-center" scope="row" title="Editar tipo de cuenta"><a class="text-secondary" href="{{ route('tipos_cuentas.edit', $t->id) }}"><span>@svg('editar')</span></a></td>
                                            <td width="50" class="text-center" scope="row" title="Eliminar tipo de cuenta"><a class="text-danger" href="{{ route('tipos_cuentas.show', $t->id) }}"><span>@svg('eliminar')</span></a></td>
                                            <td class="">{{ $t->nombre }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    <div class="float-right mt-3">
                        {{ $tipos_cuenta->links() }}
                    </div>                        
                    @endif

                </div>
            </div>
        </div>
    </div>

</div>
@endsection