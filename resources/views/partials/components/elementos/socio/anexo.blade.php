@php isset($socio->anexo) ? $anexo = $socio->anexo : $anexo = '' @endphp
<!-- Anexo -->
<div class="form-group row">
    <label for="anexo" class="col-md-4 col-form-label text-md-right">{{ __('Anexo') }}</label>
    <div class="col-md-6">
        <input id="anexo" type="text" class="form-control @error('anexo') is-invalid @enderror" name="anexo" value="{{ old('anexo') == true ? old('anexo') : $anexo }}" autocomplete="anexo" autofocus placeholder="Ej. 3400" maxlength="4">

        {{-- validacion php --}}
        <small class="form-text text-danger"><strong>@if($errors->has('anexo')) {{ $errors->first('anexo') }}@endif</strong></small>
        
    </div>
</div>