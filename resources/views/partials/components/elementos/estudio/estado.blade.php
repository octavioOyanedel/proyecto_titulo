@php isset($estudio->estado_grado_academico_id) ? $estado_grado_academico_id = $estudio->getOriginal('estado_grado_academico_id') : $estado_grado_academico_id = '' @endphp
<!-- Estado -->
<div class="form-group row">
        <label for="estado_grado_academico_id" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Estado') }}</label>
        <div class="col-md-6">
        <select id="estado_grado_academico_id" class="default-selects form-control @error('estado_grado_academico_id') is-invalid @enderror" name="estado_grado_academico_id" required autocomplete="estado_grado_academico_id" autofocus>
            <option selected="true" value="">Seleccione...</option>
            @foreach($estados as $e)
                <option value="{{ $e->id }}" {{ $estado_grado_academico_id == $e->id ? 'selected' : ''}}>{{ $e->nombre }}</option>
            @endforeach
        </select>
        @error('estado_grado_academico_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>   