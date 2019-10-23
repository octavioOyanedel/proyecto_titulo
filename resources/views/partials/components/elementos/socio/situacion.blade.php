@php isset($socio->estado_socio_id) ? $estado_socio_id = $socio->getOriginal('estado_socio_id') : $estado_socio_id = '' @endphp
<!-- Situación -->
<div class="form-group row">
        <label for="estado_socio_id" class="col-md-4 col-form-label text-md-right">{{ __('Estado socio') }}</label>
        <div class="col-md-6">
        <select id="estado_socio_id" class="default-selects form-control @error('estado_socio_id') is-invalid @enderror" name="estado_socio_id" required autocomplete="estado_socio_id" autofocus>
            <option selected="true" value="">Seleccione...</option>
            @foreach($estados as $e)
                <option value="{{ $e->id }}" {{ $estado_socio_id == $e->id ? 'selected' : ''}}>{{ $e->nombre }}</option>
            @endforeach
        </select>
        @error('estado_socio_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>