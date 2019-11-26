@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Búsqueda Filtrada Préstamos</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">

                    <!-- Formulario -->
                    <form method="GET" action="{{ route('filtro_prestamos') }}">

                        @include('partials.components.elementos.prestamo.rut')

                        <!-- Fecha solicitud inicio -->
                        <div class="text-center alert alert-secondary" role="alert"><b>Fecha de solicitud</b></div>
                        <div class="form-group row">
                            <label for="fecha_solicitud_ini" class="col-md-4 col-form-label text-md-right">{{ __('Inicio') }}</label>
                            <div class="col-md-6">
                                <input id="fecha_solicitud_ini" type="date" class="form-control @error('fecha_solicitud_ini') is-invalid @enderror" name="fecha_solicitud_ini" value="{{ old('fecha_solicitud_ini') }}" autocomplete="fecha_solicitud_ini" autofocus>
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
                                <input id="fecha_solicitud_fin" type="date" class="form-control @error('fecha_solicitud_fin') is-invalid @enderror" name="fecha_solicitud_fin" value="{{ old('fecha_solicitud_fin') }}" autocomplete="fecha_solicitud_fin" autofocus>
                                @error('fecha_solicitud_fin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <hr>

                        <!-- monto inicio-->
                        <div class="text-center alert alert-secondary" role="alert"><b>Monto</b></div>
                        <div class="form-group row">
                            <label for="monto_ini" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Mínimo') }}</label>
                            <div class="col-md-6">
                                <input id="monto_ini" type="text" class="form-control @error('monto_ini') is-invalid @enderror" name="monto_ini" value="{{ old('monto_ini') }}" autocomplete="monto_ini" autofocus>
                                @error('monto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- monto final-->
                        <div class="form-group row">
                            <label for="monto_fin" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Máximo') }}</label>
                            <div class="col-md-6">
                                <input id="monto_fin" type="text" class="form-control @error('monto_fin') is-invalid @enderror" name="monto_fin" value="{{ old('monto_fin') }}" autocomplete="monto_fin" autofocus>
                                @error('monto_fin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <hr>

                        @include('partials.components.elementos.prestamo.metodos_pago')

                        <div class="d-none" id="contenedor_fecha_pago">
                            <!-- Fecha pago inicio -->
                            <div class="text-center alert alert-secondary" role="alert"><b>Fecha de pago</b></div>
                            <div class="form-group row">
                                <label for="fecha_pago_ini" class="col-md-4 col-form-label text-md-right">{{ __('Inicio') }}</label>
                                <div class="col-md-6">
                                    <input id="fecha_pago_ini" type="date" class="form-control @error('fecha_pago_ini') is-invalid @enderror" name="fecha_pago_ini" value="{{ old('fecha_pago_ini') }}" autocomplete="fecha_pago_ini" autofocus>
                                    @error('fecha_pago_ini')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Fecha pago fin -->
                            <div class="form-group row">
                                <label for="fecha_pago_fin" class="col-md-4 col-form-label text-md-right">{{ __('Término') }}</label>
                                <div class="col-md-6">
                                    <input id="fecha_pago_fin" type="date" class="form-control @error('fecha_pago_fin') is-invalid @enderror" name="fecha_pago_fin" value="{{ old('fecha_pago_fin') }}" autocomplete="fecha_pago_fin" autofocus>
                                    @error('fecha_pago_fin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <hr>                                                       
                        </div>

                        <div class="d-none" id="contenedor_cuotas">
                            @include('partials.components.elementos.prestamo.cuotas')
                        </div>

                        @include('partials.components.elementos.prestamo.cuenta')   
                        @include('partials.components.elementos.prestamo.estado_deuda')                      

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
