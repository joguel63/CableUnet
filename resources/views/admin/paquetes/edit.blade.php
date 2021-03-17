@extends('adminlte::page')

@section('title', 'CableUnet')

@section('content_header')
    <h1>Editar Paquete</h1>
@stop

@section('content')
<div class="card">

    <div class="card-body">
        {!! Form::model($paquete,['route'=>['admin.paquetes.update',$paquete],'method'=>'put']) !!}
            <div class="form-group">
                {!! Form::label('nombre', 'nombre') !!}
                {!! Form::text('nombre', null, ['class'=>'form-control','placeholder'=>'ingrese el nombre del Paquete']) !!}
                
                @error('nombre')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                
                
            </div>
            
            <div class="form-group">
                {!! Form::label('costo', 'costo') !!}
                {!! Form::number('costo', null, ['class'=>'form-control','placeholder'=>'ingrese el costo del paquete']) !!}
                
                @error('costo')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                
                
            </div>
            

           
                <div class="form-group overflow-auto" style="max-height: 300px" >
                    <p>Canales</p>

                    @foreach ($plans as $plan)
                        <label class="border mx-3 p-2" >
                            {{$plan->nombre.": "}}
                            {!! Form::checkbox('plans[]', $plan->id, null) !!}
                        </label>
                                                
                    @endforeach
                    @error('plans')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
           
           
            {!! Form::submit('Editar Paquete', ['class'=>'btn btn-primary']) !!}
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


