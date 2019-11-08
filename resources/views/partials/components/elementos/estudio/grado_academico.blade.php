@php
    $grado_academico_id = '';
@endphp
@if(isset($estudio) && $estudio->grado_academico_id != null)
    @php
        $grado_academico_id = $estudio->getOriginal('grado_academico_id');
    @endphp
@endif

<!-- Nivel academico -->
<div class="form-group row">
        <label for="grado_academico_id" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Nivel educacional') }}</label>
        <div class="col-md-6">
        <select id="grado_academico_id" class="default-selects form-control @error('grado_academico_id') is-invalid @enderror" name="grado_academico_id" required autocomplete="grado_academico_id" autofocus>

            <option selected="true" value="">Seleccione...</option>

            @if(old('grado_academico_id') === null)
                {{-- loop sin old --}}
                @foreach($grados as $g)
                    <option value="{{ $g->id }}" {{ $grado_academico_id == $g->id ? 'selected' : ''}}>{{ $g->nombre }}</option>
                @endforeach 
            @else
                {{-- loop con old --}}
                @foreach($grados as $g)     
                    <option value="{{ $g->id }}" @if(old('grado_academico_id') == $g->id) {{ 'selected' }} @endif>{{ $g->nombre }}</option>
                @endforeach
            @endif

        </select>

        {{-- validacion php --}}
        <small class="form-text text-danger"><strong>@if($errors->has('grado_academico_id')) {{ $errors->first('grado_academico_id') }}@endif</strong></small>

    </div>
</div>   