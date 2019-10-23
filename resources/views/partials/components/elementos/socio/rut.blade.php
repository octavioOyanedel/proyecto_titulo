@php isset($socio->rut) ? $rut = $socio->getOriginal('rut') : $rut = '' @endphp
<!-- Rut -->
<div class="form-group row">
    <label for="rut" class="col-md-4 col-form-label text-md-right">{{ __('Rut') }}</label>
    <div class="col-md-6">
        <input id="rut" type="text" class="form-control @error('rut') is-invalid @enderror" name="rut" value="{{ old('rut') == true ? old('rut') : $rut }}" required autocomplete="rut" autofocus>
        @error('rut')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>