@extends('adminlte::page')

@section('title', 'CableUnet')

@section('content_header')
    <h1>Realiza tu solicitud</h1>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            {!! Form::open(['route'=>'admin.requests.store']) !!}
                <p>Requerimento</p>
                <div class="form-group">
                    {!! Form::hidden('user_id', $user->id) !!}
                    {!! Form::hidden('status', "Sin Resolver") !!}
                    {!! Form::textarea('requerimento', null, ['placeholder'=>'escribe tu solicitud']) !!}
                    @error('requerimento')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    
                </div>
                {!! Form::submit('Enviar', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

