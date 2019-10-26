@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Listado Registros Contables</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center text-success" scope="col" title=""></th>
                                    <th class="text-center" scope="col">Fecha de solicitud</th>
                                    <th class="text-center" scope="col">Tipo de registro</th>
                                    <th class="text-center" scope="col">Concepto</th>
                                    <th class="text-center" scope="col">Número de registro</th>
                                    <th class="text-center" scope="col">Cheque</th>
                                    <th class="text-center" scope="col">Monto</th>                                
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($registros as $r)
                                    <tr>
                                        <td class="text-center" scope="row" title="Ver detalle registro contable"><a class="text-primary" href="{{ route('contables.show',['id' => $r->id]) }}"><span>@svg('ver')</span></a></td>
                                        <td class="text-center">{{ $r->fecha }}</td>
                                        <td class="text-center">{{ $r->tipo_registro_contable_id }}</td>
                                        <td class="text-center">
                                            {{ $r->concepto_id }},
                                            {{ $r->socio->nombre1 }} {{ $r->socio->apellido2 }}
                                            {{ $r->asociado_id }}
                                        </td>
                                        <td class="text-center">{{ $r->numero_registro }}</td>
                                        <td class="text-center">{{ $r->cheque }}</td>
                                        <td class="text-center">{{ $r->monto }}</td>                                      
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>                      
                    </div>
                    <div class="mx-auto mt-4">
                        {{ $registros->links() }}  
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>

@endsection