@php isset($socio->direccion) ? $direccion = $socio->direccion : $direccion = '' @endphp
<!-- Dirección -->
<div class="form-group row">
    <label for="direccion" class="col-md-4 col-form-label text-md-right">{{ __('Dirección') }}</label>
    <div class="col-md-6">
        <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{ old('direccion') == true ? old('direccion') : $direccion }}" autocomplete="direccion" autofocus>

        {{-- validacion php --}}
        <small class="form-text text-danger"><strong>@if($errors->has('direccion')) {{ $errors->first('direccion') }}@endif</strong></small>

    </div>
</div>  