@php isset($socio->numero_socio) ? $numero_socio = $socio->numero_socio : $numero_socio = '' @endphp
<!-- Número socio -->
<div class="form-group row">
    <label for="numero_socio" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Número de socio') }}</label>
    <div class="col-md-6">
        <input id="numero_socio" type="text" class="form-control @error('numero_socio') is-invalid @enderror" name="numero_socio" value="{{ old('numero_socio') == true ? old('numero_socio') : $numero_socio }}" required autocomplete="numero_socio" autofocus>
		<small class="text-danger d-none" id="error-numero" class="form-text text-muted"></small>
		<small class="text-secundary d-none" id="comprobar-numero" class="form-text text-muted">
			<div class="spinner-border spinner-border-sm" role="status">
				<span class="sr-only">Loading...</span>
			</div> comprobando...		
		</small>
		<small class="text-success d-done" id="numero-ok" class="form-text text-muted"></small>
    </div>
</div>