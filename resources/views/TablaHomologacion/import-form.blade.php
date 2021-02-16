<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

@extends('adminlte::page')

@section('title', 'Tabla Homologación')

@section('content_header')
    <h1>Tablas Homologación</h1>
@stop

@section('content')
       
    <form method="POST" enctype="multipart/form-data" action="{{ route('tablahomologacion.import') }}">
            @csrf
            <div class="card-body">
                <div class="container">
                    <div class="row g-3">
                        <div class="col">
                            <label>Nombre Tabla</label>
                            <input id="nombre_tabla" name="nombre_tabla" type="text" class="form-control" tabindex="1" required>
                        </div>
                        <div class="col">
                            <label>Descripcion Tabla</label>
                            <input id="descripcion_tabla" name="descripcion_tabla" type="text" class="form-control" tabindex="1" required>
                        </div>
                        <div class="col">
                            <label>Sector Industria Tabla</label>
                            <select class="sector_industria_tabla  form-control p-3" name="sector_industria_tabla">
                            <option selected="">Seleccione...</option>
                            @foreach($TablaHomologaciones as $tabla)
                                <option selected="{{$tabla->sector_industria_tabla}}">{{$tabla->sector_industria_tabla}}</option>
                            @endforeach 
                        </select>
                        </div>
                
                        <div class="input-group mb-3">
                            <input class="form-control" name="file" type="file">
                    
                            <button type="submit" class="btn btn-outline-secondary">Subir </button>
                        </div>  
                    </div>
            
                    <script type="text/javascript">
                        $('.sector_industria_tabla').select2({
                            placeholder: 'Select ',
                            tags: true,
                            ajax: {
                                url: '/ajax-autocomplete-search-homologacion',
                                dataType: 'json',
                                delay: 250,
                                processResults: function (data) {
                                    return {
                                        results: $.map(data, function (item) {
                                            return {
                                                text: item.sector_industria_tabla,
                                                id: item.sector_industria_tabla
                                            }
                                        })
                                    };
                                },
                                cache: true
                            }
                        });
                    </script>                    
      

       
   
    
            </div>
        </form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop