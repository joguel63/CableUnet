   
    <div class="card">
        <div class="card-header">
            
            <a href="{{ route('admin.programas.create')}}" class="btn btn-primary ">Agregar Programa</a>
            
        </div>
       
        <div class="card-body">
            <input type="text" class="form-control" placeholder="Ingrese el nombre de un programa" wire:model="search">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($programas as $programa)
                        <tr>
                            <td>{{$programa->id}}</td>
                            <td>{{$programa->nombre}}</td>
                            <td style="width: 10px" ><a href="{{ route('admin.programas.edit', $programa) }}" class="btn btn-primary btn-sm">Editar</a></td>
                            <td style="width: 10px">
                                <form action="{{ route('admin.programas.destroy', $programa) }}" method="post">
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
            {{$programas->links()}}
        </div>
       
        
    </div>