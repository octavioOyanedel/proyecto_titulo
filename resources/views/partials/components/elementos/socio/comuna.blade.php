@if(isset($socio) && $socio->comuna_id != null)
    @php
        $comuna_id = $socio->getOriginal('comuna_id');
    @endphp
@else
    @php
        $comuna_id = '';
    @endphp
@endif

<!-- Comuna -->
<div class="form-group row">
    <label for="comuna_id" class="col-md-4 col-form-label text-md-right">{{ __('Comuna') }}</label>
    <div class="col-md-6">
        <select id="comuna_id" class="default-selects form-control @error('comuna_id') is-invalid @enderror" name="comuna_id" autocomplete="comuna_id" autofocus>
            
            <option selected="true" value="">Seleccione...</option>

            @if(old('comuna_id') === null)
                {{-- loop sin old --}}
                @foreach($comunas as $c)        
                    <option value="{{ $c->id }}" {{ $comuna_id == $c->id ? 'selected' : ''}}>{{ $c->nombre }}</option>
                @endforeach
            @else
                {{-- loop con old --}}
                @foreach($comunas as $c)        
                    <option value="{{ $c->id }}" @if(old('comuna_id') == $c->id) {{ 'selected' }} @endif>{{ $c->nombre }}</option>
                @endforeach
            @endif

        </select>

    {{-- validacion php --}}
    <small class="form-text text-danger"><strong>@if($errors->has('comuna_id')) {{ $errors->first('comuna_id') }}@endif</strong></small>

    </div>
</div>  