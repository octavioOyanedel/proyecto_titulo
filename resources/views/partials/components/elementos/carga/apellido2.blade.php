@php $apellido2 = '' @endphp
@isset($cargaFamiliar)
    @php $apellido2 = $cargaFamiliar->apellido2 @endphp
@endisset
<!-- Apellido 2-->
<div class="form-group row">
    <label for="apellido2" class="col-md-4 col-form-label text-md-right">{{ __('Apellido materno') }}</label>
    <div class="col-md-6">
        <input id="apellido2" type="text" class="form-control @error('apellido2') is-invalid @enderror" name="apellido2" value="{{ old('apellido2') == true ? old('apellido2') : $apellido2 }}" autocomplete="apellido2" autofocus>

        {{-- validacion php --}}
        <small class="form-text text-danger"><strong>@if($errors->has('apellido2')) {{ $errors->first('apellido2') }}@endif</strong></small>
        
    </div>
</div>