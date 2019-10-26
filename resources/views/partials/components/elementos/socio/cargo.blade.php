@php isset($socio->cargo_id) ? $cargo_id = $socio->getOriginal('cargo_id') : $cargo_id = '' @endphp
<!-- Cargo -->
<div class="form-group row">
        <label for="cargo_id" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Cargo') }}</label>
        <div class="col-md-6">
        <select id="cargo_id" class="default-selects form-control @error('cargo_id') is-invalid @enderror" name="cargo_id" required autocomplete="cargo_id" autofocus>
            <option selected="true" value="">Seleccione...</option>
            @foreach($cargos as $c)
                <option value="{{ $c->id }}" {{ $cargo_id == $c->id ? 'selected' : ''}}>{{ $c->nombre }}</option>
            @endforeach
        </select>
        @error('cargo_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>  