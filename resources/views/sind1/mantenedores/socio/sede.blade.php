@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @include('partials.alertas')

            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Mantenedor Socios</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">

                    <h4 class="mt-4"></h4>

                    <a class="btn btn-outline-primary active" href="{{ route('mantenedor_socio_sede') }}" role="button">Sede</a>
                    <a class="btn btn-outline-primary" href="{{ route('mantenedor_socio_area') }}" role="button">Área</a>
                    <a class="btn btn-outline-primary" href="{{ route('mantenedor_socio_cargo') }}" role="button">Cargo</a>
                    <a class="btn btn-outline-primary" href="{{ route('mantenedor_socio_estado') }}" role="button">Estado Socio</a>
                    <a class="btn btn-outline-primary" href="{{ route('mantenedor_socio_nacionalidad') }}" role="button">Nacionalidad</a>

                    <div>
                    <a class="btn btn-success mt-4 mb-4" href="{{ route('sedes.create') }}">Agregar Sede</a>
                    </div>


                    @if($sedes->count() === 0)
                        <div class="alert alert-warning mt-4 text-center" role="alert">
                            <b>No existen registros.</b>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="2"></th>
                                        <th class="" scope="col">Sede</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sedes as $s)
                                        <tr>
                                            <td width="50" class="text-center" scope="row" title="Editar sede"><a class="text-secondary" href="{{ route('sedes.edit',$s) }}"><span>@svg('editar')</span></a></td>
                                            <td width="50" class="text-center" scope="row" title="Eliminar sede"><a class="text-danger" href="{{ route('sedes.show',$s) }}"><span>@svg('eliminar')</span></a></td>
                                            <td class="">{{ $s->nombre }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="float-right mt-3 sede">
                            <input type="hidden" value="sede">
                            {{ $sedes->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
@endsection