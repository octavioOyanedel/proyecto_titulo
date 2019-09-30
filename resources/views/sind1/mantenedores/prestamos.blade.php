@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3 class="mb-0">Mantenedor Prestamos</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h4 class="mt-4"></h4>

                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-forma-pago-tab" data-toggle="tab" href="#nav-forma-pago" role="tab" aria-controls="nav-forma-pago" aria-selected="true">Forma de pago</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-forma-pago" role="tabpanel" aria-labelledby="nav-forma-pago-tab">
                            <a class="btn btn-primary mt-4 mb-4" href="">Agregar nueva forma de pago</a> 

                            <div class="table-responsive">
                                <table class="table table-hover" id="tabla-formas-pago">
                                    <thead>
                                        <tr>
                                            <th width="50" class="text-center" scope="col" title=""></th>
                                            <th width="50" class="text-center" scope="col" title=""></th>
                                            <th class="text-center" scope="col">Forma de pago</th>
                                        </tr>
                                    </thead>   
                                    <tbody>
                                        @foreach($formas_pago as $f)
                                            <tr>                                                
                                                <td class="text-center" scope="row" title="Editar forma de pago"><a class="text-secondary" href=""><span>@svg('editar')</span></a></td>
                                                <td class="text-center" scope="row" title="Eliminar forma de pago"><a class="text-danger" data-toggle="modal" data-target="#exampleModal" href="#"><span>@svg('eliminar')</span></a></td>
                                                <td class="text-center">{{ $f->nombre }}</td>
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