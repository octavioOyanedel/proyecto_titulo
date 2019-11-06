@if(isset($socio) && $socio->nacionalidad_id != null)
    @php
        $nacionalidad_id = $socio->getOriginal('nacionalidad_id');
    @endphp
@else
    @php
        $nacionalidad_id = '';
    @endphp
@endif

<!-- Nacionalidad -->
<div class="form-group row">
    <label for="nacionalidad_id" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Nacionalidad') }}</label>
    <div class="col-md-6">
        <select id="nacionalidad_id" class="default-selects form-control @error('nacionalidad_id') is-invalid @enderror" name="nacionalidad_id" autocomplete="nacionalidad_id" autofocus>

            <option selected="true" value="">Seleccione...</option>

            @if(old('nacionalidad_id') === null)
                {{-- loop sin old --}}
                @foreach($nacionalidades as $n)
                    <option value="{{ $n->id }}" {{ $nacionalidad_id == $n->id ? 'selected' : ''}}>{{ $n->nombre }}</option>
                @endforeach
            @else
                {{-- loop con old --}}
                @foreach($nacionalidades as $n)      
                    <option value="{{ $n->id }}" @if(old('nacionalidad_id') == $n->id) {{ 'selected' }} @endif>{{ $n->nombre }}</option>
                @endforeach
            @endif

        </select>

        {{-- validacion php --}}
        <small class="form-text text-danger"><strong>@if($errors->has('nacionalidad_id')) {{ $errors->first('nacionalidad_id') }}@endif</strong></small>

    </div>
</div> 