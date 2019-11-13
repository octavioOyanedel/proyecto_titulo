@php
    $id = 0;
@endphp
<!-- cuentas bancarias -->
<div class="form-group row">
    <label for="concepto_id" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Concepto') }}</label>
    <div class="col-md-6">
        <select id="concepto_id" class="default-selects form-control @error('concepto_id') is-invalid @enderror" name="concepto_id" required autocomplete="concepto_id" autofocus>
            <option selected="true" value="-1">Seleccione...</option>
        </select>

        {{-- validacion php --}}
        <small class="form-text text-danger"><strong>@if($errors->has('concepto_id')) {{ $errors->first('concepto_id') }}@endif</strong></small>

        {{-- captura valor old --}}
        @if(old('concepto_id') != null)
            @php 
                $id = old('concepto_id');
            @endphp
        @endif

        <input id="old_concepto" type="hidden" value="{{ $id }}">  

    </div>
</div> 