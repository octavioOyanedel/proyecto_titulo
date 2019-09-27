<div class="tab-pane fade show active" id="sede" role="tabpanel" aria-labelledby="sede-tab">

<a class="btn btn-primary mt-4 mb-4" href="">Agregar nueva sede</a> 

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th width="50" class="text-center" scope="col" title=""></th>
                    <th width="50" class="text-center" scope="col" title=""></th>
                    <th class="text-center" scope="col">Sede</th>
                </tr>
            </thead>   
            <tbody>
                @foreach($sedes as $s)
                    <tr>                                                
                        <td class="text-center" scope="row" title="Editar sede"><a class="text-secondary" href=""><span>@svg('editar')</span></a></td>
                        <td class="text-center" scope="row" title="Eliminar sede"><a class="text-danger" data-toggle="modal" data-target="#exampleModal" href="#"><span>@svg('eliminar')</span></a></td>
                        <td class="text-center">{{ $s->nombre }}</td>
                    </tr>
                @endforeach
            </tbody>                                 
        </table>
    </div>
    
</div>