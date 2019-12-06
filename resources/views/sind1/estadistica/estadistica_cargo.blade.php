@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Distribución de Socios por Cargo</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">

                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th class="text-center" scope="col">Varones ({{ $varones }})</th>
                                    <th class="text-center" scope="col">Damas ({{ $damas }})</th>
                                    <th class="text-center" scope="col">Total ({{ $total }})</th>
                                </tr>                           
                            </thead>
                            <tbody>
                                @foreach($cargos as $c)
	                                @if($c->contarTodos($c->id) != 0)
	                                    <tr>
	                                        <td><b>{{ $c->nombre }}</b></td>
	                                        <td class="text-center"><a href="">{{ $c->contarVarones($c->id) }}</a></td>
	                                        <td class="text-center"><a href="">{{ $c->contarDamas($c->id) }}</a></td>
	                                        <td class="text-center"><a href="">{{ $c->contarTodos($c->id) }}</a></td>
	                                    </tr>
		                            @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection