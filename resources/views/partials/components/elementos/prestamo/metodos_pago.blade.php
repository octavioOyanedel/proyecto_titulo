@php
    $forma_pago_id = '';
@endphp
@if(isset($prestamo) && $parentesco->forma_pago_id != null)
    @php
        $forma_pago_id = $prestamo->getOriginal('forma_pago_id');
    @endphp
@endif

<!-- formas de pago -->
<div class="form-group row">
    <label for="forma_pago_id" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Método de pago') }}</label>
    <div class="col-md-6">
        <select id="forma_pago_id" class="default-selects form-control @error('forma_pago_id') is-invalid @enderror" name="forma_pago_id" required autocomplete="forma_pago_id" autofocus>

            <option selected="true" value="">Seleccione...</option>

            @if(old('forma_pago_id') === null)
                {{-- loop sin old --}}
                @foreach($formas_pago as $f)
                    <option value="{{ $f->id }}" {{ $forma_pago_id == $f->id ? 'selected' : ''}}>{{ $f->nombre }}</option>
                @endforeach
            @else
                {{-- loop con old --}}
                @foreach($formas_pago as $f)      
                    <option value="{{ $f->id }}" @if(old('forma_pago_id') == $f->id) {{ 'selected' }} @endif>{{ $f->nombre }}</option>
                @endforeach
            @endif

        </select>

        {{-- validacion php --}}
        <small class="form-text text-danger"><strong>@if($errors->has('forma_pago_id')) {{ $errors->first('forma_pago_id') }}@endif</strong></small>

    </div>
</div> 