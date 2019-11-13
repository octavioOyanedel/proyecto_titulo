@php $apellido1 = '' @endphp
@isset($usuario)
    @php $apellido1 = $usuario->apellido1 @endphp
@endisset
<!-- Apellido -->
<div class="form-group row">
    <label for="apellido1" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Apellido paterno') }}</label>
    <div class="col-md-6">
        <input id="apellido1" type="text" class="form-control @error('apellido1') is-invalid @enderror" name="apellido1" value="{{ old('apellido1') == true ? old('apellido1') : $apellido1 }}" required autofocus>

        {{-- validacion php --}}
        <small class="form-text text-danger"><strong>@if($errors->has('apellido1')) {{ $errors->first('apellido1') }}@endif</strong></small>
        
    </div>
</div>