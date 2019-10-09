@php isset($socio->genero) ? $genero = $socio->genero : $genero = '' @endphp
<!-- Género -->
<div class="form-group row">
    <label for="genero" class="col-md-4 col-form-label text-md-right">{{ __('Género') }}</label>
    <div class="col-md-6">
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-outline-secondary {{ $genero == 'Dama' ? 'active focus' : ''}}">
                <input type="radio" class="w-50" name="genero" id="option1" autocomplete="off" value="Dama"> Dama
            </label>
            <label class="btn btn-outline-secondary {{ $genero == 'Varón' ? 'active focus' : ''}}">
                <input type="radio" class="w-50" name="genero" id="option2" autocomplete="off" value="Varón"> Varón
            </label>
        </div>
        @error('genero')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div> 