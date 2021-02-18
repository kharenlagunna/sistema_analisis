<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/wordcloud.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

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
            <div class="row">               
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
    </div>

    <div class="card-body">
        <div class="container">
            <div class="row">               
                <div class="col">
                    <div id="container1" style="width:100%; height:400px;"></div>
                </div>
                <div class="col">
                    <div id="container2" style="width:100%; height:400px;"></div>
                </div>
            </div>
        </div>
    </div>

</form>

<script>
    Highcharts.chart('container1', {
     chart: {
         plotBackgroundColor: null,
         plotBorderWidth: null,
         plotShadow: false,
         type: 'pie'
     },
     title: {
         text: 'Browser market shares in January, 2018'
     },
     tooltip: {
         pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
     },
     accessibility: {
         point: {
             valueSuffix: '%'
         }
     },
     plotOptions: {
         pie: {
             allowPointSelect: true,
             cursor: 'pointer',
             dataLabels: {
                 enabled: true,
                 format: '<b>{point.name}</b>: {point.percentage:.1f} %'
             }
         }
     },
     series: [{
         name: 'Brands',
         colorByPoint: true,
         data: [
        ['Apples', 29.9, false],
        ['Pears', 71.5, false],
        ['Oranges', 106.4, false],
        ['Plums', 129.2, false],
        ['Bananas', 144.0, false],
        ['Peaches', 176.0, false],
        ['Prunes', 135.6, false],
        ['Avocados', 2000, false]
    ],
    showInLegend: true
     }]
 });
</script>
<script>
    var text = 'Fria ,Calor ,Calor ,Ciudad ,Sin Categoria ,Sin Categoria ,Ciudad ,Sin Categoria ,Sin Categoria ,Ciudad ,Sin Categoria ,Sin Categoria ,Ciudad ,Sin Categoria ,Sin Categoria ,Ciudad ,Sin Categoria ,Ciudad ,Sin Categoria ,Sin Categoria ,Sin Categoria ,Sin Ca...';
    var lines = text.split(/[,\.]+/g),
    data = Highcharts.reduce(lines, function (arr, word) {
        var obj = Highcharts.find(arr, function (obj) {
            return obj.name === word;
        });
        if (obj) {
            obj.weight += 1;
        } else {
            obj = {
                name: word,
                weight: 1
            };
            arr.push(obj);
        }
        return arr;
    }, []);

Highcharts.chart('container2', {
    accessibility: {
        screenReaderSection: {
            beforeChartFormat: '<h5>{chartTitle}</h5>' +
                '<div>{chartSubtitle}</div>' +
                '<div>{chartLongdesc}</div>' +
                '<div>{viewTableButton}</div>'
        }
    },
    series: [{
        type: 'wordcloud',
        data: data,
        name: 'Occurrences'
    }],
    title: {
        text: 'Wordcloud of Lorem Ipsum'
    }
});
</script>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop