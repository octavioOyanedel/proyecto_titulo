@php isset($usuario) ? $email = $usuario->email : $email = '' @endphp
<!-- Correo usuario-->
<div class="form-group row">
    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>

    <div class="col-md-6">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') == true ? old('email') : $email }}" required autocomplete="email">

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>