<!-- cuotas -->
<div class="form-group row">
    <label for="cuotas_id" class="col-md-4 col-form-label text-md-right">{{ __('Cantidad de cuotas') }}</label>
    <div class="col-md-6">
        <select id="cuotas_id" class="default-selects form-control @error('cuotas_id') is-invalid @enderror" name="cuotas_id" required autocomplete="cuotas_id" autofocus>
            <option selected="true" value="">Seleccione...</option>
            @for ($i = 1; $i <= 24; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
        @error('cuotas_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>   