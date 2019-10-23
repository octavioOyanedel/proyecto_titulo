@php $nombre2 = '' @endphp
@isset($socio)
    @php $nombre2 = $socio->nombre2 @endphp
@endisset
<!-- Nombre 2 -->
<div class="form-group row">
    <label for="nombre2" class="col-md-4 col-form-label text-md-right">{{ __('Segundo nombre') }}</label>
    <div class="col-md-6">
        <input id="nombre2" type="text" class="form-control @error('nombre2') is-invalid @enderror" name="nombre2" value="{{ old('nombre2') == true ? old('nombre2') : $nombre2 }}"  autofocus>
        @error('nombre2')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>  