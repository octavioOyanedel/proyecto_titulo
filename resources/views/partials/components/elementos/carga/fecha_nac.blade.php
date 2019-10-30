@php isset($cargaFamiliar->fecha_nac) ? $fecha_nac = $cargaFamiliar->fecha_nac : $fecha_nac = '' @endphp
@php isset($cargaFamiliar->fecha_nac) ? $original_fecha_nac = $cargaFamiliar->getOriginal('fecha_nac') : $original_fecha_nac = '' @endphp
<!-- Fecha nacimiento -->
<div class="form-group row">
    <label for="fecha_nac" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Fecha de nacimiento') }}</label>
    <div class="col-md-6">
        <input id="fecha_nac" type="date" class="form-control @error('fecha_nac') is-invalid @enderror" name="fecha_nac" value="{{ old('fecha_nac') == true ? old('fecha_nac') : $original_fecha_nac }}" required autocomplete="fecha_nac" autofocus>
        @error('fecha_nac')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>