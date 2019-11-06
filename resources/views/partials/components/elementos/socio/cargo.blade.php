@if(isset($socio) && $socio->cargo_id != null)
    @php
        $cargo_id = $socio->getOriginal('cargo_id');
    @endphp
@else
    @php
        $cargo_id = '';
    @endphp
@endif

<!-- Cargo -->
<div class="form-group row">
        <label for="cargo_id" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Cargo') }}</label>
        <div class="col-md-6">
        <select id="cargo_id" class="default-selects form-control @error('cargo_id') is-invalid @enderror" name="cargo_id" required autocomplete="cargo_id" autofocus>
            
            <option selected="true" value="">Seleccione...</option>

            @if(old('cargo_id') === null)
                {{-- loop sin old --}}
                @foreach($cargos as $c)      
                    <option value="{{ $c->id }}" {{ $cargo_id == $c->id ? 'selected' : ''}}>{{ $c->nombre }}</option>
                @endforeach
            @else
                {{-- loop con old --}}
                @foreach($cargos as $c)      
                    <option value="{{ $c->id }}" @if(old('cargo_id') == $c->id) {{ 'selected' }} @endif>{{ $c->nombre }}</option>
                @endforeach
            @endif

        </select>

        {{-- validacion php --}}
        <small class="form-text text-danger"><strong>@if($errors->has('cargo_id')) {{ $errors->first('cargo_id') }}@endif</strong></small>

    </div>
</div> 