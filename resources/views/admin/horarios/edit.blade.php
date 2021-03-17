@extends('adminlte::page')

@section('title', 'CableUnet')

@section('content_header')
    <h1>Editar Horario</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        

        {!! Form::model($horarios,['route'=>['admin.horarios.update'],'method'=>'put']) !!}
                                
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
                                
                                @if ($horarios->where('fecha',$fecha." 0$i:00:00")!="[]")
                                   
                                <td>  {!! Form::select('programa_id[]', $programas, $horarios->where('fecha',$fecha." 0$i:00:00")->first()->programa->id,['class'=>'form-control']) !!}</td>
                                @else
                                <td >  {!! Form::select('programa_id[]', $programas, null,['class'=>'form-control']) !!}</td>
                                
                                @endif
                                
                                {!! Form::hidden('horario_id[]',$horarios->where('fecha',$fecha." 0$i:00:00")->first()->id) !!}
                                {!! Form::hidden('fecha[]', $fecha." 0$i:00:00") !!}
                                
                                {!! Form::hidden('channel_id[]', $channel_id) !!}
                                
                                                
                            @else
                                <td>{{"$i:00"}}</td>

                                @if ($horarios->where('fecha',$fecha." $i:00:00")!="[]")
                                <td>  {!! Form::select('programa_id[]', $programas, $horarios->where('fecha',$fecha." $i:00:00")->first()->programa->id,['class'=>'form-control']) !!}</td>
                                @else
                                <td>  {!! Form::select('programa_id[]', $programas, null,['class'=>'form-control']) !!}</td>
                                @endif
                                
                                {!! Form::hidden('horario_id[]', $horarios->where('fecha',$fecha." $i:00:00")->first()->id) !!}

                                {!! Form::hidden('fecha[]', $fecha." $i:00:00") !!}
                                
                                {!! Form::hidden('channel_id[]', $channel_id) !!}
                                
                            @endif
                        </tr>
                    @endfor
                    
                    
                    
                </tbody>
            </table>
            {!! Form::submit('Editar Horario', ['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}


    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop