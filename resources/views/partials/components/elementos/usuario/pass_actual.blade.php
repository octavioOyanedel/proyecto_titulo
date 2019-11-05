<div class="form-group row">
    <label for="actual" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Contraseña actual') }}</label>

    <div class="col-md-6">
        <input id="actual" type="password" class="form-control @error('actual') is-invalid @enderror" name="actual" required autocomplete="new-actual" maxlength="15" minlength="8">

        @error('actual')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>