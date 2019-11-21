@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @include('partials.alertas')

            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Mantenedor Estudios Realizados</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">

                    <h4 class="mt-4"></h4>

                    <a class="btn btn-outline-primary" href="{{ route('mantenedor_estudio_nivel') }}" role="button">Nivel Educacional</a>
                    <a class="btn btn-outline-primary" href="{{ route('mantenedor_estudio_institucion') }}" role="button">Institución</a>
                    <a class="btn btn-outline-primary active" href="{{ route('mantenedor_estudio_estado_nivel') }}" role="button">Estado Nivel Educacional</a>
                    <a class="btn btn-outline-primary" href="{{ route('mantenedor_estudio_titulo') }}" role="button">Título</a>

                    <div>
                        <a class="btn btn-success mt-4 mb-4" href="{{ route('estados_nivel.create') }}">Agregar Estado</a> 
                    </div>

                @if($estados->count() === 0)
                    <div class="alert alert-warning mt-4 text-center" role="alert">
                        <b>No existen registros.</b>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover data-tables table-striped table-bordered" id="tabla-estados">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col" title="">&nbsp;</th>
                                    <th class="text-center" scope="col" title="">&nbsp;</th>
                                    <th class="" scope="col">Estado Nivel Educacional</th>
                                </tr>
                            </thead>   
                            <tbody>
                                @foreach($estados as $e)
                                    <tr>                                                
                                        <td width="50" class="text-center" scope="row" title="Editar estado nivel educacional"><a class="text-secondary" href="{{ route('estados_nivel.edit', $e->id) }}"><span>@svg('editar')</span></a></td>
                                        <td width="50" class="text-center" scope="row" title="Eliminar estado nivel educacional"><a class="text-danger" href="{{ route('estados_nivel.show', $e->id) }}"><span>@svg('eliminar')</span></a></td>
                                        <td class="">{{ $e->nombre }}</td>
                                    </tr>
                                @endforeach
                            </tbody>                                 
                        </table>
                    </div>
                <div class="float-right mt-3">
                    {{ $estados->links() }}
                </div>                   
                @endif     
                </div>
            </div>
        </div>
    </div>

</div>
@endsection