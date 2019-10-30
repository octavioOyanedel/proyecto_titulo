<!-- cheque -->
<div class="form-group row">
    <label for="cheque" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Cheque') }}</label>
    <div class="col-md-6">
        <input id="cheque" type="text" class="form-control @error('cheque') is-invalid @enderror" name="cheque" value="{{ old('cheque') }}" required autocomplete="cheque" autofocus maxlength="9">
		<small class="text-danger d-none" id="error-cheque" class="form-text text-muted"></small>
		<small class="text-secundary d-none" id="comprobar-cheque" class="form-text text-muted">
			<div class="spinner-border spinner-border-sm" role="status">
				<span class="sr-only">Loading...</span>
			</div> comprobando...		
		</small>
		<small class="text-success d-done" id="cheque-ok" class="form-text text-muted"></small>
    </div>
</div>