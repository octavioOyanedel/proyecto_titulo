<!-- Nueva cargo -->
<div class="form-group new-divs row" id="new_div_job">
    <label for="nueva_sede" class="col-md-4 col-form-label text-md-right">{{ __('Cargo') }}</label>
    <div class="col-md-6">
        <input id="nuevo_cargo" type="text" class="new-inputs form-control @error('nuevo_cargo') is-invalid @enderror" name="nuevo_cargo" value="{{ old('nuevo_cargo') }}" required autocomplete="nuevo_cargo" autofocus>
        @error('nuevo_cargo')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>  