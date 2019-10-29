<!-- número de egreso -->
<div class="form-group row">
    <label for="numero_egreso" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Número de egreso') }}</label>
    <div class="col-md-6">
        <input id="numero_egreso" type="text" class="form-control @error('numero_egreso') is-invalid @enderror" name="numero_egreso" value="{{ old('numero_egreso') }}" required autocomplete="numero_egreso" autofocus maxlength="6">
		<small class="text-danger d-none" id="error-numero-egreso" class="form-text text-muted"></small>
		<small class="text-secundary d-none" id="comprobar-numero-egreso" class="form-text text-muted">
			<div class="spinner-border spinner-border-sm" role="status">
				<span class="sr-only">Loading...</span>
			</div> comprobando...		
		</small>
		<small class="text-success d-done" id="numero-egreso-ok" class="form-text text-muted"></small>
    </div>
</div>