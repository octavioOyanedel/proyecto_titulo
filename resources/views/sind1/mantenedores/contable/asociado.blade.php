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
                        <a class="btn btn-outline-success" href="{{ route('mantenedor_contable_tipo_cuenta') }}" role="button">Tipo de Cuenta</a>
                        <a class="btn btn-outline-success active" href="{{ route('mantenedor_contable_asociado') }}" role="button">Asociado</a>                        
                    </div>

                    <div>
                        <a class="btn btn-primary mt-4 mb-4" href="{{ route('asociados.create') }}">Agregar Asociado</a>
                    </div>

                    @if($asociados->count() === 0)
                        <div class="alert alert-dark mt-4 text-center" role="alert">
                            <b>No se han encontrado registros.</b>
                        </div>
                    @else
                        <div>                                                                                   
                            @include('partials.components.filtros.asociado')                         
                        </div>                     
                        <div class="table-responsive">
                            <table class="table table-hover data-tables table-striped table-bordered" id="tabla-asociados">
                                <thead>
                                    <tr>
                                        <th colspan="2"></th>
                                        <th scope="col">Concepto</th>
                                        <th scope="col">Nombre</th>
                                    </tr>
                                </thead>   
                                <tbody>
                                    @foreach($asociados as $a)
                                        <tr>                                                
                                            <td width="50" class="text-center" scope="row" title="Editar asociado"><a class="text-secondary" href="{{ route('asociados.edit', $a) }}"><span>@svg('editar')</span></a></td>
                                            <td width="50" class="text-center" scope="row" title="Eliminar asociado"><a class="text-danger" href="{{ route('asociados.show', $a->id) }}"><span>@svg('eliminar')</span></a></td>
                                            <td class="">{{ $a->concepto }}</td>
                                            <td title="@if(!$a->nombre) {{ 'Sin nombre registrado para este asociado.' }} @endif">@if($a->nombre) {{ $a->nombre }} @else {{ '-' }} @endif</td>
                                        </tr>
                                    @endforeach
                                </tbody>                                 
                            </table>
                        </div>
                    <div class="float-right mt-3">
                        {{ $asociados->links() }}
                    </div>                        
                    @endif    

                </div>
            </div>
        </div>
    </div>

</div>
@endsection