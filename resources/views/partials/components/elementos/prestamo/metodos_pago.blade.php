
<!-- formas de pago -->
<div class="form-group row">
    <label for="forma_pago_id" class="col-md-4 col-form-label text-md-right">{{ __('Método de pago') }}</label>
    <div class="col-md-6">
        <select id="forma_pago_id" class="default-selects form-control @error('forma_pago_id') is-invalid @enderror" name="forma_pago_id" required autocomplete="forma_pago_id" autofocus>
            <option selected="true" value="">Seleccione...</option>
            @foreach($formas_pago as $f)
            <option value="{{ $f->id }}">{{ $f->nombre }}</option>
            @endforeach
        </select>
        @error('forma_pago_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div> 