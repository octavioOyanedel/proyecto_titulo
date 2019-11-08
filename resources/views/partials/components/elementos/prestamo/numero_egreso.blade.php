@php 
	$numero_egreso = '';
@endphp
@isset($prestamo)
    @php 
    	$numero_egreso = $prestamo->numero_egreso; 
    @endphp
@endisset

<!-- número de egreso -->
<div class="form-group row">
    <label for="numero_egreso" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Número de egreso') }}</label>
    <div class="col-md-6">
        <input id="numero_egreso" type="text" class="form-control @error('numero_egreso') is-invalid @enderror" name="numero_egreso" value="{{ old('numero_egreso') }}" required autocomplete="numero_egreso" autofocus maxlength="4">

        {{-- validacion php --}}
        <small id="error-numero-php" class="form-text text-danger"><strong>@if($errors->has('numero_egreso')) {{ $errors->first('numero_egreso') }}@endif</strong></small>

        {{-- validacion javascript --}}
		<small id="error-numero-egreso" class="d-none form-text text-danger font-weight-bold"></small>

		<small id="comprobar-numero-egreso" class="form-text text-secundary d-none">
			<div class="spinner-border spinner-border-sm" role="status">
				<span class="sr-only">Comprobando...</span>
			</div>&nbsp;&nbsp;Comprobando...		
		</small>

		<small id="numero-egreso-ok" class="d-done form-text text-success font-weight-bold"></small>

    </div>
</div>