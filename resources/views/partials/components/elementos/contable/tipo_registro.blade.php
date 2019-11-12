@php
    $tipo_registro_contable_id = '';
@endphp
@if(isset($registro) && $registro->tipo_registro_contable_id != null)
    @php
        $tipo_registro_contable_id = $registro->getOriginal('tipo_registro_contable_id');
    @endphp
@endif

<!-- tipo de registro -->
<div class="form-group row">
    <label for="tipo_registro_contable_id" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Tipo de registro') }}</label>
    <div class="col-md-6">
        <select id="tipo_registro_contable_id" class="default-selects form-control @error('tipo_registro_contable_id') is-invalid @enderror" name="tipo_registro_contable_id" required autocomplete="tipo_registro_contable_id" autofocus>

            <option selected="true" value="">Seleccione...</option>

            @if(old('estado_socio_id') === null)
                {{-- loop sin old --}}
                @foreach($tipos_registro as $t)
                    <option value="{{ $t->id }}">{{ $t->nombre }}</option>
                @endforeach
            @else
                {{-- loop con old --}}
                @foreach($tipos_registro as $t)      
                    <option value="{{ $t->id }}" @if(old('tipo_registro_contable_id') == $t->id) {{ 'selected' }} @endif>{{ $t->nombre }}</option>
                @endforeach
            @endif

        </select>

        {{-- validacion php --}}
        <small class="form-text text-danger"><strong>@if($errors->has('tipo_registro_contable_id')) {{ $errors->first('tipo_registro_contable_id') }}@endif</strong></small>

    </div>
</div> 

