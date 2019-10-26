@php isset($socio->sede_id) ? $sede_id = $socio->getOriginal('sede_id') : $sede_id = '' @endphp
<!-- Sede -->
<div class="form-group row">
        <label for="sede_id" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Sede') }}</label>
        <div class="col-md-6">
        <select id="sede_id" class="default-selects form-control @error('sede_id') is-invalid @enderror" name="sede_id" required autocomplete="sede_id" autofocus>
            <option selected="true" value="">Seleccione...</option>
            @foreach($sedes as $s)
                <option value="{{ $s->id }}" {{ $sede_id == $s->id ? 'selected' : ''}}>{{ $s->nombre }}</option>
            @endforeach
        </select>
        @error('sede_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>   