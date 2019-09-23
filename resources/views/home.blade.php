@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3 class="mb-0">Listado de socios (activos)</h3></div>

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
                                    <th class="text-center text-success" scope="col" title=""></th>
                                    <th class="text-center text-success" scope="col" title=""></th>
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
                                        <td class="text-center" scope="row" title="Ver detalle socio"><a class="text-secondary" href="{{ route('socios.show',$s->id) }}"><span>@svg('ver')</span></a></td>
                                        <td class="text-center" scope="row" title="Editar socio"><a class="text-secondary" href="#"><span>@svg('editar')</span></a></td>
                                        <td class="text-center" scope="row" title="Eliminar socio"><a class="text-secondary" href="#"><span>@svg('eliminar')</span></a></td>
                                        <td>{{ $s->apellido1 }} {{ $s->apellido2 }}, {{ $s->nombre1 }} {{ $s->nombre2 }}</td>
                                        <td class="text-center">{{ $s->genero }}</td>
                                        <td>{{ $s->rut }}</td>
                                        <td class="text-center">{{ $s->fecha_sind1 }}</td>
                                        <td>{{ $s->numero_socio }}</td>
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
                    <div class="mx-auto mt-4">
                        {{ $socios->links() }}
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
