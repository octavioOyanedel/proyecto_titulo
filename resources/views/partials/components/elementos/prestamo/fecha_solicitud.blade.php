<!-- Fecha solicitud prestamo -->
<div class="form-group row">
    <label for="fecha_solicitud" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de solicitud') }}</label>
    <div class="col-md-6">
        <input id="fecha_solicitud" type="date" class="form-control @error('fecha_solicitud') is-invalid @enderror" name="fecha_solicitud" value="{{ old('fecha_solicitud') }}" required autocomplete="fecha_solicitud" autofocus>
        @error('fecha_solicitud')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>  