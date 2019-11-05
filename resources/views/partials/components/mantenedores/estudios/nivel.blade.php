<div class="tab-pane fade show active" id="nav-nivel" role="tabpanel" aria-labelledby="nav-nivel-tab">
    <a class="btn btn-primary mt-4 mb-4" href="{{ route('niveles.create') }}">Agregar Nivel Educacional</a> 

    <div class="table-responsive">
        <table class="table table-hover data-tables" id="tabla-niveles">
            <thead>
                <tr>
                    <th class="text-center" scope="col" title=""></th>
                    <th class="text-center" scope="col" title=""></th>
                    <th class="" scope="col">Nivel educacional</th>
                </tr>
            </thead>   
            <tbody>
                @foreach($grados as $g)
                    <tr>                                                
                        <td width="50" class="text-center" scope="row" title="Editar nivel educacional"><a class="text-secondary" href="{{ route('niveles.edit', $g->id) }}"><span>@svg('editar')</span></a></td>
                        <td width="50" class="text-center" scope="row" title="Eliminar nivel educacional"><a class="text-danger" data-toggle="modal" data-target="#eliminar_nivel" href="#"><span>@svg('eliminar')</span></a></td>
                        <td class="">{{ $g->nombre }}</td>
                    </tr>
                @endforeach
            </tbody>                                 
        </table>
    </div>                                
</div> 