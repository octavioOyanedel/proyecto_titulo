@php
    $estado_grado_academico_id = '';
@endphp
@if(isset($estudio) && $estudio->estado_grado_academico_id != null)
    @php
        $estado_grado_academico_id = $estudio->getOriginal('estado_grado_academico_id');
    @endphp
@endif

<!-- Estado -->
<div class="form-group row">
        <label for="estado_grado_academico_id" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Estado') }}</label>
        <div class="col-md-6">
        <select id="estado_grado_academico_id" class="default-selects form-control @error('estado_grado_academico_id') is-invalid @enderror" name="estado_grado_academico_id" required autocomplete="estado_grado_academico_id" autofocus>     

            <option value="" selected>Seleccione...</option>

            @if(old('estado_grado_academico_id') === null)
                {{-- loop sin old --}}
                @foreach($estados as $e)
                    @if(isset($estudioRealizado))
                        {{-- si existe estudio -editar- --}}
                        <option value="{{ $e->id }}" {{ $estudioRealizado->getOriginal('estado_grado_academico_id') == $e->id ? 'selected' : ''}}>{{ $e->nombre }}</option>                     
                    @else
                        <option value="{{ $e->id }}" {{ $estado_grado_academico_id == $e->id ? 'selected' : ''}}>{{ $e->nombre }}</option>
                    @endif
                @endforeach 
            @else
                {{-- loop con old --}}
                @foreach($estados as $e)    
                    <option value="{{ $e->id }}" @if(old('estado_grado_academico_id') == $e->id) {{ 'selected' }} @endif>{{ $e->nombre }}</option>
                @endforeach
            @endif

        </select>

        {{-- validacion php --}}
        <small class="form-text text-danger"><strong>@if($errors->has('estado_grado_academico_id')) {{ $errors->first('estado_grado_academico_id') }}@endif</strong></small>

    </div>
</div>   