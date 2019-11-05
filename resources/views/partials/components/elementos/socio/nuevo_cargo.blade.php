@php isset($cargo) ? $nombre = $cargo->nombre : $nombre = '' @endphp
<!-- Nueva cargo -->
<div class="form-group new-divs row" id="new_div_job">
    <label for="cargo" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Cargo') }}</label>
    <div class="col-md-6">
        <input id="cargo" type="text" class="new-inputs form-control @error('cargo') is-invalid @enderror" name="cargo" value="{{ old('nombre') == true ? old('nombre') : $nombre }}" required autocomplete="cargo" autofocus>
        @error('cargo')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>  