<!-- número de egreso -->
<div class="form-group row">
    <label for="numero_egreso" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Número de egreso') }}</label>
    <div class="col-md-6">
        <input id="numero_egreso" type="text" class="form-control @error('numero_egreso') is-invalid @enderror" name="numero_egreso" value="{{ old('numero_egreso') }}" required autocomplete="numero_egreso" autofocus>
        @error('numero_egreso')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>