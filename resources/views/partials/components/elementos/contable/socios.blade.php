<!-- socios -->
<div class="form-group row">
    <label for="socio_id" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Socios') }}</label>
    <div class="col-md-6">
        <select id="socio_id" class="default-selects form-control @error('socio_id') is-invalid @enderror" name="socio_id" required autocomplete="socio_id" autofocus>
            <option selected="true" value="">Seleccione...</option>
            @foreach($socios as $s)
                <option value="{{ $s->id }}">{{ $s->apellido1 }}</option>
            @endforeach
        </select>
        @error('socio_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div> 