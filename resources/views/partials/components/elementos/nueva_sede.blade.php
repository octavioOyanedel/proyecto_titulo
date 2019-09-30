<!-- Nueva área -->
<div class="form-group new-divs row" id="new_div_sede">
    <label for="nueva_sede" class="col-md-4 col-form-label text-md-right">{{ __('Sede') }}</label>
    <div class="col-md-6">
        <input id="nueva_sede" type="text" class="new-inputs form-control @error('nueva_sede') is-invalid @enderror" name="nueva_sede" value="{{ old('nueva_sede') }}" required autocomplete="nueva_sede" autofocus>
        @error('nueva_sede')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>