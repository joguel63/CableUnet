@extends('adminlte::page')

@section('title', 'CableUnet')

@section('content_header')
    <h1>Agregar nuevo Canal</h1>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            {!! Form::open(['route'=>'admin.channels.store']) !!}
                <div class="form-group">
                    {!! Form::label('nombre', 'nombre') !!}
                    {!! Form::text('nombre', null, ['class'=>'form-control','placeholder'=>'ingrese el nombre del canal']) !!}
                    
                    @error('nombre')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    
                </div>
                {!! Form::submit('Crear Canal', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

