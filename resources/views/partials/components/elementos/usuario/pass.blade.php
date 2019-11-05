<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">
    	<span title="Campo obligatorio." class="text-danger"><button type="button" class="btn btn-sm btn-outline-dark rounded-circle mr-2 pb-0" data-container="body" data-toggle="popover" data-placement="left" data-content="La contraseña debe contener entre 8 y 15 caracteres alfanuméricos (solo números y letras).">?</button><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Contraseña') }}</label>

    <div class="col-md-6">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" maxlength="15" minlength="8">
        <small class="text-danger d-none" id="error-pass" class="form-text text-muted"></small>
        <small class="text-secundary d-none" id="comprobar-pass" class="form-text text-muted">
            <div class="spinner-border spinner-border-sm" role="status">
                <span class="sr-only">Loading...</span>
            </div> comprobando...       
        </small>
        <small class="text-success d-done" id="pass-ok" class="form-text text-muted"></small>
    </div>
</div>