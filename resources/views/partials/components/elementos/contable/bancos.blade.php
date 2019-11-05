@php isset($cuenta->banco_id) ? $banco_id = $cuenta->getOriginal('banco_id') : $banco_id = '' @endphp
<!-- bancos -->
<div class="form-group row">
    <label for="banco_id" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span></span>{{ __('Bancos') }}</label>
    <div class="col-md-6">
        <select id="banco_id" class="default-selects form-control @error('banco_id') is-invalid @enderror" name="banco_id" required autocomplete="banco_id" autofocus>
            <option selected="true" value="">Seleccione...</option>
            @foreach($bancos as $b)
                <option value="{{ $b->id }}" {{ $banco_id == $b->id ? 'selected' : ''}}>{{ $b->nombre }}</option>
            @endforeach
        </select>
        @error('banco_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div> 