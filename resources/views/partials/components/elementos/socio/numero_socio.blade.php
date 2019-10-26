@php isset($socio->numero_socio) ? $numero_socio = $socio->numero_socio : $numero_socio = '' @endphp
<!-- Número socio -->
<div class="form-group row">
    <label for="numero_socio" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Número de socio') }}</label>
    <div class="col-md-6">
        <input id="numero_socio" type="text" class="form-control @error('numero_socio') is-invalid @enderror" name="numero_socio" value="{{ old('numero_socio') == true ? old('numero_socio') : $numero_socio }}" required autocomplete="numero_socio" autofocus>
        @error('numero_socio')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>