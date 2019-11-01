@php isset($socio) ? $correo = $socio->correo : $correo = '' @endphp
<!-- Correo socio-->
<div class="form-group row">
    <label for="correo" class="col-md-4 col-form-label text-md-right">{{ __('Correo electrónico') }}</label>
    <div class="col-md-6">
        <input id="correo" type="mail" class="form-control @error('correo') is-invalid @enderror" name="correo" value="{{ old('correo') == true ? old('correo') : $correo }}" autocomplete="correo" autofocus>
		<small class="text-danger d-none" id="error-correo" class="form-text text-muted"></small>
		<small class="text-secundary d-none" id="comprobar-correo" class="form-text text-muted">
			<div class="spinner-border spinner-border-sm" role="status">
				<span class="sr-only">Loading...</span>
			</div> comprobando...		
		</small>
		<small class="text-success d-done" id="correo-ok" class="form-text text-muted"></small>
    </div>
</div> 