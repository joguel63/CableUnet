@extends('adminlte::page')

@section('title', 'CableUnet')

@section('content_header')
    <h1>Editar Programa</h1>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            {!! Form::model($programa,['route'=>['admin.programas.update',$programa],'method'=>'put']) !!}
                <div class="form-group">
                    {!! Form::label('nombre', 'nombre') !!}
                    {!! Form::text('nombre', null, ['class'=>'form-control','placeholder'=>'ingrese el nombre del programa']) !!}
                    
                    @error('nombre')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    
                </div>
                {!! Form::submit('Editar Programa', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

