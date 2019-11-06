@if(isset($socio) && $socio->estado_socio_id != null)
    @php
        $estado_socio_id = $socio->getOriginal('estado_socio_id');
    @endphp
@else
    @php
        $estado_socio_id = '';
    @endphp
@endif

<!-- Situación -->
<div class="form-group row">
        <label for="estado_socio_id" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Estado socio') }}</label>
        <div class="col-md-6">
        <select id="estado_socio_id" class="default-selects form-control @error('estado_socio_id') is-invalid @enderror" name="estado_socio_id" required autocomplete="estado_socio_id" autofocus>

            <option selected="true" value="">Seleccione...</option>

            @if(old('estado_socio_id') === null)
                {{-- loop sin old --}}
                @foreach($estados as $e)
                    <option value="{{ $e->id }}" {{ $estado_socio_id == $e->id ? 'selected' : ''}}>{{ $e->nombre }}</option>
                @endforeach
            @else
                {{-- loop con old --}}
                @foreach($estados as $e)      
                    <option value="{{ $e->id }}" @if(old('estado_socio_id') == $e->id) {{ 'selected' }} @endif>{{ $e->nombre }}</option>
                @endforeach
            @endif

        </select>

        {{-- validacion php --}}
        <small class="form-text text-danger"><strong>@if($errors->has('estado_socio_id')) {{ $errors->first('estado_socio_id') }}@endif</strong></small>
        
    </div>
</div>