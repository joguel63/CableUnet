
@extends('adminlte::page')

@section('title', 'CableUnet')

@section('content_header')
    <h1>Editar Contrato</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
       
        <div class="card-body">
            
            {!! Form::model($contrato,['route'=>['admin.contratos.update',$contrato],'method'=>'put']) !!}
                           
            <p class="h4 ">Paquetes:</p>
                    <div class="form-group overflow-auto" style="margin-top: 40px;  max-height: 300px;" >
                        
    
                        @foreach ($paquetes as $paquete)
                            <label class="border mx-3 p-2" >
                                {{$paquete->nombre.": "}}
                                {!! Form::checkbox('paquetes[]', $paquete->id, null) !!}
                               
                                
                            </label>
                                                    
                        @endforeach
                        @error('paquetes_id')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                
               
                {!! Form::submit('Editar Contrato', ['class'=>'btn btn-primary']) !!}
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

