@php isset($area) ? $nombre = $area->nombre : $nombre = '' @endphp
<!-- Nueva área -->
<div class="form-group new-divs row" id="new_div_area">
    <label for="nombre" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Área') }}</label>
    <div class="col-md-6">
        <input id="nombre" type="text" class="new-inputs form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') == true ? old('nombre') : $nombre }}" required autocomplete="nombre" autofocus>
        @error('nombre')

        {{-- validacion php --}}
        <small class="form-text text-danger"><strong>@if($errors->has('nombre')) {{ $errors->first('nombre') }}@endif</strong></small>

    </div>
</div>