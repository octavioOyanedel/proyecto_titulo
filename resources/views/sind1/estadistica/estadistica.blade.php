@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Estadisticas por Género</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">

                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th class="text-center" scope="col">Varones</th>
                                    <th class="text-center" scope="col">Damas</th>
                                    <th class="text-center" scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sedes as $s)
	                                @if($s->contarTodos($s->id) != 0)
	                                    <tr>
	                                        <td><b>{{ $s->nombre }}</b></td>
	                                        <td class="text-center"><a href="{{ route('socios_sede', ['sede_id' => $s->id]) }}">{{ $s->contarVarones($s->id) }}</a></td>
	                                        <td class="text-center"><a href="">{{ $s->contarDamas($s->id) }}</a></td>
	                                        <td class="text-center"><a href="">{{ $s->contarTodos($s->id) }}</a></td>
	                                    </tr>
		                                @foreach($s->areas as $a)
		                                	@if($a->contarTodos($a->id) != 0)
			                                    <tr>
			                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;<i>{{ $a->nombre }}</i></td>
			                                        <td class="text-center"><a href="">{{ $a->contarVarones($a->id) }}</a></td>
			                                        <td class="text-center"><a href="">{{ $a->contarDamas($a->id) }}</a></td>
			                                        <td class="text-center"><a href="">{{ $a->contarTodos($a->id) }}</a></td>
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