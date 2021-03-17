@extends('adminlte::page')

@section('title', 'CableUnet')

@section('content_header')
    <h1>Horario</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-header"><a href="{{ route('admin.channels.show',$horarios->first()->channel)}}" class="btn btn-primary ">Regresar</a></div>
        <div class="card-body">
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
                                <td>{{$horarios->where('fecha',$fecha." 0$i:00:00")->first()->programa->nombre}}</td>
                                @else
                                <td>No hay show</td>
                                @endif
                                
                                                
                            @else
                                <td>{{"$i:00"}}</td>
                                @if ($horarios->where('fecha',$fecha." $i:00:00")!="[]")
                                <td>{{$horarios->where('fecha',$fecha." $i:00:00")->first()->programa->nombre}}</td>
                                @else
                                <td>No hay show</td>
                                @endif
                            @endif
                        </tr>
                    @endfor
                    
                    
                    
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop