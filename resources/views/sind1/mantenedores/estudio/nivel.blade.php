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
                    <div class="text-center">
                        <a class="btn btn-outline-success active" href="{{ route('mantenedor_estudio_nivel') }}" role="button">Nivel Educacional</a>
                        <a class="btn btn-outline-success" href="{{ route('mantenedor_estudio_institucion') }}" role="button">Institución</a>
                        <a class="btn btn-outline-success" href="{{ route('mantenedor_estudio_estado_nivel') }}" role="button">Estado Nivel Educacional</a>
                        <a class="btn btn-outline-success" href="{{ route('mantenedor_estudio_titulo') }}" role="button">Título</a>                        
                    </div>


                    <div>
                        <a class="btn btn-primary mt-4 mb-4" href="{{ route('niveles.create') }}">Agregar Nivel Educacional</a> 
                    </div>

                    @if($grados->count() === 0)
                        <div class="alert alert-dark mt-4 text-center" role="alert">
                            <b>No se han encontrado registros.</b>
                        </div>
                    @else
                        <div>                                                                                   
                            @include('partials.components.filtros.nivel')                         
                        </div>                     
                        <div class="table-responsive">
                            <table class="table table-hover data-tables table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="2"></th>
                                        <th class="" scope="col">Nivel educacional</th>
                                    </tr>
                                </thead>   
                                <tbody>
                                    @foreach($grados as $g)
                                        <tr>                                                
                                            <td width="50" class="text-center" scope="row" title="Editar nivel educacional"><a class="text-secondary" href="{{ route('niveles.edit', $g->id) }}"><span>@svg('editar')</span></a></td>
                                            <td width="50" class="text-center" scope="row" title="Eliminar nivel educacional"><a class="text-danger" href="{{ route('niveles.show', $g->id) }}"><span>@svg('eliminar')</span></a></td>
                                            <td class="">{{ $g->nombre }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>                                 
                            </table>
                        </div>  
                        <div class="float-right mt-3">
                            {{ $grados->links() }}
                        </div>                       
                    @endif    
                </div>
            </div>
        </div>
    </div>

</div>
@endsection