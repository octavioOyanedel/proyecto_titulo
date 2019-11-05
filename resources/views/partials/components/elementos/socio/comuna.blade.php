@if(isset($socio) && $socio->comuna_id != null)
    @php
        $comuna_id = $socio->getOriginal('comuna_id');
    @endphp
@else
    @php
        $comuna_id = '';
    @endphp
@endif

<!-- Comuna -->
<div class="form-group row">
    <label for="comuna_id" class="col-md-4 col-form-label text-md-right">{{ __('Comuna') }}</label>
    <div class="col-md-6">
        <select id="comuna_id" class="default-selects form-control @error('comuna_id') is-invalid @enderror" name="comuna_id" autocomplete="comuna_id" autofocus>
        <option selected="true" value="">Seleccione...</option>
        @foreach($comunas as $c)        
            <option value="{{ $c->id }}" {{ $comuna_id == $c->id ? 'selected' : ''}}>{{ $c->nombre }}</option>
        @endforeach
    </select>
    @error('comuna_id')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    </div>
</div>  