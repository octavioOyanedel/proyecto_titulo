@php
    $parentesco_id = '';
@endphp
@if(isset($parentesco) && $parentesco->parentesco_id != null)
    @php
        $parentesco_id = $parentesco->getOriginal('parentesco_id');
    @endphp
@endif

<!-- parentescos -->
<div class="form-group row">
    <label for="parentesco_id" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Parentesco') }}</label>
    <div class="col-md-6">
        <select id="parentesco_id" class="default-selects form-control @error('parentesco_id') is-invalid @enderror" name="parentesco_id" required autocomplete="parentesco_id" autofocus>

            <option selected="true" value="">Seleccione...</option>

            @if(old('parentesco_id') === null)
                {{-- loop sin old --}}
                @foreach($parentescos as $p)
                    <option value="{{ $p->id }}" {{ $parentesco_id == $p->id ? 'selected' : ''}}>{{ $p->nombre }}</option>
                @endforeach
            @else
                {{-- loop con old --}}
                @foreach($parentescos as $p)      
                    <option value="{{ $p->id }}" @if(old('parentesco_id') == $p->id) {{ 'selected' }} @endif>{{ $p->nombre }}</option>
                @endforeach
            @endif

        </select>

        {{-- validacion php --}}
        <small class="form-text text-danger"><strong>@if($errors->has('parentesco_id')) {{ $errors->first('parentesco_id') }}@endif</strong></small>

    </div>
</div>   