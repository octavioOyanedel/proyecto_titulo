@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Distribución de Socios por Sede - Área</h3></div>

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
                                @foreach($sedes as $s)
	                                @if($s->contarTodos($s->id) != 0)
	                                    <tr>
	                                        <td><b>{{ $s->nombre }}</b></td>
	                                        <td class="text-center">
                                                @if($s->contarVarones($s->id))
                                                    <a href="{{ route('socios_filtrados', ['nombre' => 'sede_id', 'id' => $s->id, 'genero' => 'Varón']) }}">{{ $s->contarVarones($s->id) }}</a>
                                                @else
                                                    {{ '0' }}
                                                @endif                                                  
                                            </td>
	                                        <td class="text-center">
                                                @if($s->contarDamas($s->id))
                                                    <a href="{{ route('socios_filtrados', ['nombre' => 'sede_id', 'id' => $s->id, 'genero' => 'Dama']) }}">{{ $s->contarDamas($s->id) }}</a>
                                                @else
                                                    {{ '0' }}
                                                @endif                                                                                                  
                                            </td>
	                                        <td class="text-center"><a href="{{ route('socios_filtrados', ['nombre' => 'sede_id', 'id' => $s->id, 'genero' => 'Todos']) }}">{{ $s->contarTodos($s->id) }}</a></td>
	                                    </tr>
		                                @foreach($s->areas as $a)
		                                	@if($a->contarTodos($a->id) != 0)
			                                    <tr>
			                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;<i>{{ $a->nombre }}</i></td>
			                                        <td class="text-center">
                                                        @if($a->contarVarones($a->id))
                                                            <a href="{{ route('socios_filtrados', ['nombre' => 'area_id', 'id' => $a->id, 'genero' => 'Varón']) }}">{{ $a->contarVarones($a->id) }}</a>
                                                        @else
                                                            {{ '0' }}
                                                        @endif                                                           
                                                    </td>
			                                        <td class="text-center">
                                                        @if($a->contarDamas($a->id))
                                                            <a href="{{ route('socios_filtrados', ['nombre' => 'area_id', 'id' => $a->id, 'genero' => 'Dama']) }}">{{ $a->contarDamas($a->id) }}</a>
                                                        @else
                                                            {{ '0' }}
                                                        @endif                                                                                                                   
                                                    </td>
			                                        <td class="text-center"><a href="{{ route('socios_filtrados', ['nombre' => 'area_id', 'id' => $a->id, 'genero' => 'Todos']) }}">{{ $a->contarTodos($a->id) }}</a></td>
			                                    </tr>
			                                @endif
		                                @endforeach
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