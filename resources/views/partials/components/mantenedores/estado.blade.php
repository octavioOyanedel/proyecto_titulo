<a class="btn btn-primary mt-4 mb-4" href="">Agregar nuevo estado</a> 

<div class="table-responsive">
    <table class="table table-hover" id="@php ($estados->count() > 10) ? 'tabla-estados': '' @endphp">
        <thead>
            <tr>
                <th width="50" class="text-center" scope="col" title=""></th>
                <th width="50" class="text-center" scope="col" title=""></th>
                <th class="text-center" scope="col">Estado</th>
            </tr>
        </thead>   
        <tbody>
            @foreach($estados as $e)
                <tr>                                                
                    <td class="text-center" scope="row" title="Editar sede"><a class="text-secondary" href=""><span>@svg('editar')</span></a></td>
                    <td class="text-center" scope="row" title="Eliminar sede"><a class="text-danger" data-toggle="modal" data-target="#exampleModal" href="#"><span>@svg('eliminar')</span></a></td>
                    <td class="text-center">{{ $e->nombre }}</td>
                </tr>
            @endforeach
        </tbody>                                 
    </table>
</div>