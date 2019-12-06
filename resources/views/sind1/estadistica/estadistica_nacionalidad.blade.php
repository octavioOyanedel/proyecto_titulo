@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Distribución de Socios por Nacionalidad</h3></div>

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
                                @foreach($nacionalidades as $n)
	                                @if($n->contarTodos($n->id) != 0)
	                                    <tr>
	                                        <td><b>{{ $n->nombre }}</b></td>
	                                        <td class="text-center"><a href="">{{ $n->contarVarones($n->id) }}</a></td>
	                                        <td class="text-center"><a href="">{{ $n->contarDamas($n->id) }}</a></td>
	                                        <td class="text-center"><a href="">{{ $n->contarTodos($n->id) }}</a></td>
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