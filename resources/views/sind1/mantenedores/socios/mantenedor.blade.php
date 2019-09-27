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
                    <ul class="nav nav-tabs" id="myTab" role="tablist">

                        <li class="nav-item">
                            <a class="nav-link active" id="sede-tab" data-toggle="tab" href="#sede" role="tab" aria-controls="sede" aria-selected="true">Sede</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="area-tab" data-toggle="tab" href="#area" role="tab" aria-controls="area" aria-selected="false">Área</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="cargo-tab" data-toggle="tab" href="#cargo" role="tab" aria-controls="cargo" aria-selected="false">Cargo</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="situacion-tab" data-toggle="tab" href="#situacion" role="tab" aria-controls="situacion" aria-selected="false">Situación</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="nacionalidad-tab" data-toggle="tab" href="#nacionalidad" role="tab" aria-controls="nacionalidad" aria-selected="false">Nacionalidad</a>
                        </li>

                    </ul>
                    <div class="tab-content" id="myTabContent">

                        @include('partials.components.mantenedores.sede')

                        <div class="tab-pane fade" id="area" role="tabpanel" aria-labelledby="area-tab">
    
                            <a class="btn btn-primary mt-4 mb-4" href="">Agregar nueva área</a> 

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

                        <div class="tab-pane fade" id="cargo" role="tabpanel" aria-labelledby="cargo-tab">.c.</div>

                        <div class="tab-pane fade" id="situacion" role="tabpanel" aria-labelledby="situacion-tab">.s.</div>

                        <div class="tab-pane fade" id="nacionalidad" role="tabpanel" aria-labelledby="nacionalidad-tab">.n.</div>

                    </div>               
                </div>
            </div>
        </div>
    </div>
</div>
@endsection