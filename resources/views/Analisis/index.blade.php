@extends('adminlte::page')

@section('title', 'Analisis')

@section('content_header')
    <h1>Analisis</h1>
@stop

@section('content')

<form method="POST" enctype="multipart/form-data" action="{{ route('analisis') }}">
    @csrf
    <div class="card-body">
        <div class="container">
            <div class="row g-3">
               
                <div class="col">
                    <label>Nombre Base</label>
                    <select class="nombre_base  form-control" name="nombre_base">
                        <option selected="">Seleccione...</option>
                        @foreach($BaseInformacion as $nombrebase)
                            <option value="{{$nombrebase->id}}">{{$nombrebase->nombre_base}}</option>
                        @endforeach 
                    </select>
                </div>

                <div class="col">
                    <label>Tabla Homologación</label>
                    <select class="tabla_homologacion  form-control" name="tabla_homologacion">
                        <option selected="">Seleccione...</option>
                        @foreach($TablaHomologacion as $nombretabla)
                            <option value="{{$nombretabla->id}}">{{$nombretabla->nombre_tabla}}</option>
                        @endforeach 
                    </select>
                </div>

                <div class="col">
                    <label> </label>
                    <button class="form-control">Analizar</button>
                </div>
        
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