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

            @foreach($grados as $g)
                <option value="{{ $g->id }}" {{ $grado_academico_id == $g->id ? 'selected' : ''}}>{{ $g->nombre }}</option>
            @endforeach            
        </select>

        {{-- validacion php --}}
        <small class="form-text text-danger"><strong>@if($errors->has('estado_socio_id')) {{ $errors->first('estado_socio_id') }}@endif</strong></small>

    </div>
</div>   