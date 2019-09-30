@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3 class="mb-0">Mantenedor Registros Contables</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h4 class="mt-4"></h4>

                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-cuenta-tab" data-toggle="tab" href="#nav-cuenta" role="tab" aria-controls="nav-cuenta" aria-selected="true">Cuenta</a>
                            <a class="nav-item nav-link" id="nav-concepto-tab" data-toggle="tab" href="#nav-concepto" role="tab" aria-controls="nav-concepto" aria-selected="true">Concepto</a>
                            <a class="nav-item nav-link" id="nav-asociado-tab" data-toggle="tab" href="#nav-asociado" role="tab" aria-controls="nav-asociado" aria-selected="true">Asociado</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-cuenta" role="tabpanel" aria-labelledby="nav-cuenta-tab">
                            <a class="btn btn-primary mt-4 mb-4" href="">Nueva cuenta</a> 

                            <div class="table-responsive">
                                <table class="table table-hover" id="tabla-cuentas">
                                    <thead>
                                        <tr>
                                            <th width="50" class="text-center" scope="col" title=""></th>
                                            <th width="50" class="text-center" scope="col" title=""></th>
                                            <th class="text-center" scope="col">Cuenta</th>
                                        </tr>
                                    </thead>   
                                    <tbody>
                                        @foreach($cuentas as $c)
                                            <tr>                                                
                                                <td class="text-center" scope="row" title="Editar cuenta"><a class="text-secondary" href=""><span>@svg('editar')</span></a></td>
                                                <td class="text-center" scope="row" title="Eliminar cuenta"><a class="text-danger" data-toggle="modal" data-target="#exampleModal" href="#"><span>@svg('eliminar')</span></a></td>
                                                <td class="text-center">{{ $c->tipo_cuenta_id }} N° {{ $c->numero }} - {{ $c->banco_id }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>                                 
                                </table>
                            </div>                                
                        </div> 

                        <div class="tab-pane fade" id="nav-concepto" role="tabpanel" aria-labelledby="nav-concepto-tab">
                            <a class="btn btn-primary mt-4 mb-4" href="">Nuevo concepto</a> 

                            <div class="table-responsive">
                                <table class="table table-hover" id="tabla-conceptos">
                                    <thead>
                                        <tr>
                                            <th width="50" class="text-center" scope="col" title=""></th>
                                            <th width="50" class="text-center" scope="col" title=""></th>
                                            <th class="text-center" scope="col">Concepto</th>
                                        </tr>
                                    </thead>   
                                    <tbody>
                                        @foreach($conceptos as $c)
                                            <tr>                                                
                                                <td class="text-center" scope="row" title="Editar concepto"><a class="text-secondary" href=""><span>@svg('editar')</span></a></td>
                                                <td class="text-center" scope="row" title="Eliminar concepto"><a class="text-danger" data-toggle="modal" data-target="#exampleModal" href="#"><span>@svg('eliminar')</span></a></td>
                                                <td class="text-center">{{ $c->nombre }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>                                 
                                </table>
                            </div>                                
                        </div>   


                        <div class="tab-pane fade" id="nav-asociado" role="tabpanel" aria-labelledby="nav-asociado-tab">
                                <a class="btn btn-primary mt-4 mb-4" href="">Nuevo asociado</a> 
    
                                <div class="table-responsive">
                                    <table class="table table-hover" id="tabla-asociados">
                                        <thead>
                                            <tr>
                                                <th width="50" class="text-center" scope="col" title=""></th>
                                                <th width="50" class="text-center" scope="col" title=""></th>
                                                <th class="text-center" scope="col">Asociado</th>
                                            </tr>
                                        </thead>   
                                        <tbody>
                                            @foreach($asociados as $a)
                                                <tr>                                                
                                                    <td class="text-center" scope="row" title="Editar asociado"><a class="text-secondary" href=""><span>@svg('editar')</span></a></td>
                                                    <td class="text-center" scope="row" title="Eliminar asociado"><a class="text-danger" data-toggle="modal" data-target="#exampleModal" href="#"><span>@svg('eliminar')</span></a></td>
                                                    <td class="text-center">{{ $a->concepto }}, {{ $a->nombre }}</td>
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