@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @include('partials.alertas')

            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Mantenedor Cargas Familiares</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">

                    <h4 class="mt-4"></h4>

                    <a class="btn btn-outline-primary active" href="{{ route('mantenedor_carga_parentesco') }}" role="button">Parentesco</a>

                    <div>
                        <a class="btn btn-success mt-4 mb-4" href="{{ route('parentescos.create') }}">Agregar Parentesco</a>
                    </div>

                    @if($parentescos->count() === 0)
                        <div class="alert alert-warning mt-4 text-center" role="alert">
                            <b>No existen registros.</b>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover data-tables table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center" scope="col" title="">&nbsp;</th>
                                        <th class="text-center" scope="col" title="">&nbsp;</th>
                                        <th class="" scope="col">Parentesco</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($parentescos as $p)
                                        <tr>
                                            <td width="50" class="text-center" scope="row" title="Editar parentesco"><a class="text-secondary" href="{{ route('parentescos.edit', $p) }}"><span>@svg('editar')</span></a></td>
                                            <td width="50" class="text-center" scope="row" title="Eliminar parentesco"><a class="text-danger" href="{{ route('parentescos.show', $p) }}"><span>@svg('eliminar')</span></a></td>
                                            <td class="">{{ $p->nombre }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="float-right mt-3">
                            {{ $parentescos->links() }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

</div>
@endsection