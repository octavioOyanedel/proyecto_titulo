<!-- Nueva área -->
<div class="form-group new-divs row" id="new_div_area">
    <label for="nueva_sede" class="col-md-4 col-form-label text-md-right">{{ __('Área') }}</label>
    <div class="col-md-6">
        <input id="nueva_area" type="text" class="new-inputs form-control @error('nueva_area') is-invalid @enderror" name="nueva_area" value="{{ old('nueva_area') }}" required autocomplete="nueva_area" autofocus>
        @error('nueva_area')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>