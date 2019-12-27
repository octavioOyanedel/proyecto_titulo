@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Distribución de Socios por Nacionalidad</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">

                    @if($nacionalidades->count() === 0)
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
                                    @foreach($nacionalidades as $n)
    	                                @if($n->contarTodos($n->id) != 0)
    	                                    <tr>
    	                                        <td><b>{{ $n->nombre }}</b></td>
                                                <td class="text-center">
                                                    @if($n->contarVarones($n->id))
                                                        <a href="{{ route('socios_filtrados', ['nombre' => 'nacionalidad_id', 'id' => $n->id, 'genero' => 'Varón']) }}">{{ $n->contarVarones($n->id) }}</a>
                                                    @else
                                                        {{ '0' }}
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if($n->contarDamas($n->id))
                                                        <a href="{{ route('socios_filtrados', ['nombre' => 'nacionalidad_id', 'id' => $n->id, 'genero' => 'Dama']) }}">{{ $n->contarDamas($n->id) }}</a>
                                                    @else
                                                        {{ '0' }}
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('socios_filtrados', ['nombre' => 'nacionalidad_id', 'id' => $n->id, 'genero' => 'Todos']) }}">{{ $n->contarTodos($n->id) }}</a>
                                                </td>
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