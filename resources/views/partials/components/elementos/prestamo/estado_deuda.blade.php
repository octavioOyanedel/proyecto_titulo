@php
    $estado_deuda_id = '';
@endphp
@if(isset($prestamo) && $parentesco->estado_deuda_id != null)
    @php
        $estado_deuda_id = $prestamo->getOriginal('estado_deuda_id');
    @endphp
@endif

<!-- formas de pago -->
<div class="form-group row">
    <label for="estado_deuda_id" class="col-md-4 col-form-label text-md-right">{{ __('Estado préstamo') }}</label>
    <div class="col-md-6">
        <select id="estado_deuda_id" class="default-selects form-control @error('estado_deuda_id') is-invalid @enderror" name="estado_deuda_id" required autocomplete="estado_deuda_id" autofocus>

            <option selected="true" value="">Seleccione...</option>

            @if(old('estado_deuda_id') === null)
                {{-- loop sin old --}}
                @foreach($estados as $e)
                    <option value="{{ $e->id }}" {{ $estado_deuda_id == $e->id ? 'selected' : ''}}>{{ $e->nombre }}</option>
                @endforeach
            @else
                {{-- loop con old --}}
                @foreach($estados as $e)      
                    <option value="{{ $e->id }}" @if(old('estado_deuda_id') == $e->id) {{ 'selected' }} @endif>{{ $e->nombre }}</option>
                @endforeach
            @endif

        </select>

        {{-- validacion php --}}
        <small class="form-text text-danger"><strong>@if($errors->has('estado_deuda_id')) {{ $errors->first('estado_deuda_id') }}@endif</strong></small>

    </div>
</div> 