@extends('adminlte::page')

@section('title', 'CableUnet')

@section('content_header')
    <h1>Lista de Solicitudes</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>USUARIO</th>
                        <th>ESTADO</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requests as $request)
                        <tr>
                            <td>{{$request->id}}</td>
                            <td>{{$request->user->name}}</td>
                            <td>{{$request->status}}</td>
                            <td style="width: 10px" ><a href="{{ route('admin.requests.edit', $request) }}" class="btn btn-primary btn-sm">Mostrar</a></td>
                            <td style="width: 10px">
                                <form action="{{ route('admin.requests.destroy', $request) }}" method="post">
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