@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Distribución de Socios por Cargo</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">

                    @if($cargos->count() === 0)
                        <div class="alert alert-dark mt-4 text-center" role="alert">
                            <b>No se han encontrado socios registrados. <a href="{{ route('socios.create') }}">Incorporar socio.</a></b>
                        </div>
                    @else
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
    	                                        <td class="text-center">
                                                    @if($c->contarVarones($c->id) != 0)
                                                        <a href="{{ route('socios_filtrados', ['nombre' => 'cargo_id', 'id' => $c->id, 'genero' => 'Varón']) }}">{{ $c->contarVarones($c->id) }}</a>
                                                    @else
                                                        {{ '0' }}
                                                    @endif
                                                </td>
    	                                        <td class="text-center">
                                                    @if($c->contarVarones($c->id) != 0)
                                                        <a href="{{ route('socios_filtrados', ['nombre' => 'cargo_id', 'id' => $c->id, 'genero' => 'Dama']) }}">{{ $c->contarDamas($c->id) }}</a>
                                                    @else
                                                        {{ '0' }}
                                                    @endif
                                                </td>
    	                                        <td class="text-center"><a href="{{ route('socios_filtrados', ['nombre' => 'cargo_id', 'id' => $c->id, 'genero' => 'Todos']) }}">{{ $c->contarTodos($c->id) }}</a></td>
    	                                    </tr>
    		                            @endif
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
@endsection