<!-- cheque -->
<div class="form-group row">
    <label for="cheque" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Cheque') }}</label>
    <div class="col-md-6">
        <input id="cheque" type="text" class="form-control @error('cheque') is-invalid @enderror" name="cheque" value="{{ old('cheque') }}" required autocomplete="cheque" autofocus>
        @error('cheque')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>