
@extends('adminlte::page')

@section('title', 'CableUnet')

@section('content_header')
    <h1>Bienvenido a la tienda</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        @if (auth()->user()->contrato!="")
        <div class="card-header">
            <h1 class="h3">ya tienes un contrato, para acceder presiona en el boton</h1>
        </div>
        <div class="card-body">
            <a href="{{ route('admin.contratos.show', auth()->user()->contrato) }}" class="btn btn-primary btn-sm">Ver Contrato</a>
        </div>
        @else
        <div class="card-body">
            {!! Form::open(['route'=>'admin.contratos.store']) !!}
                
            <p class="h4 ">Adquiere uno de los grandiosos paquetes que tenemos para ti:</p>
                    <div class="form-group overflow-auto" style="margin-top: 40px;  max-height: 300px;" >
                        
    
                        @foreach ($paquetes as $paquete)
                            <label class="border mx-3 p-2" >
                                {{$paquete->nombre.": "}}
                                {!! Form::checkbox('paquetes_id[]', $paquete->id, null) !!}
                                {!! Form::hidden('user_id', auth()->user()->id) !!}
                            </label>
                                                    
                        @endforeach
                        @error('paquetes_id')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                
               
                {!! Form::submit('Realizar compra', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>  

        @endif

        
        
    </div>
    
    
@stop

@section('css')

    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

