@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Búsqueda Filtrada Préstamos</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- Formulario -->
                    <form method="POST" action="">
                        @csrf 
                        <!-- Fecha solicitud inicio -->
                        <div class="text-center alert alert-secondary" role="alert">Fecha de solicitud</div>
                        <div class="form-group row">
                            <label for="fecha_solicitud_ini" class="col-md-4 col-form-label text-md-right">{{ __('Inicio') }}</label>
                            <div class="col-md-6">
                                <input id="fecha_solicitud_ini" type="date" class="form-control @error('fecha_solicitud_ini') is-invalid @enderror" name="fecha_solicitud_ini" value="{{ old('fecha_solicitud_ini') }}" required autocomplete="fecha_solicitud_ini" autofocus>
                                @error('fecha_solicitud_ini')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Fecha solicitud fin -->
                        <div class="form-group row">
                            <label for="fecha_solicitud_fin" class="col-md-4 col-form-label text-md-right">{{ __('Término') }}</label>
                            <div class="col-md-6">
                                <input id="fecha_solicitud_fin" type="date" class="form-control @error('fecha_solicitud_fin') is-invalid @enderror" name="fecha_solicitud_fin" value="{{ old('fecha_solicitud_fin') }}" required autocomplete="fecha_solicitud_fin" autofocus>
                                @error('fecha_solicitud_fin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>     
                        <hr> 

                        @include('partials.components.elementos.socio.rut') 
                        @include('partials.components.elementos.prestamo.numero_egreso')
                        @include('partials.components.elementos.prestamo.cheque')
                        @include('partials.components.elementos.prestamo.monto')
                        @include('partials.components.elementos.prestamo.cuotas')
                        @include('partials.components.elementos.prestamo.metodos_pago')
                                       
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
