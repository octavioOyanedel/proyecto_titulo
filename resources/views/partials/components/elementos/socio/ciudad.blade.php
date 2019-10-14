<!-- Ciudad -->
<div class="form-group row">
    <label for="ciudad_id" class="col-md-4 col-form-label text-md-right">{{ __('Ciudad') }}</label>
    <div class="col-md-6">
    <select id="ciudad_id" class="default-selects form-control @error('ciudad_id') is-invalid @enderror" name="ciudad_id" required autocomplete="ciudad_id" autofocus>
        <option selected="true" value="">Seleccione...</option>
    </select>
    @error('ciudad_id')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    </div>
</div>