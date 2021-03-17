    <div class="card">
        <div class="card-header">
            
            <input type="text" class="form-control" placeholder="Ingrese el id de un contrato" wire:model="search">
            
        </div>
       
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>FECHA DE FACTURACION</th>
                        <th>USUARIO</th>
                        <th>COSTO</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contratos as $contrato)
                        <tr>
   
                            <td>{{$contrato->id}}</td>
                            <td>{{$contrato->fecha_pago}}</td>
                            <td>{{$contrato->user->name}}</td>
                            <td>{{$contrato->costo}}$</td>
                            <td style="width: 10px" ><a href="{{ route('admin.contratos.edit', $contrato) }}" class="btn btn-primary btn-sm">Editar</a></td>
                            <td style="width: 10px">
                                <form action="{{ route('admin.contratos.destroy', $contrato) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$contratos->links()}}
        </div>
       
        
    </div>