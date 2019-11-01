<!-- Titulo -->
<div class="form-group row">
        <label for="titulo_id" class="col-md-4 col-form-label text-md-right">{{ __('Título') }}</label>
        <div class="col-md-6">
        <select id="titulo_id" class="default-selects form-control @error('titulo_id') is-invalid @enderror" name="titulo_id" autocomplete="titulo_id" autofocus>

            @if(isset($estudio))
            <!-- EDITAR -->
                <option selected="true" value="">Seleccione...</option>
                @foreach($titulos as $t)
                    @if($estudio->getOriginal('grado_academico_id') === $t->getOriginal('grado_academico_id'))
                        <option value="{{ $t->id }}" {{ $estudio->getOriginal('titulo_id') == $t->getOriginal('titulo_id') ? 'selected' : ''}}>{{ $t->titulo_id }}</option>
                    @endif                   
                @endforeach
            @else
            <!-- CREATE -->
                <option selected="true" value="" selected>Seleccione...</option>
            @endif
       
        </select>
        @error('titulo_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>  