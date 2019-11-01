<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">
    	<span title="Campo obligatorio." class="text-danger">
    		<b>
    			<button type="button" class="btn btn-sm btn-outline-dark rounded-circle mr-2 pb-0" data-container="body" data-toggle="popover" data-placement="left" data-content="La contraseña debe contener entre 8 y 15 caracteres alfanuméricos (solo números y letras).">?</button>
    		* 
    		</b>
    	</span>{{ __('Contraseña') }}</label>

    <div class="col-md-6">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" maxlength="15" minlength="8">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>