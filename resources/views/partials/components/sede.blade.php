<!-- Sede -->
<div class="form-group row">
        <label for="sede_id" class="col-md-4 col-form-label text-md-right">{{ __('Sede') }}</label>
        <div class="col-md-6">
        <select id="sede_id" class="default-selects form-control @error('sede_id') is-invalid @enderror" name="sede_id" required autocomplete="sede_id" autofocus>
            <option selected="true" value="">Seleccione...</option>
            @foreach($sedes as $s)
            <option value="{{ $s->id }}">{{ $s->nombre }}</option>
            @endforeach
            <option value="new">Nuevo...</option>
        </select>
        @error('sede_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>   