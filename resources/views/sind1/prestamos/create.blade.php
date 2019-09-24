@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3 class="mb-0">Solicitar Préstamo</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- Formulario -->
                    <form method="POST" action="">
                        @csrf
                        <!-- Fecha solicitud prestamo -->
                        <div class="form-group row">
                            <label for="fecha_solicitud" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de solicitud') }}</label>
                            <div class="col-md-6">
                                <input id="fecha_solicitud" type="date" class="form-control @error('fecha_solicitud') is-invalid @enderror" name="fecha_solicitud" value="{{ old('fecha_solicitud') }}" required autocomplete="fecha_solicitud" autofocus>
                                @error('fecha_solicitud')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>  

                        <!-- Rut -->
                        <div class="form-group row">
                            <label for="rut" class="col-md-4 col-form-label text-md-right">{{ __('Rut') }}</label>
                            <div class="col-md-6">
                                <input id="rut" type="text" class="form-control @error('rut') is-invalid @enderror" name="rut" value="{{ old('rut') }}" required autocomplete="rut" autofocus>
                                @error('rut')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>  

                        <!-- número de egreso -->
                        <div class="form-group row">
                            <label for="numero_egreso" class="col-md-4 col-form-label text-md-right">{{ __('Número de egreso') }}</label>
                            <div class="col-md-6">
                                <input id="numero_egreso" type="text" class="form-control @error('numero_egreso') is-invalid @enderror" name="numero_egreso" value="{{ old('numero_egreso') }}" required autocomplete="numero_egreso" autofocus>
                                @error('numero_egreso')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- cheque -->
                        <div class="form-group row">
                            <label for="cheque" class="col-md-4 col-form-label text-md-right">{{ __('Cheque') }}</label>
                            <div class="col-md-6">
                                <input id="cheque" type="text" class="form-control @error('cheque') is-invalid @enderror" name="cheque" value="{{ old('cheque') }}" required autocomplete="cheque" autofocus>
                                @error('cheque')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- monto -->
                        <div class="form-group row">
                            <label for="monto" class="col-md-4 col-form-label text-md-right">{{ __('Monto') }}</label>
                            <div class="col-md-6">
                                <input id="monto" type="text" class="form-control @error('monto') is-invalid @enderror" name="monto" value="{{ old('monto') }}" required autocomplete="monto" autofocus>
                                @error('monto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- cuotas -->
                        <div class="form-group row">
                            <label for="cuotas_id" class="col-md-4 col-form-label text-md-right">{{ __('Cantidad de cuotas') }}</label>
                            <div class="col-md-6">
                                <select id="cuotas_id" class="default-selects form-control @error('cuotas_id') is-invalid @enderror" name="cuotas_id" required autocomplete="cuotas_id" autofocus>
                                    <option selected="true" value="">Seleccione...</option>
                                    @for ($i = 1; $i <= 24; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                                @error('cuotas_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>     

                        <!-- formas de pago -->
                        <div class="form-group row">
                            <label for="forma_pago_id" class="col-md-4 col-form-label text-md-right">{{ __('Método de pago') }}</label>
                            <div class="col-md-6">
                                <select id="forma_pago_id" class="default-selects form-control @error('forma_pago_id') is-invalid @enderror" name="forma_pago_id" required autocomplete="forma_pago_id" autofocus>
                                    <option selected="true" value="">Seleccione...</option>
                                    @foreach($formas_pago as $f)
                                    <option value="{{ $f->id }}">{{ $f->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('forma_pago_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div> 

                        <!-- Botón submit -->
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Simular') }}
                                </button>
                            </div>
                        </div>                                                                                                                 <!-- fin form -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
