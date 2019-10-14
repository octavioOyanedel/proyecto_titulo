<div class="tab-pane fade show active" id="nav-cuenta" role="tabpanel" aria-labelledby="nav-cuenta-tab">
    <a class="btn btn-primary mt-4 mb-4" href="{{ route('cuentas.create') }}">Nueva cuenta</a> 

    <div class="table-responsive">
        <table class="table table-hover" id="tabla-cuentas">
            <thead>
                <tr>
                    <th width="50" class="text-center" scope="col" title=""></th>
                    <th width="50" class="text-center" scope="col" title=""></th>
                    <th class="text-center" scope="col">Cuenta</th>
                </tr>
            </thead>   
            <tbody>
                @foreach($cuentas as $c)
                    <tr>                                                
                        <td class="text-center" scope="row" title="Editar cuenta"><a class="text-secondary" href=""><span>@svg('editar')</span></a></td>
                        <td class="text-center" scope="row" title="Eliminar cuenta"><a class="text-danger" data-toggle="modal" data-target="#exampleModal" href="#"><span>@svg('eliminar')</span></a></td>
                        <td class="text-center">{{ $c->tipo_cuenta_id }} N° {{ $c->numero }} - {{ $c->banco_id }}</td>
                    </tr>
                @endforeach
            </tbody>                                 
        </table>
    </div>                                
</div> 