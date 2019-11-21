
<div class="tab-pane fade" id="nav-area" role="tabpanel" aria-labelledby="nav-area-tab">
    <a class="btn btn-primary mt-4 mb-4" href="{{ route('areas.create') }}">Agregar área</a> 
    @if($areas->count() === 0)
        <div class="alert alert-warning mt-4 text-center" role="alert">
            <b>No existen registros.</b>
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th width="50" class="text-center" scope="col" title="">&nbsp;</th>
                        <th width="50" class="text-center" scope="col" title="">&nbsp;</th>
                        <th scope="col">Sede</th>
                        <th scope="col">Área</th>
                    </tr>
                </thead>   
                <tbody>
                    @foreach($areas as $a)
                        <tr>                                                
                            <td class="text-center" scope="row" title="Editar área"><a class="text-secondary" href="{{ route('areas.edit',$a) }}"><span>@svg('editar')</span></a></td>
                            <td class="text-center" scope="row" title="Eliminar área"><a class="text-danger" href="{{ route('areas.destroy',$a) }}"><span>@svg('eliminar')</span></a></td>
                            <td title="{{ ($a->sede_id === '') ? 'Sin registro.' : '' }}" class="{{ ($a->sede_id === '') ? 'text-center' : '' }}">{{ celdaCadena($a->sede_id) }}</td>
                            <td>{{ $a->nombre }}</td>
                        </tr>
                    @endforeach
                </tbody>                                 
            </table>
        </div>
        <div class="float-right mt-3">
            {{ $areas->links() }}    
        </div>       
    @endif
</div>