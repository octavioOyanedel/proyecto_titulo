@php 
	$celular = '';
@endphp
@isset($socio)
    @php 
    	$celular = $socio->celular; 
    @endphp
@endisset

<!-- Celular -->
<div class="form-group row">
    <label for="celular" class="col-md-4 col-form-label text-md-right">{{ __('Celular') }}</label>
    <div class="col-md-6">
        <input id="celular" type="text" class="form-control @error('celular') is-invalid @enderror" name="celular" value="{{ old('celular') == true ? old('celular') : $celular }}" autocomplete="celular" autofocus placeholder="Ej. 971254626" maxlength="9">

        {{-- validacion php --}}
        <small class="form-text text-danger"><strong>@if($errors->has('celular')) {{ $errors->first('celular') }}@endif</strong></small>

    </div>
</div>