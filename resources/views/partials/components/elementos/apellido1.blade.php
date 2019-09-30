@php isset($socio->apellido1) ? $apellido1 = $socio->apellido1 : $apellido1 = '' @endphp
<!-- Apellido -->
<div class="form-group row">
    <label for="apellido1" class="col-md-4 col-form-label text-md-right">{{ __('Apellido paterno') }}</label>
    <div class="col-md-6">
        <input id="apellido1" type="text" class="form-control @error('apellido1') is-invalid @enderror" name="apellido1" value="{{ old('apellido1') == true ? old('apellido1') : $apellido1 }}" required autofocus>
        @error('apellido1')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>