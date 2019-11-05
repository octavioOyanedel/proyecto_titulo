<div class="form-group row">
	<label for="password-confirm" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Confirmar contraseña') }}</label>

	<div class="col-md-6">
		<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" maxlength="15" minlength="8">

		<small class="text-danger d-none" id="error-confirmar" class="form-text text-muted"></small>
		<small class="text-secundary d-none" id="comprobar-confirmar" class="form-text text-muted">
			<div class="spinner-border spinner-border-sm" role="status">
				<span class="sr-only">Loading...</span>
			</div> comprobando...		
		</small>
		<small class="text-success d-done" id="confirmar-ok" class="form-text text-muted"></small>
	</div>
</div>