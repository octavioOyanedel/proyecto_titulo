@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Distribución de Cargas Familiares</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">
                    @if($carga->contarTotal() === 0)
                        <div class="alert alert-dark mt-4 text-center" role="alert">
                            <b>No se han encontrado cargas familiares registradas. <a href="{{ route('home') }}">Volver a inicio.</a></b>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                    <th class="text-center">Hijos</th>
                                    <th class="text-center">Padres</th>
                                    <th class="text-center">Abuelos</th>
                                </thead>
                                <tbody>
                                    <td class="text-center">
                                        @if($carga->contarHijos() != 0)
                                            <a href="{{ route('listado_cargas_estadistica', ['nombre' => 'hijos'] ) }}">{{ $carga->contarHijos() }}</a>
                                        @else
                                            {{ '0' }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($carga->contarPadres() != 0)
                                            <a href="{{ route('listado_cargas_estadistica', ['nombre' => 'padres'] ) }}">{{ $carga->contarPadres() }}</a>
                                        @else
                                            {{ '0' }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($carga->contarAbuelos() != 0)
                                            <a href="{{ route('listado_cargas_estadistica', ['nombre' => 'abuelos'] ) }}">{{ $carga->contarAbuelos() }}</a>
                                        @else
                                            {{ '0' }}
                                        @endif
                                    </td>
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection