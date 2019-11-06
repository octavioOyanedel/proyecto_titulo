@php isset($socio) ? $correo = $socio->correo : $correo = '' @endphp
<!-- Correo socio-->
<div class="form-group row">
    <label for="correo" class="col-md-4 col-form-label text-md-right">{{ __('Correo electrónico') }}</label>
    <div class="col-md-6">
        <input id="correo" type="mail" class="form-control @error('correo') is-invalid @enderror" name="correo" value="{{ old('correo') == true ? old('correo') : $correo }}" autocomplete="correo" autofocus>
        
        {{-- validacion php --}}
        <small class="form-text text-danger"><strong>@if($errors->has('correo')) {{ $errors->first('correo') }}@endif</strong></small>
        {{-- validacion javascript --}}
		<small id="error-correo" class="d-none form-text text-danger font-weight-bold"></small>

		<small id="comprobar-correo" class="form-text text-secundary d-none">
			<div class="spinner-border spinner-border-sm" role="status">
				<span class="sr-only">Comprobando...</span>
			</div>&nbsp;&nbsp;Comprobando...		
		</small>

		<small id="correo-ok" class="d-done form-text text-success font-weight-bold"></small>

    </div>
</div> 