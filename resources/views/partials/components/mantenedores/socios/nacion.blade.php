<div class="tab-pane fade" id="nav-nacionalidad" role="tabpanel" aria-labelledby="nav-nacionalidad-tab">
    <a class="btn btn-primary mt-4 mb-4" href="{{ route('nacionalidades.create') }}">Nueva nacionalidad</a> 

    <div class="table-responsive">
        <table class="table table-hover" id="tabla-nacionalidades">
            <thead>
                <tr>
                    <th width="50" class="text-center" scope="col" title=""></th>
                    <th width="50" class="text-center" scope="col" title=""></th>
                    <th class="text-center" scope="col">Nacionalidad</th>
                </tr>
            </thead>   
            <tbody>
                @foreach($nacionalidades as $n)
                    <tr>                                                
                        <td class="text-center" scope="row" title="Editar nacionalidad"><a class="text-secondary" href="{{ route('nacionalidades.edit',$n) }}"><span>@svg('editar')</span></a></td>
                        <td class="text-center" scope="row" title="Eliminar nacionalidad"><a class="text-danger" data-toggle="modal" data-target="#exampleModal" href="#"><span>@svg('eliminar')</span></a></td>
                        <td class="text-center">{{ $n->nombre }}</td>
                    </tr>
                @endforeach
            </tbody>                                 
        </table>
    </div>                     
</div> 