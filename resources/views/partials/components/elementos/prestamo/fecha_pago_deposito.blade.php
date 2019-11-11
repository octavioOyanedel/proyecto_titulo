@php
	$fecha_pago_deposito = '';
	$original_fecha_pago_deposito = '';
@endphp

@isset($prestamo)
	@php
		$fecha_pago_deposito = $prestamo->fecha_pago_deposito;
		$original_fecha_pago_deposito = $prestamo->getOriginal('fecha_pago_deposito');
	@endphp
@endisset
<!-- Fecha pago prestamo deposito-->
<div id="campo_fecha_pago_deposito" class="form-group row d-none">
    <label for="fecha_pago_deposito" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Fecha pago depósito') }}</label>
    <div class="col-md-6">
        <input id="fecha_pago_deposito" type="date" class="form-control @error('fecha_pago_deposito') is-invalid @enderror" name="fecha_pago_deposito" value="{{ old('fecha_pago_deposito') }}" autocomplete="fecha_pago_deposito" autofocus>

        {{-- validacion php --}}
        <small class="form-text text-danger"><strong>@if($errors->has('fecha_pago_deposito')) {{ $errors->first('fecha_pago_deposito') }}@endif</strong></small>
        
    </div>
</div> 