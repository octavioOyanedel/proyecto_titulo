@php 
	$cheque = '';
@endphp
@isset($registro)
    @php 
    	$cheque = $registro->cheque; 
    @endphp
@endisset

<!-- cheque -->
<div id="campo_cheque" class="form-group row">
    <label for="cheque" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Cheque') }}</label>
    <div class="col-md-6">
        <input id="cheque" type="text" class="form-control @error('cheque') is-invalid @enderror" name="cheque" value="{{ old('cheque') }}" autocomplete="cheque" autofocus maxlength="9" placeholder="Ej. 3210123" required>

        {{-- validacion php --}}
        <small id="error-cheque-php" class="form-text text-danger"><strong>@if($errors->has('cheque')) {{ $errors->first('cheque') }}@endif</strong></small>  

        {{-- validacion javascript --}}
		<small id="error-cheque" class="d-none form-text text-danger font-weight-bold"></small>

		<small id="comprobar-cheque" class="form-text text-secundary d-none">
			<div class="spinner-border spinner-border-sm" role="status">
				<span class="sr-only">Comprobando...</span>
			</div>&nbsp;&nbsp;Comprobando...		
		</small>

		<small id="cheque-ok" class="d-done form-text text-success font-weight-bold"></small>
    </div>
</div>