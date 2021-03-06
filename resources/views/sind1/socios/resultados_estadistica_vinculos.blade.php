@extends('layouts.app')

@section('content')
<div class="ml-5 mr-5">
    <div class="row justify-content-center">
        <div class="col-md-12">

            @include('partials.alertas')

            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Resultados Búsqueda de Socios</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">


                    @if($socios->count() === 0)
                        <div class="alert alert-dark mt-4 text-center" role="alert">
                            <b>No se han encontrado socios registrados. <a href="{{ route('socios.create') }}">Incorporar socio.</a></b>
                        </div>
                    @else
                        <div>
                            @include('partials.components.filtros.estadistica_vinculos')
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center" colspan="3" scope="col"></th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Estado socio</th>
                                        <th class="text-center" scope="col">Género</th>
                                        <th class="text-center" scope="col">Rut</th>
                                        <th class="text-center" scope="col">Fecha ingreso Sind1</th>
                                        <th scope="col">Número Socio</th>
                                        <th scope="col">Correo</th>
                                        <th class="text-center" scope="col">Anexo</th>
                                        <th class="text-center" scope="col">Celular</th>
                                        <th scope="col">Sede</th>
                                        <th scope="col">Área</th>
                                        <th scope="col">Cargo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 0 @endphp
                                    @foreach($socios as $s)
                                        <tr>
                                            <td width="50" class="text-center" scope="row" title="Ver detalle socio"><a class="text-primary" href="{{ route('socios.show',$s) }}"><span>@svg('ver')</span></a></td>
                                            <td width="50" class="text-center" scope="row" title="Editar socio"><a class="text-secondary" href="{{ route('socios.edit',$s) }}"><span>@svg('editar')</span></a></td>
                                            <td width="50" class="text-center" scope="row" title="Eliminar socio"><a class="text-danger" href="{{ route('eliminar_socio_form',$s->id) }}"><span>@svg('eliminar')</span></a></td>
                                            <td>@if($s->apellido2 != null) {{ $s->apellido1 }} {{ $s->apellido2 }}, @else {{ $s->apellido1 }}, @endif {{ $s->nombre1 }} {{ $s->nombre2 }}</td>
                                            <td>{{ $s->estado_socio_id }}</td>
                                            <td class="text-center">{{ $s->genero }}</td>
                                            <td class="text-center">{{ $s->rut }}</td>
                                            <td class="text-center" title="{{ ($s->fecha_sind1 === '') ? 'Sin registro.' : '' }}">{{ celdaCadena($s->fecha_sind1) }}</td>
                                            <td class="text-center" title="{{ ($s->numero_socio === '') ? 'Sin registro.' : '' }}">{{ celdaCadena($s->numero_socio) }}</td>
                                            <td title="{{ ($s->correo === '') ? 'Sin registro.' : '' }}">{{ celdaCadena($s->correo) }}</td>
                                            <td class="text-center" title="{{ ($s->anexo === '') ? 'Sin registro.' : '' }}">{{ celdaCadena($s->anexo) }}</td>
                                            <td class="text-center" title="{{ ($s->celular === '') ? 'Sin registro.' : '' }}">{{ celdaCadena($s->celular) }}</td>
                                            <td title="{{ ($s->sede_id === '') ? 'Sin registro.' : '' }}">{{ celdaCadena($s->sede_id) }}</td>
                                            <td title="{{ ($s->area_id === '') ? 'Sin registro.' : '' }}">{{ celdaCadena($s->area_id) }}</td>
                                            <td title="{{ ($s->cargo_id === '') ? 'Sin registro.' : '' }}">{{ celdaCadena($s->cargo_id) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="float-right mt-3">
                            {{ $socios->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection