<!-- tipo de registro -->
<div class="form-group row">
    <label for="tipo_registro_contable_id" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Tipo de registro') }}</label>
    <div class="col-md-6">
        <select id="tipo_registro_contable_id" class="default-selects form-control @error('tipo_registro_contable_id') is-invalid @enderror" name="tipo_registro_contable_id" required autocomplete="tipo_registro_contable_id" autofocus>
            <option selected="true" value="">Seleccione...</option>
            @foreach($tipos_registro as $t)
                <option value="{{ $t->id }}">{{ $t->nombre }}</option>
            @endforeach
        </select>
        @error('tipo_registro_contable_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div> 