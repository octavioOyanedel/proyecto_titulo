<!-- cuentas bancarias -->
<div class="form-group row">
    <label for="cuenta_id" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Cuentas') }}</label>
    <div class="col-md-6">
        <select id="cuenta_id" class="default-selects form-control @error('cuenta_id') is-invalid @enderror" name="cuenta_id" required autocomplete="cuenta_id" autofocus>
            <option selected="true" value="">Seleccione...</option>
            @foreach($cuentas as $c)
                <option value="{{ $c->id }}">{{ $c->tipo_cuenta_id }} N° {{ $c->numero }} - {{ $c->banco_id }}</option>
            @endforeach
        </select>
        @error('cuenta_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div> 