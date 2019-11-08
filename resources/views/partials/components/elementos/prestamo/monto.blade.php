@php 
	$monto = '';
@endphp
@isset($prestamo)
    @php 
    	$monto = $prestamo->monto; 
    @endphp
@endisset

<!-- monto -->
<div class="form-group row">
    <label for="monto" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Monto') }}</label>
    <div class="col-md-6">
        <input id="monto" type="text" class="form-control @error('monto') is-invalid @enderror" name="monto" value="{{ old('monto') }}" required autocomplete="monto" autofocus maxlength="6" minlength="4">

        {{-- validacion php --}}
        <small class="form-text text-danger"><strong>@if($errors->has('monto')) {{ $errors->first('monto') }}@endif</strong></small>
    </div>
</div>