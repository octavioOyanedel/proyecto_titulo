<div class="tab-pane fade" id="nav-nacionalidad" role="tabpanel" aria-labelledby="nav-nacionalidad-tab">
    <a class="btn btn-primary mt-4 mb-4" href="{{ route('nacionalidades.create') }}">Agregar Nacionalidad</a> 

    @if($nacionalidades->count() === 0)
        <div class="alert alert-warning mt-4 text-center" role="alert">
            <b>No existen registros.</b>
        </div>
    @else      
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="text-center" scope="col" title="">&nbsp;</th>
                        <th class="text-center" scope="col" title="">&nbsp;</th>
                        <th class="" scope="col">Nacionalidad</th>
                    </tr>
                </thead>   
                <tbody>
                    @foreach($nacionalidades as $n)
                        <tr>                                                
                            <td width="50" class="text-center" scope="row" title="Editar nacionalidad"><a class="text-secondary" href="{{ route('nacionalidades.edit',$n) }}"><span>@svg('editar')</span></a></td>
                            <td width="50" class="text-center" scope="row" title="Eliminar nacionalidad"><a class="text-danger" href="{{ route('nacionalidades.show',$n->id) }}"><span>@svg('eliminar')</span></a></td>
                            <td class="">{{ $n->nombre }}</td>
                        </tr>
                    @endforeach
                </tbody>                                 
            </table>
        </div>
        <div class="float-right mt-3">
            {{ $nacionalidades->links() }}    
        </div>           
    @endif                   
</div> 