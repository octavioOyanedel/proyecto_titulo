@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h3 class="mb-0">Registrar Egreso/Ingreso</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- Formulario -->
                    <form method="POST" action="">
                        @csrf

                        <!-- Fecha solicitud registro -->
                        <div class="form-group row">
                            <label for="fecha" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de solicitud') }}</label>
                            <div class="col-md-6">
                                <input id="fecha" type="date" class="form-control @error('fecha') is-invalid @enderror" name="fecha" value="{{ old('fecha') }}" required autocomplete="fecha" autofocus>
                                @error('fecha')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>  

                        <!-- número de registro -->
                        <div class="form-group row">
                            <label for="numero_registro" class="col-md-4 col-form-label text-md-right">{{ __('Número de registro') }}</label>
                            <div class="col-md-6">
                                <input id="numero_registro" type="text" class="form-control @error('numero_registro') is-invalid @enderror" name="numero_registro" value="{{ old('numero_registro') }}" required autocomplete="numero_registro" autofocus>
                                @error('numero_registro')
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

                        <!-- tipo de registro -->
                        <div class="form-group row">
                            <label for="tipo_registro_contable_id" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de registro') }}</label>
                            <div class="col-md-6">
                                <select id="tipo_registro_contable_id" class="default-selects form-control @error('tipo_registro_contable_id') is-invalid @enderror" name="tipo_registro_contable_id" required autocomplete="tipo_registro_contable_id" autofocus>
                                    <option selected="true" value="">Seleccione...</option>
                                    @foreach($tipos_registro as $t)
                                        <option value="{{ $t->id }}">{{ $t->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('tipo_registro_contable_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div> 

                        <!-- cuentas bancarias -->
                        <div class="form-group row">
                            <label for="cuenta_id" class="col-md-4 col-form-label text-md-right">{{ __('Cuentas') }}</label>
                            <div class="col-md-6">
                                <select id="cuenta_id" class="default-selects form-control @error('cuenta_id') is-invalid @enderror" name="cuenta_id" required autocomplete="cuenta_id" autofocus>
                                    <option selected="true" value="">Seleccione...</option>
                                    @foreach($cuentas as $c)
                                        <option value="{{ $c->id }}">{{ $c->tipo_cuenta_id }} N° {{ $c->numero }} - {{ $c->banco_id }}</option>
                                    @endforeach
                                    <option value="new">Nuevo...</option>
                                </select>
                                @error('cuenta_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div> 

                        <!-- conceptos -->
                        <div class="form-group row">
                            <label for="concepto_id" class="col-md-4 col-form-label text-md-right">{{ __('Conceptos') }}</label>
                            <div class="col-md-6">
                                <select id="concepto_id" class="default-selects form-control @error('concepto_id') is-invalid @enderror" name="concepto_id" required autocomplete="concepto_id" autofocus>
                                    <option selected="true" value="">Seleccione...</option>
                                    @foreach($conceptos as $c)
                                        <option value="{{ $c->id }}">{{ $c->nombre }}</option>
                                    @endforeach
                                    <option value="new">Nuevo...</option>
                                </select>
                                @error('concepto_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div> 

                        <!-- socios -->
                        <div class="form-group row">
                            <label for="socio_id" class="col-md-4 col-form-label text-md-right">{{ __('Socios') }}</label>
                            <div class="col-md-6">
                                <select id="socio_id" class="default-selects form-control @error('socio_id') is-invalid @enderror" name="socio_id" required autocomplete="socio_id" autofocus>
                                    <option selected="true" value="">Seleccione...</option>
                                    @foreach($socios as $s)
                                        <option value="{{ $s->id }}">{{ $s->apellido1 }}</option>
                                    @endforeach
                                </select>
                                @error('socio_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div> 

                        <!-- asociado -->
                        <div class="form-group row">
                            <label for="asociado_id" class="col-md-4 col-form-label text-md-right">{{ __('Asociados') }}</label>
                            <div class="col-md-6">
                                <select id="asociado_id" class="default-selects form-control @error('asociado_id') is-invalid @enderror" name="asociado_id" required autocomplete="asociado_id" autofocus>
                                    <option selected="true" value="">Seleccione...</option>
                                    @foreach($asociados as $a)
                                        <option value="{{ $a->id }}">{{ $a->concepto }} - {{ $a->nombre }}</option>
                                    @endforeach
                                    <option value="new">Nuevo...</option>
                                </select>
                                @error('asociado_id')
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
                                    {{ __('Registrar') }}
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