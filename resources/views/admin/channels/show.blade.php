@extends('adminlte::page')

@section('title', 'CableUnet')

@section('content_header')
    <h1>Lista de Programacion</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    
    <div class="card">

        <div class="card-header">
            <a href="{{ route('admin.horarios.create',$channel->id)}}" class="btn btn-primary ">Agregar Programacion</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Canal</th>
                        <th>Fecha</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    {{-- <tr>
                        <td><h1>{{$horarios}}</h1></td>
                    </tr> --}}
                    @foreach ($fechas as $fecha)
                        <tr>
                            <td>{{$channel->nombre}}</td>
                            <td>{{$fecha}}</td>
                            @php
                                $datos=['id'=>$channel->id,'fecha'=>$fecha];
                            @endphp
                            <td style="width: 10px" ><a href="{{ route('admin.horarios.index',['channel_id'=>$channel->id,'fecha'=>$fecha]) }}" class="btn btn-primary btn-sm">Mostrar</a></td>
                            <td style="width: 10px"><a href="{{ route('admin.horarios.edit', ['channel_id'=>$channel->id,'fecha'=>$fecha]) }}" class="btn btn-primary btn-sm">Editar</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    
@stop

@section('css')

    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop