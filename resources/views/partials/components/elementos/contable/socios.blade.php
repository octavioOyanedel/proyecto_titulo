@php
    $socio_id = '';
@endphp
@if(isset($registro) && $registro->socio_id != null)
    @php
        $socio_id = $registro->getOriginal('socio_id');
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
                    <option value="{{ $s->id }}">{{ $s->apellido1 }} {{ $s->apellido2 }}, {{ $s->nombre1 }} {{ $s->nombre2 }}</option>
                @endforeach
            @else
                {{-- loop con old --}}
                @foreach($socios as $s)      
                    <option value="{{ $s->id }}" @if(old('socio_id') == $s->id) {{ 'selected' }} @endif>{{ $s->apellido1 }} {{ $s->apellido2 }}, {{ $s->nombre1 }} {{ $s->nombre2 }}</option>
                @endforeach
            @endif

        </select>

    </div>
</div> 

