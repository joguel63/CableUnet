   
    <div class="card">
        <div class="card-header">
            
            <a href="{{ route('admin.channels.create')}}" class="btn btn-primary ">Agregar Canal</a>
            
        </div>
       
        <div class="card-body">
            <input type="text" class="form-control" placeholder="Ingrese el nombre de un canal" wire:model="search">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($channels as $channel)
                        <tr>
                            <td>{{$channel->id}}</td>
                            <td>{{$channel->nombre}}</td>
                            <td style="width: 10px" ><a href="{{ route('admin.channels.show', $channel) }}" class="btn btn-primary btn-sm">Programacion</a></td>

                            <td style="width: 10px" ><a href="{{ route('admin.channels.edit', $channel) }}" class="btn btn-primary btn-sm">Editar</a></td>
                            <td style="width: 10px">
                                <form action="{{ route('admin.channels.destroy', $channel) }}" method="post">
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
            {{$channels->links()}}
        </div>
       
        
    </div>