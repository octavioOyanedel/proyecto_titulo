<!-- Institución -->
<div class="form-group row">
        <label for="institucion_id" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Institución educacional') }}</label>
        <div class="col-md-6">
        <select id="institucion_id" class="default-selects form-control @error('institucion_id') is-invalid @enderror" name="institucion_id" required autocomplete="institucion_id" autofocus>
            <option selected="true" value="">Seleccione...</option>

        </select>
        @error('institucion_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>   