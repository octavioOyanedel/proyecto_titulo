<div class="tab-pane fade" id="nav-concepto" role="tabpanel" aria-labelledby="nav-concepto-tab">
    <a class="btn btn-primary mt-4 mb-4" href="{{ route('conceptos.create') }}">Nuevo concepto</a> 

    <div class="table-responsive">
        <table class="table table-hover" id="tabla-conceptos">
            <thead>
                <tr>
                    <th width="50" class="text-center" scope="col" title=""></th>
                    <th width="50" class="text-center" scope="col" title=""></th>
                    <th class="text-center" scope="col">Concepto</th>
                </tr>
            </thead>   
            <tbody>
                @foreach($conceptos as $c)
                    <tr>                                                
                        <td class="text-center" scope="row" title="Editar concepto"><a class="text-secondary" href=""><span>@svg('editar')</span></a></td>
                        <td class="text-center" scope="row" title="Eliminar concepto"><a class="text-danger" data-toggle="modal" data-target="#eliminar_concepto" href="#"><span>@svg('eliminar')</span></a></td>
                        <td class="text-center">{{ $c->nombre }}</td>
                    </tr>
                @endforeach
            </tbody>                                 
        </table>
    </div>                                
</div>   