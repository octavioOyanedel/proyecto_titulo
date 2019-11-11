@extends('layouts.app')

@section('content')
<div class="ml-5 mr-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Socios Incorporados</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if($socios->count() === 0)
                        <div class="alert alert-warning mt-4 text-center" role="alert">
                            <b>No existen registros.</b>
                        </div>
                    @else                     
                        <div class="table-responsive">
                            <table class="table table-hover data-tables table-striped table-bordered" id="tabla-socios">
                                <thead>
                                    <tr>
                                        <th class="text-center" scope="col">&nbsp;</th>
                                        <th class="text-center" scope="col">&nbsp;</th>
                                        <th class="text-center" scope="col">&nbsp;</th>
                                        <th class="text-center" title="Estado préstamo solicitado" scope="col">Préstamo</th>
                                        <th scope="col">Nombre</th>
                                        <th class="text-center" scope="col">Género</th>
                                        <th scope="col">Rut</th>
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
                                    @foreach($socios as $s)
                                        <tr>
                                            <td width="50" class="text-center" scope="row" title="Ver detalle socio"><a class="text-primary" href="{{ route('socios.show',$s) }}"><span>@svg('ver')</span></a></td>
                                            <td width="50" class="text-center" scope="row" title="Editar socio"><a class="text-secondary" href="{{ route('socios.edit',$s) }}"><span>@svg('editar')</span></a></td>
                                            <td width="50" class="text-center" scope="row" title="Eliminar socio"><a class="text-danger" data-toggle="modal" data-target="#eliminar_socio" href="#"><span>@svg('eliminar')</span></a></td>
                                            @if(buscarDeudaActiva($s->prestamos) != null || buscarDeudaActiva($s->prestamos) != '')
                                            <td class="text-center" scope="row">
                                                <a class="text-decoration-none" href="{{ route('prestamos.show',buscarPrestamoConDeudaActiva($s->prestamos)) }}">
                                                    <span class="texto-deuda shadow-sm p-1 rounded
                                                        @if(buscarDeudaActiva($s->prestamos) === 'Pendiente')
                                                            {{ 'bg-warning text-dark' }}
                                                        @endif
                                                        @if(buscarDeudaActiva($s->prestamos) === 'Atrasado')
                                                            {{ 'bg-danger text-light' }}
                                                        @endif                                                        
                                                    ">{{ buscarDeudaActiva($s->prestamos) }}</span>
                                                </a>
                                            </td>
                                            @else
                                                <td class="text-center"> - </td>
                                            @endif
                                            <td>{{ $s->apellido1 }} {{ $s->apellido2 }}, {{ $s->nombre1 }} {{ $s->nombre2 }}</td>
                                            <td class="text-center">{{ $s->genero }}</td>
                                            <td>{{ $s->rut }}</td>
                                            <td class="text-center">{{ $s->fecha_sind1 }}</td>
                                            <td class="text-center">{{ $s->numero_socio }}</td>
                                            <td>{{ $s->correo }}</td>
                                            <td class="text-center">{{ $s->anexo }}</td>
                                            <td class="text-center">{{ $s->celular }}</td>
                                            <td>{{ $s->sede_id }}</td>
                                            <td>{{ $s->area_id }}</td>
                                            <td>{{ $s->cargo_id }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>                      
                        </div>
                    @endif 
                </div>
            </div>
        </div>
    </div>
</div>

@include('partials.modals.eliminar_socio') 

@endsection