@php
    $numero_cuotas = '';
@endphp
@if(isset($prestamo) && $prestamo->numero_cuotas != null)
    @php
        $numero_cuotas = $prestamo->numero_cuotas;
    @endphp
@endif

<!-- cuotas -->
<div class="form-group row d-none" id="campo_numero_cuotas">
    <label for="numero_cuotas" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Cantidad de cuotas') }}</label>
    <div class="col-md-6">
        <select id="numero_cuotas" class="default-selects form-control @error('numero_cuotas') is-invalid @enderror" name="numero_cuotas" autocomplete="numero_cuotas" autofocus>

            <option selected="true" value="">Seleccione...</option>

            @if(old('numero_cuotas') === null)
                {{-- loop sin old --}}
                @for ($i = 1; $i <= 24; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            @else
                {{-- loop con old --}}
                @for ($i = 1; $i <= 24; $i++)
                    <option value="{{ $i }}" @if(old('numero_cuotas') == $i) {{ 'selected' }} @endif>{{ $i }}</option>
                @endfor
            @endif

        </select>

        {{-- validacion php --}}
        <small class="form-text text-danger"><strong>@if($errors->has('numero_cuotas')) {{ $errors->first('numero_cuotas') }}@endif</strong></small>

    </div>
</div> 