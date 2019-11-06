@php
    $id = 0;
@endphp
<!-- Área -->
<div class="form-group row">
    <label for="area_id" class="col-md-4 col-form-label text-md-right">{{ __('Área') }}</label>
    <div class="col-md-6">
	    <select id="area_id" class="default-selects form-control @error('area_id') is-invalid @enderror" name="area_id" autocomplete="area_id" autofocus>
	        <option selected="true" value="">Seleccione...</option>
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
    </div>
</div> 