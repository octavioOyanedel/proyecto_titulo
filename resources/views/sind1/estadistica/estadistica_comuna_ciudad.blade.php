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
                                            <td class="text-center"><a href="">{{ $co->contarVarones($co->id) }}</a></td>
                                            <td class="text-center"><a href="">{{ $co->contarDamas($co->id) }}</a></td>
                                            <td class="text-center"><a href="">{{ $co->contarTodos($co->id) }}</a></td>
                                        </tr>
                                        @foreach($co->ciudades as $ci)
                                            @if($ci->contarTodos($ci->id) != 0)
                                                <tr>
                                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;<i>{{ $ci->nombre }}</i></td>
                                                    <td class="text-center"><a href="">{{ $ci->contarVarones($ci->id) }}</a></td>
                                                    <td class="text-center"><a href="">{{ $ci->contarDamas($ci->id) }}</a></td>
                                                    <td class="text-center"><a href="">{{ $ci->contarTodos($ci->id) }}</a></td>
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