@if(isset($registro) && $registro->socio_id != null)
    @php
        $socio_id = $registro->getOriginal('socio_id');
    @endphp
@else
    @php
        $socio_id = '';
    @endphp
@endif

<!-- socios -->
<div class="form-group row">
    <label for="socio_id" class="col-md-4 col-form-label text-md-right">{{ __('Socios') }}</label>
    <div class="col-md-6">
        <select id="socio_id" class="default-selects form-control @error('socio_id') is-invalid @enderror select2-socios-contables" name="socio_id" autocomplete="socio_id" autofocus>

            <option selected="true" value="">Seleccione...</option>

            @if(old('socio_id') === null)
                {{-- loop sin old --}}
                @foreach($socios as $s)
                    <option value="{{ $s->id }}" {{ $socio_id == $s->id ? 'selected' : ''}}>{{ $s->apellido1 }} {{ $s->apellido2 }}, {{ $s->nombre1 }} {{ $s->nombre2 }}</option>
                @endforeach
            @else
                {{-- loop con old --}}
                @foreach($socios as $s)
                    <option value="{{ $s->id }}" @if(old('socio_id') == $s->id) {{ 'selected' }} @endif>@if($s->apellido2 != null) {{ $s->apellido1 }} {{ $s->apellido2 }}, @else {{ $s->apellido1 }}, @endif {{ $s->nombre1 }} {{ $s->nombre2 }}</option>
                @endforeach
            @endif

        </select>

        {{-- validacion php --}}
        <small class="form-text text-danger"><strong>@if($errors->has('socio_id')) {{ $errors->first('socio_id') }}@endif</strong></small>
    </div>
</div>

