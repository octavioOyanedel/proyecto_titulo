@php isset($socio->fecha_pucv) ? $fecha_pucv = $socio->fecha_pucv : $fecha_pucv = '' @endphp
@php isset($socio->fecha_pucv) ? $original_fecha_pucv = $socio->getOriginal('fecha_pucv') : $original_fecha_pucv = '' @endphp
<!-- Fecha ingreso pucv -->
<div class="form-group row">
    <label for="fecha_pucv" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de ingreso PUCV') }}</label>
    <div class="col-md-6">
        <input id="fecha_pucv" type="date" class="form-control @error('fecha_pucv') is-invalid @enderror" name="fecha_pucv" value="{{ old('fecha_pucv') == true ? old('fecha_pucv') : $original_fecha_pucv }}" autocomplete="fecha_pucv" autofocus>

        {{-- validacion php --}}
        <small class="form-text text-danger"><strong>@if($errors->has('fecha_pucv')) {{ $errors->first('fecha_pucv') }}@endif</strong></small>
        
    </div>
</div> 