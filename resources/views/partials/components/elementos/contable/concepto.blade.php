@php isset($concepto) ? $nombre = $concepto->nombre : $nombre = '' @endphp
<!-- cuentas bancarias -->
<div class="form-group row">
    <label for="nombre" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Concepto') }}</label>
    <div class="col-md-6">
        <select id="nombre" class="default-selects form-control @error('nombre') is-invalid @enderror" name="nombre" required autocomplete="nombre" autofocus>
            <option selected="true" value="">Seleccione...</option>
            @foreach($conceptos as $c)
                <option value="{{ $c->id }}">{{ $c->nombre }}</option>
            @endforeach
        </select>
        @error('cuenta_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div> 