@extends('adminlte::page')

@section('title', 'CableUnet')

@section('content_header')
    <h1>Editar Canal</h1>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            {!! Form::model($channel,['route'=>['admin.channels.update',$channel],'method'=>'put']) !!}
                <div class="form-group">
                    {!! Form::label('nombre', 'nombre') !!}
                    {!! Form::text('nombre', null, ['class'=>'form-control','placeholder'=>'ingrese el nombre del programa']) !!}
                    
                    @error('nombre')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    
                </div>
                {!! Form::submit('Editar Canal', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

