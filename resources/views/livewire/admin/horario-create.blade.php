<div class="card">
    <div class="card-header"></div>
    <div class="card-body">
        {!! Form::open(['route'=>'admin.horarios.store']) !!}
            {!! Form::date('fecha', null, ['class'=>'form-control','wire:model'=>'date']) !!}
            @error('fecha')
                <br>
                <strong class="text-danger">{{$message}}</strong>
            @enderror
            
        <table class="table table-striped">

            <thead>
                <tr>
                    <th>HORA</th>
                    <th>Programa</th>
                    
                </tr>
            </thead>
            <tbody>

                
                    
                
                @for ($i = 0; $i < 24; $i++)
                    <tr>
                        @if ($i<10)
                            <td>{{"0$i:00"}}</td>
                                @if ($date=="")
                                {!! Form::hidden('fecha', $date) !!}
                                @else
                                {!! Form::hidden('fecha[]', $date." 0$i:00:00") !!}
                                @endif
                            {!! Form::hidden('channel_id[]', $channel_id) !!}
                            <td>  {!! Form::select('programa_id[]', $programas, null,['class'=>'form-control']) !!}</td>
                                            
                        @else
                            <td>{{"$i:00"}}</td>
                                @if ($date=="")
                                {!! Form::hidden('fecha', $date) !!}
                                @else
                                {!! Form::hidden('fecha[]', $date." $i:00:00") !!}
                                @endif
                            {!! Form::hidden('channel_id[]', $channel_id) !!}
                            <td>  {!! Form::select('programa_id[]', $programas, null,['class'=>'form-control']) !!}</td>
                        @endif
                    </tr>
                @endfor
                
                
                
            </tbody>
        </table>
        {!! Form::submit('Crear Horarios', ['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
