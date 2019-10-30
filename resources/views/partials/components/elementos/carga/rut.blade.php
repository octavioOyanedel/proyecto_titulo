@php $rut = '' @endphp
@isset($cargaFamiliar)
    @php $rut = $cargaFamiliar->getOriginal('rut') @endphp
@endisset
<!-- Rut -->
<div class="form-group row">
    <label for="rut" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Rut') }}</label>
    <div class="col-md-6">
        <input id="rut" type="text" class="form-control @error('rut') is-invalid @enderror" name="rut" value="{{ old('rut') == true ? old('rut') : $rut }}" required autocomplete="rut" autofocus placeholder="Ej. 138816389" autofocus maxlength="9">
        <small class="text-danger d-none" id="error-rut" class="form-text text-muted"></small>
        <small class="text-secundary d-none" id="comprobar-rut" class="form-text text-muted">
            <div class="spinner-border spinner-border-sm" role="status">
                <span class="sr-only">Loading...</span>
            </div> comprobando...       
        </small>
        <small class="text-success d-done" id="rut-ok" class="form-text text-muted"></small>
    </div>
</div>