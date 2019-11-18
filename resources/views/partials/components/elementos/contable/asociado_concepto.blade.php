@php $concepto = '' @endphp
@isset($asociado)
    @php $concepto = $asociado->concepto @endphp
@endisset

<!-- Nuevo concepto asociado -->
<div class="form-group new-divs row" id="new_div_nation">
    <label for="concepto" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Concepto') }}</label>
    <div class="col-md-6">
        <input id="concepto" type="text" class="new-inputs form-control @error('concepto') is-invalid @enderror" name="concepto" value="{{ old('concepto') == true ? old('concepto') : $concepto }}" autocomplete="concepto" autofocus>

        {{-- validacion php --}}
        <small class="form-text text-danger"><strong>@if($errors->has('concepto')) {{ $errors->first('concepto') }}@endif</strong></small>
        
    </div>
</div>  