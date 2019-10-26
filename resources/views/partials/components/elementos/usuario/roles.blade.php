@php isset($usuario->rol_id) ? $rol_id = $usuario->getOriginal('rol_id') : $rol_id = '' @endphp
<!-- Usuario -->
<div class="form-group row">
        <label for="rol_id" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>* </b></span>{{ __('Rol') }}</label>
        <div class="col-md-6">
        <select id="rol_id" class="default-selects form-control @error('rol_id') is-invalid @enderror" name="rol_id" required autocomplete="rol_id" autofocus>
            <option selected="true" value="">Seleccione...</option>
            @foreach($roles as $r)
                <option value="{{ $r->id }}" {{ $rol_id == $r->id ? 'selected' : ''}}>{{ $r->nombre }}</option>
            @endforeach
        </select>
        @error('rol_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>   