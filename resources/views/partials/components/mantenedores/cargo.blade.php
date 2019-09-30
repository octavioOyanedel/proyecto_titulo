<a class="btn btn-primary mt-4 mb-4" href="">Agregar nuevo cargo</a> 
    
<div class="table-responsive">
    <table class="table table-hover" id="tabla-cargos">
        <thead>
            <tr>
                <th width="50" class="text-center" scope="col" title=""></th>
                <th width="50" class="text-center" scope="col" title=""></th>
                <th class="text-center" scope="col">Cargo</th>
            </tr>
        </thead>   
        <tbody>
            @foreach($cargos as $c)
                <tr>                                                
                    <td class="text-center" scope="row" title="Editar sede"><a class="text-secondary" href=""><span>@svg('editar')</span></a></td>
                    <td class="text-center" scope="row" title="Eliminar sede"><a class="text-danger" data-toggle="modal" data-target="#exampleModal" href="#"><span>@svg('eliminar')</span></a></td>
                    <td class="text-center">{{ $c->nombre }}</td>
                </tr>
            @endforeach
        </tbody>                                 
    </table>
</div>