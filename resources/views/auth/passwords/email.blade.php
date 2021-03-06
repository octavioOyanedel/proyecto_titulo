@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">{{ __('Restablecer la contraseña') }}</h3></div>

                <div class="card-body">
                    <div class="alert alert-dark mt-4 text-center" role="alert">
                        En caso de que correo no esté en la bandeja de entrada verificar las carpetas "SPAM" o "No deseados" de su cuenta de correo. El asunto del mensaje es: <b>Sind1 - Restablecer Contraseña.</b>
                    </div>                    
                    @if (session('status'))
                        <div class="alert alert-success text-center" role="alert">
                            <strong>{{ session('status') }}</strong>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Restablecer la contraseña') }}
                                </button>
                                    <a class="btn btn-link" href="{{ route('home') }}">
                                        {{ __('Ir a login') }}
                                    </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
