<!-- Situación -->
<div class="form-group row">
    <label for="estado_socio_id" class="col-md-4 col-form-label text-md-right"></label>
	<div class="col-md-12">
        <select id="estado_socio_id" class="mb-3 default-selects form-control @error('estado_socio_id') is-invalid @enderror" name="estado_socio_id" required autocomplete="estado_socio_id" autofocus>
        	<option selected="true" value="">Seleccione...</option>
            @foreach($estados as $e)      
                <option value="{{ $e->id }}" @if(old('estado_socio_id') == $e->id) {{ 'selected' }} @endif>{{ $e->nombre }}</option>
            @endforeach        	
        </select>
	</div>
</div>