@php
	$fecha = '';
	$original_fecha = '';
@endphp

@isset($registro)
	@php
		$fecha = $registro->fecha;
		$original_fecha = $registro->getOriginal('fecha');
	@endphp
@endisset

<!-- Fecha solicitud registro -->
<div class="form-group row">
    <label for="fecha" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Fecha') }}</label>
    <div class="col-md-6">
        <input id="fecha" type="date" class="form-control @error('fecha') is-invalid @enderror" name="fecha" value="@if(old('fecha')){{ $original_fecha }}@else{{date('Y-m-d')}}@endif" required autocomplete="fecha" autofocus> 

        {{-- validacion php --}}
        <small class="form-text text-danger"><strong>@if($errors->has('fecha')) {{ $errors->first('fecha') }}@endif</strong></small>

    </div>
</div>  