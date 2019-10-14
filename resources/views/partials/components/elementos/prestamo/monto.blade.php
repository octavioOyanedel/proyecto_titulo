<!-- monto -->
<div class="form-group row">
    <label for="monto" class="col-md-4 col-form-label text-md-right">{{ __('Monto') }}</label>
    <div class="col-md-6">
        <input id="monto" type="text" class="form-control @error('monto') is-invalid @enderror" name="monto" value="{{ old('monto') }}" required autocomplete="monto" autofocus>
        @error('monto')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>