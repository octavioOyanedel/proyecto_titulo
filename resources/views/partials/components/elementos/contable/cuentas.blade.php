@if(isset($registro) && $registro->cuenta_id != null)
    @php
        $cuenta_id = $registro->getOriginal('cuenta_id');
    @endphp
@else
    @php
        $cuenta_id = '';
    @endphp
@endif

<!-- cuentas bancarias -->
<div class="form-group row">
    <label for="cuenta_id" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Cuentas') }}</label>
    <div class="col-md-6">
        <select id="cuenta_id" class="default-selects form-control @error('cuenta_id') is-invalid @enderror" name="cuenta_id" required autocomplete="cuenta_id" autofocus>

            <option selected="true" value="">Seleccione...</option>

            @if(old('cuenta_id') === null)
                {{-- loop sin old --}}
                @foreach($cuentas as $c)
                    <option value="{{ $c->id }}" {{ $cuenta_id == $c->id ? 'selected' : ''}}>{{ $c->tipo_cuenta_id }} N° {{ $c->numero }} - {{ $c->banco_id }}</option>      
                @endforeach
            @else
                {{-- loop con old --}}
                @foreach($cuentas as $c)      
                    <option value="{{ $c->id }}" @if(old('cuenta_id') == $c->id) {{ 'selected' }} @endif>{{ $c->tipo_cuenta_id }} N° {{ $c->numero }} - {{ $c->banco_id }}</option>                      
                @endforeach
            @endif

        </select>

        {{-- validacion php --}}
        <small class="form-text text-danger"><strong>@if($errors->has('cuenta_id')) {{ $errors->first('cuenta_id') }}@endif</strong></small>

    </div>
</div> 