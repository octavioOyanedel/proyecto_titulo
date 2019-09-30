<!-- Dirección -->
<div class="form-group row">
    <label for="direccion" class="col-md-4 col-form-label text-md-right">{{ __('Dirección') }}</label>
    <div class="col-md-6">
        <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{ old('direccion') }}" required autocomplete="direccion" autofocus>
        @error('direccion')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>  