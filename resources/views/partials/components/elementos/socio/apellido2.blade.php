@php isset($socio->apellido2) ? $apellido2 = $socio->apellido2 : $apellido2 = '' @endphp
<!-- Apellido 2-->
<div class="form-group row">
    <label for="apellido2" class="col-md-4 col-form-label text-md-right">{{ __('Apellido materno') }}</label>
    <div class="col-md-6">
        <input id="apellido2" type="text" class="form-control @error('apellido2') is-invalid @enderror" name="apellido2" value="{{ old('apellido2') == true ? old('apellido2') : $apellido2 }}" autocomplete="apellido2" autofocus>
        @error('apellido2')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>