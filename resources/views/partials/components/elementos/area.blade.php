<!-- Área -->
<div class="form-group row">
    <label for="area_id" class="col-md-4 col-form-label text-md-right">{{ __('Área') }}</label>
    <div class="col-md-6">
        <select id="area_id" class="default-selects form-control @error('area_id') is-invalid @enderror" name="area_id" required autocomplete="area_id" autofocus>
            <option selected="true" value="">Seleccione...</option>
        </select>
        @error('area_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div> 