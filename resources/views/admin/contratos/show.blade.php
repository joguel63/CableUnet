@extends('adminlte::page')

@section('title', 'CableUnet')

@section('content_header')
    <h1>Mi Contrato</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h1 class="h3">Aqui puedes ver tu contrato</h1>
            
        </div>
       
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        
                        <th>FECHA DE FACTURACION</th>
                        <th>USUARIO</th>
                        <th>COSTO</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        
                        <td>{{$contrato->fecha_pago}}</td>
                        <td>{{$contrato->user->name}}</td>
                        <td>{{$contrato->costo}}$</td>
                    </tr>
                </tbody>
            </table>

            <table class="table table-striped">
                <thead>
                    <tr>
                        
                        <th>PAQUETE</th>
                        <th>COSTO</th>
                        
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contrato->paquetes as $paquete)
                        <tr>
                        
                            <td>{{$paquete->nombre}}</td>
                            <td>{{$paquete->costo}}$</td>
                        
                        </tr>

                    @endforeach
                    
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <div>
                <h1 class="h5">Para Realizar una solicitud de cambio o eliminacion presiona en el boton</h1>
            </div>
            <div class="py-3">
                <a href="{{ route('admin.requests.create',) }}" class="btn btn-primary btn-sm">Crear Solicitud</a>
            </div>
        </div>
       
        
    </div>
    
@stop

@section('css')

    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop