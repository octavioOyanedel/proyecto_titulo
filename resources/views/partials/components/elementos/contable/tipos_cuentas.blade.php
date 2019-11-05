@php isset($cuenta->tipo_cuenta_id) ? $tipo_cuenta_id = $cuenta->getOriginal('tipo_cuenta_id') : $tipo_cuenta_id = '' @endphp
<!-- tipos de cuentas -->
<div class="form-group row">
    <label for="tipo_cuenta_id" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Cuentas') }}</label>
    <div class="col-md-6">
        <select id="tipo_cuenta_id" class="default-selects form-control @error('tipo_cuenta_id') is-invalid @enderror" name="tipo_cuenta_id" required autocomplete="tipo_cuenta_id" autofocus>
            <option selected="true" value="">Seleccione...</option>
            @foreach($tipos_cuenta as $t)
                <option value="{{ $t->id }}" {{ $tipo_cuenta_id == $t->id ? 'selected' : ''}}>{{ $t->nombre }}</option>
            @endforeach
        </select>
        @error('tipo_cuenta_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div> 