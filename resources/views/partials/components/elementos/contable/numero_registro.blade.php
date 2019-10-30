<!-- número de registro -->
<div class="form-group row">
    <label for="numero_registro" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Número de registro') }}</label>
    <div class="col-md-6">
        <input id="numero_registro" type="text" class="form-control @error('numero_registro') is-invalid @enderror" name="numero_registro" value="{{ old('numero_registro') }}" required autocomplete="numero_registro" autofocus maxlength="3">
		<small class="text-danger d-none" id="error-numero" class="form-text text-muted"></small>
		<small class="text-secundary d-none" id="comprobar-numero" class="form-text text-muted">
			<div class="spinner-border spinner-border-sm" role="status">
				<span class="sr-only">Loading...</span>
			</div> comprobando...		
		</small>
		<small class="text-success d-done" id="numero-ok" class="form-text text-muted"></small>
    </div>
</div>