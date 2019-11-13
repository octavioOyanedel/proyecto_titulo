@php
	$fecha_solicitud = '';
	$original_fecha_solicitud = '';
@endphp

@isset($prestamo)
	@php
		$fecha_solicitud = $prestamo->fecha_solicitud;
		$original_fecha_solicitud = $prestamo->getOriginal('fecha_solicitud');
	@endphp
@endisset
<!-- Fecha solicitud prestamo -->
<div class="form-group row">
    <label for="fecha_solicitud" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Fecha de solicitud') }}</label>
    <div class="col-md-6">
        <input id="fecha_solicitud" type="date" class="form-control @error('fecha_solicitud') is-invalid @enderror" name="fecha_solicitud" value="@if(old('fecha')){{ $original_fecha_solicitud }}@else{{date('Y-m-d')}}@endif" required autocomplete="fecha_solicitud" autofocus>

        {{-- validacion php --}}
        <small class="form-text text-danger"><strong>@if($errors->has('fecha_solicitud')) {{ $errors->first('fecha_solicitud') }}@endif</strong></small>
        
    </div>
</div>  