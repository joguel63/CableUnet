   
    <div class="card">
        <div class="card-header">
            
            <input type="text" class="form-control" placeholder="Ingrese el nombre de un usuario" wire:model="search">
            
        </div>
       
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td style="width: 10px" ><a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary btn-sm">Editar</a></td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$users->links()}}
        </div>
       
        
    </div>