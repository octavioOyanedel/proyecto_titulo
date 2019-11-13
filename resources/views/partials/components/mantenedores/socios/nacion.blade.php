<div class="tab-pane fade" id="nav-nacionalidad" role="tabpanel" aria-labelledby="nav-nacionalidad-tab">
    <a class="btn btn-primary mt-4 mb-4" href="{{ route('nacionalidades.create') }}">Agregar Nacionalidad</a> 

    <div class="table-responsive">
        <table class="table table-hover data-tables" id="tabla-nacionalidades">
            <thead>
                <tr>
                    <th class="text-center" scope="col" title=""></th>
                    <th class="text-center" scope="col" title=""></th>
                    <th class="" scope="col">Nacionalidad</th>
                </tr>
            </thead>   
            <tbody>
                @foreach($nacionalidades as $n)
                    <tr>                                                
                        <td width="50" class="text-center" scope="row" title="Editar nacionalidad"><a class="text-secondary" href="{{ route('nacionalidades.edit',$n) }}"><span>@svg('editar')</span></a></td>
                        <td width="50" class="text-center" scope="row" title="Eliminar nacionalidad"><a id="modal_eliminar_nacionalidad" class="text-danger" data-toggle="modal" data-target="#eliminar_nacionalidad" href="#"><span>@svg('eliminar')</span></a></td>
                        <td class="">{{ $n->nombre }}</td>
                    </tr>
                @endforeach
            </tbody>                                 
        </table>
    </div>                     
</div> 