@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Registros</h1>
@stop

@section('content')
    <form action="/users/{{$user->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input id="nombre" name="nombre" type="text" class="form-control" value="{{$user->name}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Correo</label>
            <input id="email" name="email" type="text" class="form-control" value="{{$user->email}}">
        </div>
       
        <a href="/users" class="btn btn-secondary" tabindex="5">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="4">Editar</a>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop