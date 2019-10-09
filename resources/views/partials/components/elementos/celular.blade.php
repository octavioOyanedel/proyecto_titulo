@php isset($socio->celular) ? $celular = $socio->celular : $celular = '' @endphp
<!-- Celular -->
<div class="form-group row">
    <label for="celular" class="col-md-4 col-form-label text-md-right">{{ __('Celular') }}</label>
    <div class="col-md-6">
        <input id="celular" type="text" class="form-control @error('celular') is-invalid @enderror" name="celular" value="{{ old('celular') == true ? old('celular') : $celular }}" required autocomplete="celular" autofocus>
        @error('celular')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>