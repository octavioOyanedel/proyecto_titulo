@php isset($socio->fecha_nac) ? $fecha_nac = $socio->fecha_nac : $fecha_nac = '' @endphp
@php isset($socio->fecha_nac) ? $original_fecha_nac = $socio->getOriginal('fecha_nac') : $original_fecha_nac = '' @endphp
<!-- Fecha nacimiento -->
<div class="form-group row">
    <label for="fecha_nac" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de nacimiento') }}</label>
    <div class="col-md-6">
        <input id="fecha_nac" type="date" class="form-control @error('fecha_nac') is-invalid @enderror" name="fecha_nac" value="{{ old('fecha_nac') == true ? old('fecha_nac') : $original_fecha_nac }}" autocomplete="fecha_nac" autofocus>

        {{-- validacion php --}}
        <small class="form-text text-danger"><strong>@if($errors->has('fecha_nac')) {{ $errors->first('fecha_nac') }}@endif</strong></small>
        
    </div>
</div>