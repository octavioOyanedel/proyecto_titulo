@php $nombre = '' @endphp
@isset($cargo)
    @php $nombre = $cargo->nombre @endphp
@endisset

<!-- Nuevo cargo -->
<div class="form-group new-divs row" id="new_div_job">
    <label for="nombre" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Cargo') }}</label>
    <div class="col-md-6">
        <input id="nombre" type="text" class="new-inputs form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') == true ? old('nombre') : $nombre }}" required autocomplete="nombre" autofocus>

        {{-- validacion php --}}
        <small class="form-text text-danger"><strong>@if($errors->has('nombre')) {{ $errors->first('nombre') }}@endif</strong></small>

    </div>
</div>  