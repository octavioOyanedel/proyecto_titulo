@php $nombre1 = '' @endphp
@isset($cargaFamiliar)
    @php $nombre1 = $cargaFamiliar->nombre1 @endphp
@endisset
<!-- Nombre -->
<div class="form-group row">
    <label for="nombre1" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Primer nombre') }}</label>
    <div class="col-md-6">
        <input id="nombre1" type="text" class="form-control @error('nombre1') is-invalid @enderror" name="nombre1" value="{{ old('nombre1') == true ? old('nombre1') : $nombre1 }}" required autofocus>

        {{-- validacion php --}}
        <small class="form-text text-danger"><strong>@if($errors->has('nombre1')) {{ $errors->first('nombre1') }}@endif</strong></small>
        
    </div>
</div>