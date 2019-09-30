@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3 class="mb-0">Mantenedor Socios</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h4 class="mt-4"></h4>

                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-sede-tab" data-toggle="tab" href="#nav-sede" role="tab" aria-controls="nav-sede" aria-selected="true">Sede</a>
                            <a class="nav-item nav-link" id="nav-area-tab" data-toggle="tab" href="#nav-area" role="tab" aria-controls="nav-area" aria-selected="false">Área</a>
                            <a class="nav-item nav-link" id="nav-cargo-tab" data-toggle="tab" href="#nav-cargo" role="tab" aria-controls="nav-cargo" aria-selected="false">Cargo</a>
                            <a class="nav-item nav-link" id="nav-estado-tab" data-toggle="tab" href="#nav-estado" role="tab" aria-controls="nav-estado" aria-selected="false">Estado socio</a>
                            <a class="nav-item nav-link" id="nav-nacionalidad-tab" data-toggle="tab" href="#nav-nacionalidad" role="tab" aria-controls="nav-nacionalidad" aria-selected="false">Nacionalidad</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-sede" role="tabpanel" aria-labelledby="nav-sede-tab">
                            <a class="btn btn-primary mt-4 mb-4" href="{{ route('sedes.create') }}">Agregar nueva sede</a> 

                            <div class="table-responsive">
                                <table class="table table-hover" id="tabla-sedes">
                                    <thead>
                                        <tr>
                                            <th width="50" class="text-center" scope="col" title=""></th>
                                            <th width="50" class="text-center" scope="col" title=""></th>
                                            <th class="text-center" scope="col">Sede</th>
                                        </tr>
                                    </thead>   
                                    <tbody>
                                        @foreach($sedes as $s)
                                            <tr>                                                
                                                <td class="text-center" scope="row" title="Editar sede"><a class="text-secondary" href=""><span>@svg('editar')</span></a></td>
                                                <td class="text-center" scope="row" title="Eliminar sede"><a class="text-danger" data-toggle="modal" data-target="#exampleModal" href="#"><span>@svg('eliminar')</span></a></td>
                                                <td class="text-center">{{ $s->nombre }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>                                 
                                </table>
                            </div>                                
                        </div>
                        <div class="tab-pane fade" id="nav-area" role="tabpanel" aria-labelledby="nav-area-tab">
                            <a class="btn btn-primary mt-4 mb-4" href="{{ route('areas.create') }}">Agregar nueva área</a> 

                            <div class="table-responsive">
                                <table class="table table-hover" id="tabla-areas">
                                    <thead>
                                        <tr>
                                            <th width="50" class="text-center" scope="col" title=""></th>
                                            <th width="50" class="text-center" scope="col" title=""></th>
                                            <th scope="col">Sede</th>
                                            <th scope="col">Área</th>
                                        </tr>
                                    </thead>   
                                    <tbody>
                                        @foreach($areas as $a)
                                            <tr>                                                
                                                <td class="text-center" scope="row" title="Editar área"><a class="text-secondary" href=""><span>@svg('editar')</span></a></td>
                                                <td class="text-center" scope="row" title="Eliminar área"><a class="text-danger" data-toggle="modal" data-target="#exampleModal" href="#"><span>@svg('eliminar')</span></a></td>
                                                <td>{{ $a->sede_id }}</td>
                                                <td>{{ $a->nombre }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>                                 
                                </table>
                            </div>                        
                        </div>
                        <div class="tab-pane fade" id="nav-cargo" role="tabpanel" aria-labelledby="nav-cargo-tab">
                            <a class="btn btn-primary mt-4 mb-4" href="{{ route('cargos.create') }}">Agregar nuevo cargo</a> 

                            <div class="table-responsive">
                                <table class="table table-hover" id="tabla-cargos">
                                    <thead>
                                        <tr>
                                            <th width="50" class="text-center" scope="col" title=""></th>
                                            <th width="50" class="text-center" scope="col" title=""></th>
                                            <th class="text-center" scope="col">Cargo</th>
                                        </tr>
                                    </thead>   
                                    <tbody>
                                        @foreach($cargos as $c)
                                            <tr>                                                
                                                <td class="text-center" scope="row" title="Editar cargo"><a class="text-secondary" href=""><span>@svg('editar')</span></a></td>
                                                <td class="text-center" scope="row" title="Eliminar cargo"><a class="text-danger" data-toggle="modal" data-target="#exampleModal" href="#"><span>@svg('eliminar')</span></a></td>
                                                <td class="text-center">{{ $c->nombre }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>                                 
                                </table>
                            </div>                        
                        </div>
                        <div class="tab-pane fade" id="nav-estado" role="tabpanel" aria-labelledby="nav-estado-tab">
                            <a class="btn btn-primary mt-4 mb-4" href="{{ route('situaciones.create') }}">Agregar nuevo estado</a> 

                            <div class="table-responsive">
                                <table class="table table-hover" id="tabla-estados">
                                    <thead>
                                        <tr>
                                            <th width="50" class="text-center" scope="col" title=""></th>
                                            <th width="50" class="text-center" scope="col" title=""></th>
                                            <th class="text-center" scope="col">Estado</th>
                                        </tr>
                                    </thead>   
                                    <tbody>
                                        @foreach($estados as $e)
                                            <tr>                                                
                                                <td class="text-center" scope="row" title="Editar estado socio"><a class="text-secondary" href=""><span>@svg('editar')</span></a></td>
                                                <td class="text-center" scope="row" title="Eliminar estado socio"><a class="text-danger" data-toggle="modal" data-target="#exampleModal" href="#"><span>@svg('eliminar')</span></a></td>
                                                <td class="text-center">{{ $e->nombre }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>                                 
                                </table>
                            </div>                       
                        </div>
                        <div class="tab-pane fade" id="nav-nacionalidad" role="tabpanel" aria-labelledby="nav-nacionalidad-tab">
                            <a class="btn btn-primary mt-4 mb-4" href="{{ route('nacionalidades.create') }}">Nueva nacionalidad</a> 

                            <div class="table-responsive">
                                <table class="table table-hover" id="tabla-nacionalidades">
                                    <thead>
                                        <tr>
                                            <th width="50" class="text-center" scope="col" title=""></th>
                                            <th width="50" class="text-center" scope="col" title=""></th>
                                            <th class="text-center" scope="col">Nacionalidad</th>
                                        </tr>
                                    </thead>   
                                    <tbody>
                                        @foreach($nacionalidades as $n)
                                            <tr>                                                
                                                <td class="text-center" scope="row" title="Editar nacionalidad"><a class="text-secondary" href=""><span>@svg('editar')</span></a></td>
                                                <td class="text-center" scope="row" title="Eliminar nacionalidad"><a class="text-danger" data-toggle="modal" data-target="#exampleModal" href="#"><span>@svg('eliminar')</span></a></td>
                                                <td class="text-center">{{ $n->nombre }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>                                 
                                </table>
                            </div>                     
                        </div>                
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection