@php
    $id = 0;
@endphp
<!-- Titulo -->
<div class="form-group row">
        <label for="titulo_id" class="col-md-4 col-form-label text-md-right">{{ __('Título') }}</label>
        <div class="col-md-6">
        <select id="titulo_id" class="default-selects form-control @error('titulo_id') is-invalid @enderror" name="titulo_id" autocomplete="titulo_id" autofocus disabled>
            <option selected="true" value="">Seleccione...</option>
        </select>

        {{-- validacion php --}}
        <small class="form-text text-danger"><strong>@if($errors->has('titulo_id')) {{ $errors->first('titulo_id') }}@endif</strong></small>

        {{-- captura valor old --}}
        @if(old('titulo_id') != null)
            @php 
                $id = old('titulo_id');
            @endphp
        @endif    

        <input id="old_titulo" type="hidden" value="{{ $id }}">     

    </div>
</div>  