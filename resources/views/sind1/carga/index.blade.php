@extends('layouts.app')

@section('content')
<div class="ml-5 mr-5">
    <div class="row justify-content-center">
        <div class="col-md-12">

            @include('partials.alertas')

            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Cargas Familiares</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">


                    @if($cargas->count() === 0)
                        <div class="alert alert-dark mt-4 text-center" role="alert">
                            <b>No se encontraron registros de cargas familiares. <a href="{{ route('home') }}">Volver a inicio.</a></b>
                        </div>
                    @else
                        <div>
                            @include('partials.components.filtros.carga')
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center" scope="col"></th>
                                        @if(Auth::user()->rol_id != 'Invitado')
                                            <th class="text-center" scope="col"></th>
                                            <th class="text-center" scope="col"></th>
                                        @endif
                                        <th scope="col">Nombre</th>
                                        <th class="text-center" scope="col">Rut</th>
                                        <th scope="col">Socio</th>
                                        <th class="text-center" scope="col">Fecha Nacimiento</th>
                                        <th class="text-center" scope="col">Parentesco</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cargas as $c)
                                        <tr>
                                            <td width="50" class="text-center" scope="row" title="Ver detalle carga familiar"><a class="text-primary" href=""><span>@svg('ver')</span></a></td>
                                        @if(Auth::user()->rol_id != 'Invitado')
                                            <td width="50" class="text-center" scope="row" title="Editar carga familiar"><a class="text-secondary" href="{{ route('cargas.edit', $c->id) }}"><span>@svg('editar')</span></a></td>
                                            <td width="50" class="text-center" scope="row" title="Eliminar carga familiar"><a class="text-danger" href="{{ route('cargas.show', $c->id) }}"><span>@svg('eliminar')</span></a></td>
                                        @endif
                                            <td>@if($c->apellido2 != null) {{ $c->apellido1 }} {{ $c->apellido2 }}, @else {{ $c->apellido1 }}, @endif {{ $c->nombre1 }} {{ $c->nombre2 }}</td>
                                            <td class="text-center">{{ $c->rut }}</td>
                                            <td><a href="{{ route('socios.show',$c->socio->id) }}">{{ $c->socio->apellido1 }}, {{ $c->socio->nombre1 }} - {{ $c->socio->rut  }}</a></td>
                                            <td class="text-center">{{ $c->fecha_nac }}</td>
                                            <td class="text-center">{{ $c->parentesco_id }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="float-right mt-3">
                            {{ $cargas->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection