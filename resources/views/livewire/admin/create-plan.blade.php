<div class="card">

    <div class="card-body">
        {!! Form::open(['route'=>'admin.plans.store']) !!}
            <div class="form-group">
                {!! Form::label('nombre', 'nombre') !!}
                {!! Form::text('nombre', null, ['class'=>'form-control','placeholder'=>'ingrese el nombre del plan']) !!}
                
                @error('nombre')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                
                
            </div>
            
            <div class="form-group">
                {!! Form::label('servicio_id', 'servicio') !!}
                {!! Form::select('servicio_id', $servicios, null,['class'=>'form-control','wire:model'=>'serv_id','wire:click'=>'namee()']) !!}
                
                @error('servicio_id')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            @if ($tv)
                <div class="form-group overflow-auto" style="max-height: 300px" >
                    <p>Canales</p>

                    @foreach ($channels as $channel)
                        <label class="border mx-3 p-2" >
                            {{$channel->nombre.": "}}
                            {!! Form::checkbox('channels[]', $channel->id, null) !!}
                        </label>
                                                
                    @endforeach
                    @error('channels')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            @endif
           
            {!! Form::submit('Crear Plan', ['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
