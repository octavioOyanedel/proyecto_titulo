    @php isset($socio->genero) ? $genero = $socio->genero : $genero = '' @endphp
<!-- Género -->
<div class="form-group row">
    <label for="genero" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Género') }}</label>
    <div class="col-md-6">
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-outline-secondary
            @if(old('genero') == 'Dama' || $genero == 'Dama')
                {{ 'active focus' }}
            @endif
            ">
                <input type="radio" class="w-50" name="genero" id="option1" autocomplete="off" value="Dama" 
                @if(old('genero') == 'Dama' || $genero == 'Dama')
                    {{ 'checked' }}
                @endif
                required> Dama
            </label>
            <label class="btn btn-outline-secondary
            @if(old('genero') == 'Varón' || $genero == 'Varón')
                {{ 'active focus' }}
            @endif
            ">
                <input type="radio" class="w-50" name="genero" id="option2" autocomplete="off" value="Varón" 
                @if(old('genero') == 'Varón' || $genero == 'Varón')
                    {{ 'checked' }}
                @endif> Varón
            </label>
        </div>

        {{-- validacion php --}}
        <small class="form-text text-danger"><strong>@if($errors->has('genero')) {{ $errors->first('genero') }}@endif</strong></small>

    </div>
</div>