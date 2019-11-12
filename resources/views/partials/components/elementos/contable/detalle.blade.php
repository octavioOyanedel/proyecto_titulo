@php 
	$detalle = '';
@endphp
@isset($registro)
    @php 
    	$detalle = $registro->detalle; 
    @endphp
@endisset

<!-- detalle -->
<div class="form-group row">
    <label for="detalle" class="col-md-4 col-form-label text-md-right">{{ __('Detalle') }}</label>
    <div class="col-md-6">
        <input id="detalle" type="text" class="form-control @error('detalle') is-invalid @enderror" name="detalle" value="{{ old('detalle') }}" autocomplete="detalle" autofocus>

        {{-- validacion php --}}
        <small class="form-text text-danger"><strong>@if($errors->has('detalle')) {{ $errors->first('detalle') }}@endif</strong></small>
    </div>
</div>