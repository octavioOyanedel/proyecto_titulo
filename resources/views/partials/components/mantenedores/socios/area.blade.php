
<div class="tab-pane fade" id="nav-area" role="tabpanel" aria-labelledby="nav-area-tab">
    <a class="btn btn-primary mt-4 mb-4" href="{{ route('areas.create') }}">Agregar área</a> 

    <div class="table-responsive">
        <table class="table table-hover data-tables" id="tabla-areas">
            <thead>
                <tr>
                    <th width="50" class="text-center" scope="col" title=""></th>
                    <th width="50" class="text-center" scope="col" title=""></th>
                    <th scope="col">Sede</th>
                    <th scope="col">Área</th>
                </tr>
            </thead>   
            <tbody>
                @foreach($areas as $a)
                    <tr>                                                
                        <td class="text-center" scope="row" title="Editar área"><a class="text-secondary" href="{{ route('areas.edit',$a) }}"><span>@svg('editar')</span></a></td>
                        <td class="text-center" scope="row" title="Eliminar área"><a data-id="{{ $a->id }}" class="enlace_eliminar text-danger" data-toggle="modal" data-target="#eliminar_area" href="#"><span>@svg('eliminar')</span></a></td>
                        <td title="{{ ($a->sede_id === '') ? 'Sin registro.' : '' }}" class="{{ ($a->sede_id === '') ? 'text-center' : '' }}">{{ celdaCadena($a->sede_id) }}</td>
                        <td>{{ $a->nombre }}</td>
                    </tr>
                @endforeach
            </tbody>                                 
        </table>
    </div>                        
</div>