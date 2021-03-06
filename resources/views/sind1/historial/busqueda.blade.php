@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Búsqueda Filtrada Historial</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">

                    <!-- Formulario -->
                    <form method="GET" action="{{ route('filtro_historial') }}">  
                        <!-- Fecha inicio -->
                        <div class="text-center alert alert-secondary" role="alert"><b>Fecha</b></div>
                        <div class="form-group row">
                            <label for="fecha_ini" class="col-md-4 col-form-label text-md-right">{{ __('Inicio') }}</label>
                            <div class="col-md-6">
                                <input id="fecha_ini" type="date" class="form-control @error('fecha_ini') is-invalid @enderror" name="fecha_ini" value="{{ old('fecha_ini') }}" autocomplete="fecha_ini" autofocus>
                                @error('fecha_ini')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Fecha fin -->
                        <div class="form-group row">
                            <label for="fecha_fin" class="col-md-4 col-form-label text-md-right">{{ __('Término') }}</label>
                            <div class="col-md-6">
                                <input id="fecha_fin" type="date" class="form-control @error('fecha_fin') is-invalid @enderror" name="fecha_fin" value="{{ old('fecha_fin') }}" autocomplete="fecha_fin" autofocus>
                                @error('fecha_fin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>     
                        <hr>                   

                        @include('partials.components.elementos.historial.usuarios') 

                        <!-- Botón submit -->
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Buscar') }}
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