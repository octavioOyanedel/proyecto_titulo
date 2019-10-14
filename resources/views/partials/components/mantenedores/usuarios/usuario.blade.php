<div class="tab-pane fade show active" id="nav-usuario" role="tabpanel" aria-labelledby="nav-usuario-tab">
    <a class="btn btn-primary mt-4 mb-4" href="{{ route('register') }}">Nuevo Usuario</a> 
    <div class="table-responsive">
        <table class="table table-hover" id="tabla-asociados">
            <thead>
                <tr>
                    <th class="text-center" scope="col" title=""></th>
                    <th class="text-center" scope="col" title=""></th>
                    <th scope="col">Usuario</th>
                </tr>
            </thead>   
            <tbody>
                @foreach($usuarios as $u)
                    <tr>                                                
                        <td class="text-center" with="50" scope="row" title="Editar usuario"><a class="text-secondary" href=""><span>@svg('editar')</span></a></td>
                        <td class="text-center" with="50" scope="row" title="Eliminar usuario"><a class="text-danger" data-toggle="modal" data-target="#exampleModal" href="#"><span>@svg('eliminar')</span></a></td>
                        <td>{{ $u->nombre1 }} {{ $u->nombre2 }} {{ $u->apellido1 }} {{ $u->apellido2 }}</td>
                    </tr>
                @endforeach
            </tbody>                                 
        </table>
    </div>                           
</div>