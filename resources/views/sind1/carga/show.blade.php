@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">

            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Eliminar Carga Familiar</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">

                    <div class="text-center alertas alert alert-danger" role="alert">
                        <h4>Información Importante</h4>
                        <strong class="icono-alerta">Si elimina este registro no estará visible en ninguna de las tablas del modulo de socios.</strong>
                    </div>
                    <p class="text-center">¿Desea continuar con la eliminación de esta carga familiar <b>{{ $cargaFamiliar->nombre1 }}</b>?</p>
                    <!-- Formulario -->
                    <form class="text-center" method="POST" action="{{ route('cargas.destroy', $cargaFamiliar->id) }}">

                        @csrf
                        @method('DELETE')


                        <a class="btn btn-secondary" href="{{ route('socios.show', $cargaFamiliar->socio_id) }}" role="button">Cancelar</a>
                        <button type="submit" class="btn btn-danger">Aceptar</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection