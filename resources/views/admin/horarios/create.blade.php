@extends('adminlte::page')

@section('title', 'CableUnet')

@section('content_header')
    <h1>Crear Horario</h1>
@stop

@section('content')

   @livewire('admin.horario-create',['channel_id'=>$channel_id])
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop