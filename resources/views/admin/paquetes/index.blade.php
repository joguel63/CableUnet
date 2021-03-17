@extends('adminlte::page')

@section('title', 'CableUnet')

@section('content_header')
    <h1>Lista de Paquetes</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-header"><a href="{{ route('admin.paquetes.create')}}" class="btn btn-primary ">Agregar Paquete</a></div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>COSTO</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paquetes as $paquete)
                        <tr>
                            <td>{{$paquete->id}}</td>
                            <td>{{$paquete->nombre}}</td>
                            <td>{{$paquete->costo}}</td>
                            <td style="width: 10px" ><a href="{{ route('admin.paquetes.edit', $paquete) }}" class="btn btn-primary btn-sm">Editar</a></td>
                            <td style="width: 10px">
                                <form action="{{ route('admin.paquetes.destroy', $paquete) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
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