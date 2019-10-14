<!-- asociado -->
<div class="form-group row">
    <label for="asociado_id" class="col-md-4 col-form-label text-md-right">{{ __('Asociados') }}</label>
    <div class="col-md-6">
        <select id="asociado_id" class="default-selects form-control @error('asociado_id') is-invalid @enderror" name="asociado_id" required autocomplete="asociado_id" autofocus>
            <option selected="true" value="">Seleccione...</option>
            @foreach($asociados as $a)
                <option value="{{ $a->id }}">{{ $a->concepto }} - {{ $a->nombre }}</option>
            @endforeach
        </select>
        @error('asociado_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div> 