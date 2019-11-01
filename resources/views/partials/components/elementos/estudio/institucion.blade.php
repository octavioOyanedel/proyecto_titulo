<!-- Institución -->
<div class="form-group row">
        <label for="institucion_id" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Institución educacional') }}</label>
        <div class="col-md-6">
        <select id="institucion_id" class="default-selects form-control @error('institucion_id') is-invalid @enderror" name="institucion_id" required autocomplete="institucion_id" autofocus>
            @if(isset($estudio))
            <!-- EDITAR -->
                <option selected="true" value="">Seleccione...</option>
                @foreach($instituciones as $i)
                    @if($estudio->getOriginal('grado_academico_id') === $i->getOriginal('grado_academico_id'))
                        <option value="{{ $i->id }}" {{ $estudio->getOriginal('institucion_id') == $i->getOriginal('institucion_id') ? 'selected' : ''}}>{{ $i->institucion_id }}</option>
                    @endif                   
                @endforeach
            @else
            <!-- CREATE -->
                <option selected="true" value="" selected>Seleccione...</option>
            @endif
        </select>
        @error('institucion_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>   