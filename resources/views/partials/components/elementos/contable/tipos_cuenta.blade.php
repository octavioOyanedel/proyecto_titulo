@if(isset($cuenta) && $cuenta->tipo_cuenta_id != null)
    @php
        $tipo_cuenta_id = $cuenta->getOriginal('tipo_cuenta_id');
    @endphp
@else
    @php
        $tipo_cuenta_id = '';
    @endphp
@endif

<!-- Sede -->
<div class="form-group row">
        <label for="tipo_cuenta_id" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Tipo de cuenta') }}</label>
        <div class="col-md-6">
        <select id="tipo_cuenta_id" class="default-selects form-control @error('tipo_cuenta_id') is-invalid @enderror" name="tipo_cuenta_id" required autocomplete="tipo_cuenta_id" autofocus>

            <option selected="true" value="">Seleccione...</option>

            @if(old('tipo_cuenta_id') === null)
                {{-- loop sin old --}}
                @foreach($tipos_cuenta as $t) 
                    @if(isset($cuenta))
                        {{-- si existe cuenta -editar- --}}
                        <option value="{{ $t->id }}" {{ $cuenta->getOriginal('tipo_cuenta_id') == $t->id ? 'selected' : ''}}>{{ $t->nombre }}</option>
                    @else
                        <option value="{{ $t->id }}" {{ $tipo_cuenta_id == $t->id ? 'selected' : ''}}>{{ $t->nombre }}</option>
                    @endif
                @endforeach
            @else
                {{-- loop con old --}}
                @foreach($tipos_cuenta as $t)        
                    <option value="{{ $t->id }}" @if(old('tipo_cuenta_id') == $t->id) {{ 'selected' }} @endif>{{ $t->nombre }}</option>
                @endforeach
            @endif

        </select>

        {{-- validacion php --}}
        <small class="form-text text-danger"><strong>@if($errors->has('tipo_cuenta_id')) {{ $errors->first('tipo_cuenta_id') }}@endif</strong></small>
        
    </div>
</div>  