@php
    $id = 0;
@endphp
<!-- Institución -->
<div class="form-group row">
        <label for="institucion_id" class="col-md-4 col-form-label text-md-right"><span title="Campo obligatorio." class="text-danger"><b>{{ esObligatorio(request()->path()) }} </b></span>{{ __('Institución educacional') }}</label>
        <div class="col-md-6">
        <select id="institucion_id" class="default-selects form-control @error('institucion_id') is-invalid @enderror" name="institucion_id" required autocomplete="institucion_id" autofocus>
            <option selected="true" value="">Seleccione...</option>
        </select>

        {{-- validacion php --}}
        <small class="form-text text-danger"><strong>@if($errors->has('institucion_id')) {{ $errors->first('institucion_id') }}@endif</strong></small>  

        {{-- captura valor old --}}
        @if(old('institucion_id') != null)
            @php 
                $id = old('institucion_id');
            @endphp
        @endif    

        <input id="old_institucion" type="hidden" value="{{ $id }}">  

       @isset($estudioRealizado)
            <input id="edit_institucion" type="hidden" value="@if($estudioRealizado->institucion_id) {{ $estudioRealizado->getOriginal('institucion_id') }} @else {{ null }} @endif">
       @endisset

    </div>
</div>   