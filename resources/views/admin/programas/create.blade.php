@extends('adminlte::page')

@section('title', 'CableUnet')

@section('content_header')
    <h1>Agregar nuevo Programa</h1>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            {!! Form::open(['route'=>'admin.programas.store']) !!}
                <div class="form-group">
                    {!! Form::label('nombre', 'nombre') !!}
                    {!! Form::text('nombre', null, ['class'=>'form-control','placeholder'=>'ingrese el nombre del programa']) !!}
                    
                    @error('nombre')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    
                </div>
                {!! Form::submit('Crear Programa', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

