@php
    $numero_registro = '';
@endphp
@isset($registro)
    @php
        $numero_registro = $registro->numero_registro;
    @endphp
@endisset

<!-- número de registro -->
<div class="form-group row">
    <label for="numero_registro" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Número de registro') }}</label>
    <div class="col-md-6">
        <input id="numero_registro" type="text" class="form-control @error('numero_registro') is-invalid @enderror" name="numero_registro" value="{{ old('numero_registro') == true ? old('numero_registro') : $numero_registro }}" required autocomplete="numero_registro" autofocus>

        {{-- validacion php --}}
        <small id="error-numero-php" class="form-text text-danger"><strong>@if($errors->has('numero_registro')) {{ $errors->first('numero_registro') }}@endif</strong></small>

        {{-- validacion javascript --}}
        <small id="error-numero" class="d-none form-text text-danger font-weight-bold"></small>

        <small id="comprobar-numero" class="form-text text-secundary d-none">
            <div class="spinner-border spinner-border-sm" role="status">
                <span class="sr-only">Comprobando...</span>
            </div>&nbsp;&nbsp;Comprobando...
        </small>

        <small id="numero-ok" class="d-done form-text text-success font-weight-bold"></small>

    </div>
</div>