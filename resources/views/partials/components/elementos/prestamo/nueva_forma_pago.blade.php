<!-- Nueva nacionalidad -->
<div class="form-group new-divs row" id="new_div_nation">
    <label for="nueva_forma_pago" class="col-md-4 col-form-label text-md-right">{{ __('Forma de pago') }}</label>
    <div class="col-md-6">
        <input id="nueva_forma_pago" type="text" class="new-inputs form-control @error('nueva_forma_pago') is-invalid @enderror" name="nueva_forma_pago" value="{{ old('nueva_forma_pago') }}" required autocomplete="nueva_forma_pago" autofocus>
        @error('nueva_forma_pago')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>  