<!-- Nueva situación -->
<div class="form-group new-divs row" id="new_div_situation">
    <label for="nueva_sede" class="col-md-4 col-form-label text-md-right">{{ __('Situación') }}</label>
    <div class="col-md-6">
        <input id="nuevo_estado_socio" type="text" class="new-inputs form-control @error('nuevo_estado_socio') is-invalid @enderror" name="nuevo_estado_socio" value="{{ old('nuevo_estado_socio') }}" required autocomplete="nuevo_estado_socio" autofocus>
        @error('nuevo_estado_socio')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>