<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    
@extends('adminlte::page')

@section('title', 'Base de Datos')

@section('content_header')
    <h1>Subir Bases</h1>
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
                        <select class="sector_industri_base form-control" name="sector_industri_base">
                        <option selected="">Seleccione...</option>
                        @foreach($baseinformaciones as $base)
                            <option selected="{{$base->sector_industri_base}}">{{$base->sector_industri_base}}</option>
                        @endforeach 
                    </select>
                    </div>
              
                    <div class="input-group mb-3">
                        <input class="form-control" name="file" type="file">
                  
                        <button type="submit" class="btn btn-outline-secondary">Subir </button>
                    </div>  
                </div>
            

                <script type="text/javascript">
                    $('.sector_industri_base').select2({
                        placeholder: 'Select ',
                        tags: true,
                        ajax: {
                            url: '/ajax-autocomplete-search',
                            dataType: 'json',
                            delay: 250,
                            processResults: function (data) {
                                return {
                                    results: $.map(data, function (item) {
                                        return {
                                            text: item.sector_industri_base,
                                            id: item.sector_industri_base
                                        }
                                    })
                                };
                            },
                            cache: true
                        }
                    });
                </script>
                       
      

       
    </form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop