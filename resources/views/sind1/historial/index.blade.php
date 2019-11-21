@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header text-center"><h3 class="mb-0">Historial</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">

                    @if($registros->count() === 0)
                        <div class="alert alert-warning mt-4 text-center" role="alert">
                            <b>No existen registros.</b>
                        </div>
                    @else 
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Usuario</th>
                                        <th class="text-center" scope="col">Fecha</th>
                                        <th scope="col">Acción</th>
                                        <th class="text-center" scope="col">IP</th>
                                        <th class="text-center" scope="col">Navegador</th>
                                        <th class="text-center" scope="col">Sistema</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($registros as $r)
                                        <tr>
                                            <td>{{ $r->usuario_id }}</td>
                                            <td class="text-center">{{ $r->created_at }}</td>
                                            <td>{{ $r->accion }}</td>
                                            <td class="text-center">{{ $r->ip }}</td>
                                            <td class="text-center">{{ $r->navegador }}</td>
                                            <td class="text-center">{{ $r->sistema }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>                      
                        </div>
                        <div class="float-right mt-3">
                            {{ $registros->links() }}    
                        </div>                         
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
