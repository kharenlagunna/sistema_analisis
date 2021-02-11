<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
@extends('adminlte::page')

@section('title', 'Base de Datos')

@section('content_header')
    <h1>Subir Tablas Homologación</h1>
@stop

@section('content')
       
    <form method="POST" enctype="multipart/form-data" action="{{ route('basededatos.import') }}">
            @csrf

            <div class="container">
                <div class="row g-3">
                    <div class="col">
                        <label>Nombre Base</label>
                        <input id="nombre_base" name="nombre_base" type="text" class="form-control" tabindex="1" required>
                    </div>
                    <div class="col">
                        <label>Descripcion Base</label>
                        <input id="descripcion_base" name="descripcion_base" type="text" class="form-control" tabindex="1" required>
                    </div>
                    <div class="col">
                        <label>Sector Industria Base</label>
                        <input id="sector_industri_base" name="sector_industri_base" type="text" class="form-control" tabindex="1" required>
                    </div>
              
                    <div class="input-group mb-3">
                        <input class="form-control" name="file" type="file">
                  
                        <button type="submit" class="btn btn-outline-secondary">Subir </button>
                    </div>  
                </div>
            
                       
      

       
    </form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop