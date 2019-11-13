@if(isset($socio) && $socio->sede_id != null)
    @php
        $sede_id = $socio->getOriginal('sede_id');
    @endphp
@else
    @php
        $sede_id = '';
    @endphp
@endif

<!-- Sede -->
<div class="form-group row">
        <label for="sede_id" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Sede') }}</label>
        <div class="col-md-6">
        <select id="sede_id" class="default-selects form-control @error('sede_id') is-invalid @enderror" name="sede_id" required autocomplete="sede_id" autofocus>

            <option selected="true" value="">Seleccione...</option>

            @if(old('sede_id') === null)
                {{-- loop sin old --}}
                @foreach($sedes as $s) 
                    @if(isset($area))
                        {{-- si existe area -editar- --}}
                        <option value="{{ $s->id }}" {{ $area->getOriginal('sede_id') == $s->id ? 'selected' : ''}}>{{ $s->nombre }}</option>
                    @else
                        <option value="{{ $s->id }}" {{ $sede_id == $s->id ? 'selected' : ''}}>{{ $s->nombre }}</option>
                    @endif
                @endforeach
            @else
                {{-- loop con old --}}
                @foreach($sedes as $s)        
                    <option value="{{ $s->id }}" @if(old('sede_id') == $s->id) {{ 'selected' }} @endif>{{ $s->nombre }}</option>
                @endforeach
            @endif

        </select>

        {{-- validacion php --}}
        <small class="form-text text-danger"><strong>@if($errors->has('sede_id')) {{ $errors->first('sede_id') }}@endif</strong></small>
        
    </div>
</div>  