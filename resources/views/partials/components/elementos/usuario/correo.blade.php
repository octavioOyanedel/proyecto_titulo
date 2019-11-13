@php $email = '' @endphp
@isset($usuario)
    @php $email = $usuario->email @endphp
@endisset

<!-- Correo usuario-->
<div class="form-group row">
    <label for="email" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Correo') }}</label>

    <div class="col-md-6">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') == true ? old('email') : $email }}" required autocomplete="email">

        {{-- validacion php --}}
        <small id="error-email-php" class="form-text text-danger"><strong>@if($errors->has('email')) {{ $errors->first('email') }}@endif</strong></small>

        {{-- validacion javascript --}}
		<small id="error-email" class="d-none form-text text-danger font-weight-bold"></small>

		<small id="comprobar-email" class="form-text text-secundary d-none">
			<div class="spinner-border spinner-border-sm" role="status">
				<span class="sr-only">Comprobando...</span>
			</div>&nbsp;&nbsp;Comprobando...		
		</small>

		<small id="email-ok" class="d-done form-text text-success font-weight-bold"></small>

    </div>

  		@php
		    $email = '';
		@endphp
        {{-- captura valor old --}}
        @if(old('email') != null)
            @php 
                $email = old('email');
            @endphp
        @endif

        <input id="old_email" type="hidden" value="{{ $email }}">  
</div>