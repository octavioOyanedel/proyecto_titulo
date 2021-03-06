@php
    $id = 0;
@endphp
<!-- Área -->
<div class="form-group row">
    <label for="area_id" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Área') }}</label>
    <div class="col-md-6">
	    <select id="area_id" class="default-selects form-control @error('area_id') is-invalid @enderror" name="area_id" autocomplete="area_id" autofocus required>
	        <option selected="true" value="">Seleccione...</option>
            @if(old('area_id') === null)
                {{-- loop sin old --}}
                @if(isset($socio) && isset($areas))
                    @foreach($areas as $a) 
                        {{-- si existe socio -editar- --}}
                        <option value="{{ $a->id }}" {{ $socio->getOriginal('area_id') == $a->id ? 'selected' : ''}}>{{ $a->nombre }}</option>
                    @endforeach
                @endif
            @else
                {{-- loop con old --}}
                @if(isset($socio) && isset($areas))
                    @foreach($areas as $a)        
                        <option value="{{ $a->id }}" @if(old('area_id') == $a->id) {{ 'selected' }} @endif>{{ $a->nombre }}</option>
                    @endforeach
                @endif
            @endif	        
	    </select>

        {{-- validacion php --}}
        <small class="form-text text-danger"><strong>@if($errors->has('area_id')) {{ $errors->first('area_id') }}@endif</strong></small>

	    {{-- captura valor old --}}
		@if(old('area_id') != null)
			@php
				$id = old('area_id');
			@endphp
		@endif

		<input id="old_area" type="hidden" value="{{ $id }}">
		@isset($socio)
			<input id="edit_area" type="hidden" value="@if($socio->area_id) {{ $socio->getOriginal('area_id') }} @else {{ null }} @endif">
		@endisset
    </div>
</div>