@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Nueva Área</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">

                    <!-- Formulario -->
                    <form method="POST" action="{{ route('areas.store') }}">
                        @csrf

                        @include('partials.components.elementos.socio.sede')
                        @include('partials.components.elementos.socio.nueva_area')

                        <!-- Botón submit -->
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Agregar') }}
                                </button>
                            </div>
                        </div>
                    <!-- fin form -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection