@php $nombre = '' @endphp
@isset($tipoCuenta)
    @php $nombre = $tipoCuenta->nombre @endphp
@endisset

<!-- tipo cuenta -->
<div class="form-group row">
    <label for="nombre" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Tipo Cuenta') }}</label>
    <div class="col-md-6">
        <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') == true ? old('nombre') : $nombre }}" required autocomplete="nombre" autofocus>

        {{-- validacion php --}}
        <small class="form-text text-danger"><strong>@if($errors->has('nombre')) {{ $errors->first('nombre') }}@endif</strong></small>

    </div>
</div>