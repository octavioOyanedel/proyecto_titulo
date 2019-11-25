@php $nombre = '' @endphp
@isset($asociado)
    @php $nombre = $asociado->nombre @endphp
@endisset
<!-- Nuevo nombre asociado -->
<div class="form-group new-divs row" id="new_div_nation">
    <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
    <div class="col-md-6">
        <input id="nombre" type="text" class="new-inputs form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') == true ? old('nombre') : $nombre }}" autocomplete="nombre" autofocus>

        {{-- validacion php --}}
        <small class="form-text text-danger"><strong>@if($errors->has('nombre')) {{ $errors->first('nombre') }}@endif</strong></small>

    </div>
</div>  