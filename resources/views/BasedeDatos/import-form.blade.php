@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Importar</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
        <form method="POST" enctype="multipart/form-data" action="{{ route('basededatos.import') }}">
        @csrf

            <div class="form-group">
                <label for="title">Archivo</label>
                <input type="file" name="file" id= "file" class="form-control">
                
            </div>
            <button type="submit" class="btn btn-primary">Subir </button>
        </form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop