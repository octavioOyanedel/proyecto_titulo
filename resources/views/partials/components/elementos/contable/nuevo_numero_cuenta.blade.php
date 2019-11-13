@php isset($cuenta) ? $numero_registro = $cuenta->numero : $numero_registro = '' @endphp
<!-- número cuenta -->
<div class="form-group row">
    <label for="numero_registro" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Número de cuenta') }}</label>
    <div class="col-md-6">
        <input id="numero_registro" type="number" class="form-control @error('numero_registro') is-invalid @enderror" name="numero_registro" value="{{ old('numero_registro') == true ? old('numero_registro') : $numero_registro }}" required autocomplete="numero_registro" autofocus min="1" max="999999">
        @error('numero_registro')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>