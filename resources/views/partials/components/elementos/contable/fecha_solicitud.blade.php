<!-- Fecha solicitud registro -->
<div class="form-group row">
    <label for="fecha" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de solicitud') }}</label>
    <div class="col-md-6">
        <input id="fecha" type="date" class="form-control @error('fecha') is-invalid @enderror" name="fecha" value="{{ old('fecha') }}" required autocomplete="fecha" autofocus>
        @error('fecha')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>  