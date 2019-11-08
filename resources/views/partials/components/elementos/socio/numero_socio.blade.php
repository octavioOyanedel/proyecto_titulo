@php 
	$numero_socio = '';
@endphp
@isset($socio)
    @php 
    	$numero_socio = $socio->numero_socio; 
    @endphp
@endisset

<!-- Número socio -->
<div class="form-group row">
    <label for="numero_socio" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Número de socio') }}</label>
    <div class="col-md-6">
        <input id="numero_socio" type="text" class="form-control @error('numero_socio') is-invalid @enderror" name="numero_socio" value="{{ old('numero_socio') == true ? old('numero_socio') : $numero_socio }}" required autocomplete="numero_socio" autofocus maxlength="4">

        {{-- validacion php --}}
        <small id="error-numero-php" class="form-text text-danger"><strong>@if($errors->has('numero_socio')) {{ $errors->first('numero_socio') }}@endif</strong></small>
        
        {{-- validacion javascript --}}
		<small id="error-numero" class="d-none form-text text-danger font-weight-bold"></small>

		<small id="comprobar-numero" class="form-text text-secundary d-none">
			<div class="spinner-border spinner-border-sm" role="status">
				<span class="sr-only">Comprobando...</span>
			</div>&nbsp;&nbsp;Comprobando...		
		</small>

		<small id="numero-ok" class="d-done form-text text-success font-weight-bold"></small>

    </div>
</div>