@php isset($estadoSocio) ? $nombre = $estadoSocio->nombre : $nombre = '' @endphp
<!-- Nueva situación -->
<div class="form-group new-divs row" id="new_div_situation">
    <label for="nombre" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>* </b></span>{{ __('Situación') }}</label>
    <div class="col-md-6">
        <input id="nombre" type="text" class="new-inputs form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') == true ? old('nombre') : $nombre }}" required autocomplete="nombre" autofocus>
        @error('nombre')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>