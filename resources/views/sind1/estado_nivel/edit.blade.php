@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Editar Estado Nivel Académico</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">

                    <!-- Formulario -->
                    <form method="POST" action="{{ route('estados_nivel.update',$estadoGradoAcademico->id) }}">   

                        @csrf
                        @method('PUT')

                        @include('partials.components.elementos.estudio.nuevo_estado')

                        <!-- Botón submit -->
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Editar') }}
                                </button>
                            </div>
                        </div>
                    </form>                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection