@php isset($socio->fecha_sind1) ? $fecha_sind1 = $socio->fecha_sind1 : $fecha_sind1 = '' @endphp
@php isset($socio->fecha_sind1) ? $original_fecha_sind1 = $socio->getOriginal('fecha_sind1') : $original_fecha_sind1 = '' @endphp
<!-- Fecha ingreso sind1 -->
<div class="form-group row">
    <label for="fecha_sind1" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de ingreso Sind1') }}</label>
    <div class="col-md-6">
        <input id="fecha_sind1" type="date" class="form-control @error('fecha_sind1') is-invalid @enderror" name="fecha_sind1" value="{{ old('fecha_sind1') == true ? old('fecha_sind1') : $original_fecha_sind1 }}" required autocomplete="fecha_sind1" autofocus>
        @error('fecha_sind1')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>