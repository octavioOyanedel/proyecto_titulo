@php isset($usuario) ? $email = $usuario->email : $email = '' @endphp
<!-- Correo usuario-->
<div class="form-group row">
    <label for="email" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>* </b></span>{{ __('Correo') }}</label>

    <div class="col-md-6">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') == true ? old('email') : $email }}" required autocomplete="email">
		<small class="text-danger d-none" id="error-email" class="form-text text-muted"></small>
		<small class="text-secundary d-none" id="comprobar-email" class="form-text text-muted">
			<div class="spinner-border spinner-border-sm" role="status">
				<span class="sr-only">Loading...</span>
			</div> comprobando...		
		</small>
		<small class="text-success d-done" id="email-ok" class="form-text text-muted"></small>
    </div>
</div>