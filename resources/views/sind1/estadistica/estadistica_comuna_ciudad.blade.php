@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Distribución de Socios por Comuna - Ciudad</h3></div>

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
                                @foreach($comunas as $co)
                                    @if($co->contarTodos($co->id) != 0)
                                        <tr>
                                            <td><b>{{ $co->nombre }}</b></td>
                                            <td class="text-center">
                                                @if($co->contarVarones($co->id))
                                                    <a href="{{ route('socios_filtrados', ['nombre' => 'comuna_id', 'id' => $co->id, 'genero' => 'Varón']) }}">{{ $co->contarVarones($co->id) }}</a>
                                                @else
                                                    {{ '0' }}
                                                @endif                                                      
                                            </td>
                                            <td class="text-center">
                                                @if($co->contarDamas($co->id))
                                                    <a href="{{ route('socios_filtrados', ['nombre' => 'comuna_id', 'id' => $co->id, 'genero' => 'Dama']) }}">{{ $co->contarDamas($co->id) }}</a>
                                                @else
                                                    {{ '0' }}
                                                @endif                                                                                                   
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('socios_filtrados', ['nombre' => 'comuna_id', 'id' => $co->id, 'genero' => 'Todos']) }}">{{ $co->contarTodos($co->id) }}</a>
                                            </td>
                                        </tr>
                                        @foreach($co->ciudades as $ci)
                                            @if($ci->contarTodos($ci->id) != 0)
                                                <tr>
                                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;<i>{{ $ci->nombre }}</i></td>
                                                    <td class="text-center">
                                                        @if($ci->contarVarones($ci->id))
                                                            <a href="{{ route('socios_filtrados', ['nombre' => 'ciudad_id', 'id' => $ci->id, 'genero' => 'Varón']) }}">{{ $ci->contarVarones($ci->id) }}</a>
                                                        @else
                                                            {{ '0' }}
                                                        @endif                                                          
                                                    </td>
                                                    <td class="text-center">
                                                        @if($ci->contarDamas($ci->id))
                                                            <a href="{{ route('socios_filtrados', ['nombre' => 'ciudad_id', 'id' => $ci->id, 'genero' => 'Dama']) }}">{{ $ci->contarDamas($ci->id) }}</a>
                                                        @else
                                                            {{ '0' }}
                                                        @endif                                                                                                                    
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="{{ route('socios_filtrados', ['nombre' => 'ciudad_id', 'id' => $ci->id, 'genero' => 'Todos']) }}">{{ $ci->contarTodos($ci->id) }}</a>
                                                    </td>
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