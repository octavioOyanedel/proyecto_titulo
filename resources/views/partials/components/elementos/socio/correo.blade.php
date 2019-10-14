@php isset($socio->correo) ? $correo = $socio->correo : $correo = '' @endphp
<!-- Correo -->
<div class="form-group row">
    <label for="correo" class="col-md-4 col-form-label text-md-right">{{ __('Correo electrónico') }}</label>
    <div class="col-md-6">
        <input id="correo" type="correo" class="form-control @error('correo') is-invalid @enderror" name="correo" value="{{ old('correo') == true ? old('correo') : $correo }}" required autocomplete="correo" autofocus>
        @error('correo')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div> 