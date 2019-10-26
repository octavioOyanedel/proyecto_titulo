<!-- conceptos -->
<div class="form-group row">
    <label for="concepto_id" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Conceptos') }}</label>
    <div class="col-md-6">
        <select id="concepto_id" class="default-selects form-control @error('concepto_id') is-invalid @enderror" name="concepto_id" required autocomplete="concepto_id" autofocus>
            <option selected="true" value="">Seleccione...</option>
            @foreach($conceptos as $c)
                <option value="{{ $c->id }}">{{ $c->nombre }}</option>
            @endforeach
        </select>
        @error('concepto_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div> 