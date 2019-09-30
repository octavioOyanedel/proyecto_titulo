<!-- Nueva nacionalidad -->
<div class="form-group new-divs row" id="new_div_nation">
    <label for="nueva_sede" class="col-md-4 col-form-label text-md-right">{{ __('Nacionalidad') }}</label>
    <div class="col-md-6">
        <input id="nueva_nacionalidad" type="text" class="new-inputs form-control @error('nueva_nacionalidad') is-invalid @enderror" name="nueva_nacionalidad" value="{{ old('nueva_nacionalidad') }}" required autocomplete="nueva_nacionalidad" autofocus>
        @error('nueva_nacionalidad')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>  