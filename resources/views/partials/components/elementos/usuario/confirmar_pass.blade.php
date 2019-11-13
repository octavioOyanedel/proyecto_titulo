<div class="form-group row">
	<label for="password_confirm" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Confirmar contraseña') }}</label>

	<div class="col-md-6">
		<input id="password_confirm" type="password" class="form-control" name="password_confirm" required autocomplete="new-password" value="" maxlength="15" minlength="8">

        {{-- validacion php --}}
        <small id="error-password_confirm-php" class="form-text text-danger"><strong>@if($errors->has('password_confirm')) {{ $errors->first('password_confirm') }}@endif</strong></small>
	
        {{-- validacion javascript --}}
		<small id="error-password_confirm" class="d-none form-text text-danger font-weight-bold"></small>

		<small id="comprobar-password_confirm" class="form-text text-secundary d-none">
			<div class="spinner-border spinner-border-sm" role="status">
				<span class="sr-only">Comprobando...</span>
			</div>&nbsp;&nbsp;Comprobando...		
		</small>

		<small id="password_confirm-ok" class="d-done form-text text-success font-weight-bold"></small>	

	</div>
</div>