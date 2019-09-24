@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h3 class="mb-0">Crear Conciliación Bancaria</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- Formulario -->
                    <form method="POST" action="">
                        @csrf

                        <!-- cuentas bancarias -->
                        <div class="form-group row">
                            <label for="cuenta_id" class="col-md-4 col-form-label text-md-right">{{ __('Cuentas') }}</label>
                            <div class="col-md-6">
                                <select id="cuenta_id" class="default-selects form-control @error('cuenta_id') is-invalid @enderror" name="cuenta_id" required autocomplete="cuenta_id" autofocus>
                                    <option selected="true" value="">Seleccione...</option>
                                    @foreach($cuentas as $c)
                                        <option value="{{ $c->id }}">{{ $c->tipo_cuenta_id }} N° {{ $c->numero }} - {{ $c->banco_id }}</option>
                                    @endforeach
                                </select>
                                @error('cuenta_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div> 

                        <!-- Meses -->
                        <div class="form-group row">
                            <label for="mes" class="col-md-4 col-form-label text-md-right">{{ __('Cantidad de cuotas') }}</label>
                            <div class="col-md-6">
                                <select id="mes" class="default-selects form-control @error('mes') is-invalid @enderror" name="mes" required autocomplete="mes" autofocus>
                                    <option selected="true" value="">Seleccione...</option>
                                        <option value=""></option><option value=""></option><option value=""></option>
                                        <option value=""></option><option value=""></option><option value=""></option>
                                        <option value=""></option><option value=""></option><option value=""></option>
                                </select>
                                @error('mes')
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
                                    {{ __('Crear') }}
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