<!-- usuarios -->
<div class="form-group row">
    <label for="usuario_id" class="col-md-4 col-form-label text-md-right">{{ __('Usuarios') }}</label>
    <div class="col-md-6">
        <select id="usuario_id" class="default-selects form-control @error('usuario_id') is-invalid @enderror" name="usuario_id" autocomplete="usuario_id" autofocus>
            <option selected="true" value="">Seleccione...</option>
            @foreach($usuarios as $u)
                <option value="{{ $u->id }}">@if($u->apellido2 != null) {{ $u->apellido1 }} {{ $u->apellido2 }}, @else {{ $u->apellido1 }}, @endif  {{ $u->nombre1 }} {{ $u->nombre2 }} </option>
            @endforeach
        </select>
        @error('usuario_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div> 