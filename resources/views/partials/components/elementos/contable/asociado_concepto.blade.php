@php isset($asociado) ? $concepto = $asociado->concepto : $concepto = '' @endphp
<!-- Nuevo concepto asociado -->
<div class="form-group new-divs row" id="new_div_nation">
    <label for="concepto" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>* </b></span>{{ __('Concepto') }}</label>
    <div class="col-md-6">
        <input id="concepto" type="text" class="new-inputs form-control @error('concepto') is-invalid @enderror" name="concepto" value="{{ old('concepto') == true ? old('concepto') : $concepto }}" required autocomplete="concepto" autofocus>
        @error('concepto')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>  