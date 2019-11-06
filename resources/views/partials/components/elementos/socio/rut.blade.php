@php isset($socio->rut) ? $rut = $socio->getOriginal('rut') : $rut = '' @endphp
<!-- Rut -->
<div class="form-group row">
    <label for="rut" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Rut') }}</label>
    <div class="col-md-6">
        <input id="rut" type="text" class="form-control @error('rut') is-invalid @enderror" name="rut" value="{{ old('rut') == true ? old('rut') : $rut }}" required autocomplete="rut" placeholder="Ej. 138816389" autofocus maxlength="9">
		
        {{-- validacion php --}}
        <small id="error-rut-php" class="form-text text-danger"><strong>@if($errors->has('rut')) {{ $errors->first('rut') }}@endif</strong></small>
	
        {{-- validacion javascript --}}
		<small id="error-rut" class="d-none form-text text-danger font-weight-bold"></small>

		<small id="comprobar-rut" class="form-text text-secundary d-none">
			<div class="spinner-border spinner-border-sm" role="status">
				<span class="sr-only">Comprobando...</span>
			</div>&nbsp;&nbsp;Comprobando...		
		</small>

		<small id="rut-ok" class="d-done form-text text-success font-weight-bold"></small>		
		
    </div>

</div>