@php
    $id = 0;
@endphp
<!-- Ciudad -->
<div class="form-group row">
    <label for="ciudad_id" class="col-md-4 col-form-label text-md-right">{{ __('Ciudad') }}</label>
    <div class="col-md-6">
    <select id="ciudad_id" class="default-selects form-control @error('ciudad_id') is-invalid @enderror" name="ciudad_id" autocomplete="ciudad_id" autofocus>
        <option selected="true" value="">Seleccione...</option>
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
    </div>
</div>
{{ var_dump(old('ciudad_id')) }}
