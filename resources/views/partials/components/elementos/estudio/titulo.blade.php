<!-- Titulo -->
<div class="form-group row">
        <label for="titulo_id" class="col-md-4 col-form-label text-md-right">{{ __('Título') }}</label>
        <div class="col-md-6">
        <select id="titulo_id" class="default-selects form-control @error('titulo_id') is-invalid @enderror" name="titulo_id" required autocomplete="titulo_id" autofocus>
            <option selected="true" value="">Seleccione...</option>

        </select>
        @error('titulo_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>  