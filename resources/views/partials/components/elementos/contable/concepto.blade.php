@if(isset($registro))
    @php
        $concepto_id = $registro->getOriginal('concepto_id');
    @endphp
@else
    @php
        $concepto_id = '';
    @endphp
@endif
@php
    $id = 0;
@endphp
<!-- cuentas bancarias -->
<div class="form-group row">
    <label for="concepto_id" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><button type="button" class="btn btn-sm btn-outline-dark rounded-circle mr-2 pb-0" data-container="body" data-toggle="popover" data-placement="left" data-content="Debe seleccionar el tipo de registro antes de seleccionar el concepto.">?</button><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Concepto') }}</label>
    <div class="col-md-6">
        <select id="concepto_id" class="default-selects form-control @error('concepto_id') is-invalid @enderror" name="concepto_id" required autocomplete="concepto_id" autofocus>
            <option selected="true" value="">Seleccione...</option>

            @if(old('concepto_id') === null)
                {{-- loop sin old --}}
                @if(isset($conceptos))
                    @foreach($conceptos as $c)
                        @if(isset($registro))
                            {{-- si existe registro -editar- --}}
                            <option value="{{ $c->id }}" {{ $registro->getOriginal('concepto_id') == $c->id ? 'selected' : ''}}>{{ $c->nombre }}</option>
                        @else
                            <option value="{{ $c->id }}" {{ $concepto_id == $c->id ? 'selected' : ''}}>{{ $c->nombre }}</option>
                        @endif
                    @endforeach
                @endif
            @else
                {{-- loop con old --}}
                @if(isset($conceptos))
                    @foreach($conceptos as $c)
                        <option value="{{ $c->id }}" @if(old('concepto_id') == $c->id) {{ 'selected' }} @endif>{{ $c->nombre }}</option>
                    @endforeach
                @endif
            @endif

        </select>

        {{-- captura valor old --}}
        @if(old('concepto_id') != null)
            @php
                $id = old('concepto_id');
            @endphp
        @endif

        <input id="old_concepto" type="hidden" value="{{ $id }}">

        {{-- validacion php --}}
        <small class="form-text text-danger"><strong>@if($errors->has('concepto_id')) {{ $errors->first('concepto_id') }}@endif</strong></small>
    </div>
</div>