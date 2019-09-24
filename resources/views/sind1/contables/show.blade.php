@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3 class="mb-0">Detalle Registro Contable</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h4>Información préstamo</h4>
                    {{ dd($registro) }}
                    <div class="table-responsive">                       
                        <table class="table table-hover">
                            <thead></thead>
                            <tbody>
                                <th>Registrado por</th>
                                <td class="text-center"></td>
                                <td class="text-center">{{ $registro->usuario->nombre1 }} {{ $registro->usuario->nombre2 }} {{ $registro->usuario->apellido1 }} {{ $registro->usuario->apellido2 }}</td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
