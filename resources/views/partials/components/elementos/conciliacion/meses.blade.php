<!-- Meses -->
<div class="form-group row">
    <label for="mes" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Mes') }}</label>
    <div class="col-md-6">
        <select id="mes" class="default-selects form-control @error('mes') is-invalid @enderror" name="mes" required autocomplete="mes" autofocus>
            <option selected="true" value="">Seleccione...</option>
                <option value="1">Enero</option><option value="2">Febrero</option><option value="3">Marzo</option>
                <option value="4">Abril</option><option value="5">Mayo</option><option value="6">Junio</option>
                <option value="7">Julio</option><option value="8">Agosto</option><option value="9">Septiembre</option>
                <option value="10">Octubre</option><option value="11">Noviembre</option><option value="12">Diciembre</option>
        </select>
        @error('mes')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div> 