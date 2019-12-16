@extends('layouts.app')

@section('content')
<div class="ml-5 mr-5">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Distribución de Socios por Nivel Educacional</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">

                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    @foreach($niveles as $n)
                                        <th class="text-center" scope="col">{{ $n->nombre }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($niveles as $n)
                                    @if($n->contarEstudiosPorSocio($n->nombre) != 0)
                                        <td class="text-center" scope="col">
                                            <a href="{{ route('socios_filtrados_educacion', ['nombre' => $n->nombre]) }}">{{ $n->contarEstudiosPorSocio($n->nombre) }}</a>
                                        </td>
                                    @else
                                        <td class="text-center" scope="col">
                                            {{ '0' }}
                                        </td>
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