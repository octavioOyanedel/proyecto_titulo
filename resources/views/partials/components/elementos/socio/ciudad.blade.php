@php
    $id = 0;
@endphp

<!-- Ciudad -->
<div class="form-group row">
    <label for="ciudad_id" class="col-md-4 col-form-label text-md-right">{{ __('Ciudad') }}</label>
    <div class="col-md-6">
        <select id="ciudad_id" class="default-selects form-control @error('ciudad_id') is-invalid @enderror" name="ciudad_id" autocomplete="ciudad_id" autofocus>
            <option selected="true" value="">Seleccione...</option>

            @if(old('ciudad_id') === null)
                {{-- loop sin old --}}
                @if(isset($socio) && isset($ciudades))
                    @foreach($ciudades as $c) 
                        {{-- si existe socio -editar- --}}
                        <option value="{{ $c->id }}" {{ $socio->getOriginal('ciudad_id') == $c->id ? 'selected' : ''}}>{{ $c->nombre }}</option>
                    @endforeach
                @endif
            @else
                {{-- loop con old --}}
                @if(isset($socio) && isset($ciudades))
                    @foreach($ciudades as $c)        
                        <option value="{{ $c->id }}" @if(old('ciudad_id') == $c->id) {{ 'selected' }} @endif>{{ $c->nombre }}</option>
                    @endforeach
                @endif
            @endif


        </select>
        
        {{-- validacion php --}}
        <small class="form-text text-danger"><strong>@if($errors->has('ciudad_id')) {{ $errors->first('ciudad_id') }}@endif</strong></small>

        {{-- captura valor old --}}
    	@if(old('ciudad_id') != null)
    		@php 
    			$id = old('ciudad_id');
    		@endphp

    	@endif

	   <input id="old_ciudad" type="hidden" value="{{ $id }}">
       
       @isset($socio)
            <input id="edit_ciudad" type="hidden" value="@if($socio->ciudad_id) {{ $socio->getOriginal('ciudad_id') }} @else {{ null }} @endif">
       @endisset
    </div>
</div>