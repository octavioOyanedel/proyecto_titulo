<!-- parentescos -->
<div class="form-group row">
    <label for="parentesco_id" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Parentescos') }}</label>
    <div class="col-md-6">
        <select id="parentesco_id" class="default-selects form-control @error('parentesco_id') is-invalid @enderror" name="parentesco_id" required autocomplete="parentesco_id" autofocus>
            <option selected="true" value="">Seleccione...</option>
            @foreach($parentescos as $p)
                <option value="{{ $p->id }}">{{ $p->nombre }}</option>
            @endforeach
        </select>
        @error('parentesco_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>    