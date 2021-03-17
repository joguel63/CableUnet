@extends('adminlte::page')

@section('title', 'CableUnet')

@section('content_header')
    <h1>Editar Plan</h1>
@stop

@section('content')
<div class="card">

    <div class="card-body">
        {!! Form::model($plan,['route'=>['admin.plans.update',$plan],'method'=>'put']) !!}
            <div class="form-group">
                {!! Form::label('nombre', 'nombre') !!}
                {!! Form::text('nombre', null, ['class'=>'form-control','placeholder'=>'ingrese el nombre del servicio']) !!}
                
                @error('nombre')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                
                
            </div>
            
            <div class="form-group">
                {!! Form::label('servicio_id', 'servicio') !!}
                {!! Form::select('servicio_id', $servicios, null,['class'=>'form-control','wire:model'=>'serv_id','wire:click'=>'namee()','disabled'=>'disabled']) !!}
                {!! Form::hidden('servicio_id', null ) !!}
                @error('servicio_id')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            @if ($plan->servicio->nombre=="Television")
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
           
            {!! Form::submit('Editar Plan', ['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop


