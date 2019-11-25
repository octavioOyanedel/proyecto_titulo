@php
    $banco_id = '';
@endphp
@if(isset($cuenta) && $cuenta->banco_id != null)
    @php
        $banco_id = $cuenta->getOriginal('banco_id');
    @endphp
@endif

<!-- bancos -->
<div class="form-group row">
    <label for="banco_id" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span></span>{{ __('Bancos') }}</label>
    <div class="col-md-6">
        <select id="banco_id" class="default-selects form-control @error('banco_id') is-invalid @enderror" name="banco_id" required autocomplete="banco_id" autofocus>

            <option selected="true" value="">Seleccione...</option>

            @if(old('banco_id') === null)
                {{-- loop sin old --}}
                @foreach($bancos as $b)
                    <option value="{{ $b->id }}" {{ $banco_id == $b->id ? 'selected' : ''}}>{{ $b->nombre }}</option>
                @endforeach
            @else
                {{-- loop con old --}}
                @foreach($bancos as $b)      
                    <option value="{{ $b->id }}" @if(old('banco_id') == $b->id) {{ 'selected' }} @endif>{{ $b->nombre }}</option>
                @endforeach
            @endif

        </select>

        {{-- validacion php --}}
        <small class="form-text text-danger"><strong>@if($errors->has('banco_id')) {{ $errors->first('banco_id') }}@endif</strong></small>

    </div>
</div> 

