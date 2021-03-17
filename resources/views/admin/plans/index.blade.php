@extends('adminlte::page')

@section('title', 'CableUnet')

@section('content_header')
    <h1>Lista de Planes</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-header"><a href="{{ route('admin.plans.create')}}" class="btn btn-primary ">Agregar Plan</a></div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>SERVICIO</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plans as $plan)
                        <tr>
                            <td>{{$plan->id}}</td>
                            <td>{{$plan->nombre}}</td>
                            <td>{{$plan->servicio->nombre}}</td>
                            <td style="width: 10px" ><a href="{{ route('admin.plans.edit', $plan) }}" class="btn btn-primary btn-sm">Editar</a></td>
                            <td style="width: 10px">
                                <form action="{{ route('admin.plans.destroy', $plan) }}" method="post">
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