@php isset($socio->nacionalidad_id) ? $nacionalidad_id = $socio->getOriginal('nacionalidad_id') : $nacionalidad_id = '' @endphp
<!-- Nacionalidad -->
<div class="form-group row">
    <label for="nacionalidad_id" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Nacionalidad') }}</label>
    <div class="col-md-6">
        <select id="nacionalidad_id" class="default-selects form-control @error('nacionalidad_id') is-invalid @enderror" name="nacionalidad_id" required autocomplete="nacionalidad_id" autofocus>
            <option selected="true" value="">Seleccione...</option>
            @foreach($nacionalidades as $n)
                <option value="{{ $n->id }}" {{ $nacionalidad_id == $n->id ? 'selected' : ''}}>{{ $n->nombre }}</option>
            @endforeach
        </select>
        @error('nacionalidad_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div> 