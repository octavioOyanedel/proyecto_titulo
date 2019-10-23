<!-- Nuevo concepto asociado -->
<div class="form-group new-divs row" id="new_div_nation">
    <label for="concepto" class="col-md-4 col-form-label text-md-right">{{ __('Concepto') }}</label>
    <div class="col-md-6">
        <input id="concepto" type="text" class="new-inputs form-control @error('concepto') is-invalid @enderror" name="concepto" value="{{ old('concepto') }}" required autocomplete="concepto" autofocus>
        @error('concepto')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>  