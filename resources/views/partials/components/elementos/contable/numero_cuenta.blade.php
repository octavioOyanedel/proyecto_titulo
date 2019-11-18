@php $numero = '' @endphp
@isset($cuenta)
    @php $numero = $cuenta->numero @endphp
@endisset

<!-- nuevo número cuenta -->
<div class="form-group row">
    <label for="numero" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Número de cuenta') }}</label>
    <div class="col-md-6">
        <input id="numero" type="text" class="form-control @error('numero') is-invalid @enderror" name="numero" value="{{ old('numero') == true ? old('numero') : $numero }}" required autocomplete="numero" autofocus placeholder="Ej. 001-123-1234">

        {{-- validacion php --}}
        <small id="error-numero-php" class="form-text text-danger"><strong>@if($errors->has('numero')) {{ $errors->first('numero') }}@endif</strong></small>

        {{-- validacion javascript --}}
		<small id="error-numero-cuenta" class="d-none form-text text-danger font-weight-bold"></small>

		<small id="comprobar-numero-cuenta" class="form-text text-secundary d-none">
			<div class="spinner-border spinner-border-sm" role="status">
				<span class="sr-only">Comprobando...</span>
			</div>&nbsp;&nbsp;Comprobando...		
		</small>

		<small id="numero-cuenta-ok" class="d-done form-text text-success font-weight-bold"></small>
    </div>
</div>