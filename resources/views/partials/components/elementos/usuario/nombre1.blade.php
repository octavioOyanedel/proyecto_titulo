@php $nombre1 = '' @endphp
@isset($usuario)
    @php $nombre1 = $usuario->nombre1 @endphp
@endisset
<!-- Nombre -->
<div class="form-group row">
    <label for="nombre1" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>* </b></span>{{ __('Primer nombre') }}</label>
    <div class="col-md-6">
        <input id="nombre1" type="text" class="form-control @error('nombre1') is-invalid @enderror" name="nombre1" value="{{ old('nombre1') == true ? old('nombre1') : $nombre1 }}" required autofocus>
        @error('nombre1')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>