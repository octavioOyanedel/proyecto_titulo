<div class="form-group row">
	<label for="password-confirm" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>* </b></span>{{ __('Confirmar contraseña') }}</label>

	<div class="col-md-6">
		<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

		@error('password-confirm')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
	</div>
</div>