<!-- Nueva nacionalidad -->
<div class="form-group new-divs row" id="new_div_nation">
    <label for="nuevo_numero_cuenta" class="col-md-4 col-form-label text-md-right">{{ __('Número de cuenta') }}</label>
    <div class="col-md-6">
        <input id="nuevo_numero_cuenta" type="text" class="new-inputs form-control @error('nuevo_numero_cuenta') is-invalid @enderror" name="nuevo_numero_cuenta" value="{{ old('nuevo_numero_cuenta') }}" required autocomplete="nuevo_numero_cuenta" autofocus>
        @error('nuevo_numero_cuenta')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>  