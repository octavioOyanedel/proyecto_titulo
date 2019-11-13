@php $password = '' @endphp
@isset($usuario)
    @php $password = $usuario->password @endphp
@endisset
{{ old('password') }}
<!-- Usuario -->
<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">
    	<span title="Campo obligatorio." class="text-danger"><button type="button" class="btn btn-sm btn-outline-dark rounded-circle mr-2 pb-0" data-container="body" data-toggle="popover" data-placement="left" data-content="La contraseña debe contener entre 8 y 15 caracteres alfanuméricos (solo números y letras).">?</button><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Contraseña') }}</label>

    <div class="col-md-6">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="" required autocomplete="new-password" maxlength="15" minlength="8">

        {{-- validacion php --}}
        <small class="form-text text-danger"><strong>@if($errors->has('password')) {{ $errors->first('password') }}@endif</strong></small>

    </div>
</div>