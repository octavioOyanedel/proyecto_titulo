@php isset($parentesco) ? $parentesco_id = $parentesco->getOriginal('id') : $parentesco_id = '' @endphp

<!-- parentescos -->
<div class="form-group row">
    <label for="nombre" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Parentesco') }}</label>
    <div class="col-md-6">
        <select id="nombre" class="default-selects form-control @error('nombre') is-invalid @enderror" name="nombre" required autocomplete="nombre" autofocus>
            <option selected="true" value="">Seleccione...</option>
            @foreach($parentescos as $p)
                <option value="{{ $p->id }}" {{ $parentesco_id == $p->id ? 'selected' : ''}}>{{ $p->nombre }}</option>
            @endforeach
        </select>
        @error('nombre')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>    