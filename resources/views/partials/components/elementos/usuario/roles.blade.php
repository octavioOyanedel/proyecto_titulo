@php
    $rol_id = '';
@endphp
@if(isset($usuario) && $usuario->rol_id != null)
    @php
        $rol_id = $usuario->getOriginal('rol_id');
    @endphp
@endif

<!-- Usuario -->
<div class="form-group row">
        <label for="rol_id" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Rol') }}</label>
        <div class="col-md-6">
        <select id="rol_id" class="default-selects form-control @error('rol_id') is-invalid @enderror" name="rol_id" required autocomplete="rol_id" autofocus>

            <option selected="true" value="">Seleccione...</option>

            @if(old('rol_id') === null)
                {{-- loop sin old --}}
                @foreach($roles as $r)
                    <option value="{{ $r->id }}" {{ $rol_id == $r->id ? 'selected' : ''}}>{{ $r->nombre }}</option>
                @endforeach
            @else
                {{-- loop con old --}}
                @foreach($roles as $r)     
                    <option value="{{ $r->id }}" @if(old('rol_id') == $r->id) {{ 'selected' }} @endif>{{ $r->nombre }}</option>
                @endforeach
            @endif

        </select>

        {{-- validacion php --}}
        <small class="form-text text-danger"><strong>@if($errors->has('rol_id')) {{ $errors->first('rol_id') }}@endif</strong></small>

    </div>
</div>  