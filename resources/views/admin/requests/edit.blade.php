@extends('adminlte::page')

@section('title', 'CableUnet')

@section('content_header')
    <h1>Solicitud</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    {!! Form::model($request,['route'=>['admin.requests.update',$request->id],'method'=>'put']) !!}

        <div class="card">
            <div class="card-header">
                <h1 class="h3">{{$request->status}}</h1>
                
            </div>
        
            <div class="card-body">
                <p>{{$request->requerimento}}</p>
                {!! Form::hidden('status', 'Resuelto') !!}
            
            </div>
            <div class="card-footer">
                
                {!! Form::submit('Marcar como Resuelto', ['class'=>'btn btn-primary']) !!}
                
            </div>
        
            
        </div>
    {!! Form::close() !!}
    
@stop

@section('css')

    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop