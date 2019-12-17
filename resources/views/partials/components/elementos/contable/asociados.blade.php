@php
    $asociado_id = '';
@endphp
@if(isset($registro) && $registro->asociado_id != null)
    @php
        $asociado_id = $registro->getOriginal('asociado_id');
    @endphp
@endif

<!-- asociado -->
<div class="form-group row">
    <label for="asociado_id" class="col-md-4 col-form-label text-md-right">{{ __('Asociados') }}</label>
    <div class="col-md-6">
        <select id="asociado_id" class="default-selects form-control @error('asociado_id') is-invalid @enderror" name="asociado_id" autocomplete="asociado_id" autofocus>

            <option selected="true" value="">Seleccione...</option>

            @if(old('asociado_id') === null)
                {{-- loop sin old --}}
                @foreach($asociados as $a)
                    <option value="{{ $a->id }}" {{ $asociado_id == $a->id ? 'selected' : ''}}>{{ $a->concepto }} @if($a->nombre != '' || $a->nombre != null) - {{ $a->nombre }} @endif</option>
                @endforeach
            @else
                {{-- loop con old --}}
                @foreach($asociados as $a)
                    <option value="{{ $a->id }}" @if(old('asociado_id') == $a->id) {{ 'selected' }} @endif>{{ $a->concepto }} @if($a->nombre != '' || $a->nombre != null) - {{ $a->nombre }} @endif</option>
                @endforeach
            @endif

        </select>

        {{-- validacion php --}}
        <small class="form-text text-danger"><strong>@if($errors->has('asociado_id')) {{ $errors->first('asociado_id') }}@endif</strong></small>

    </div>
</div>