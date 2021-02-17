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
         data: [{
             name: 'Chrome',
             y: 61.41,
             sliced: true,
             selected: true
         }, {
             name: 'Internet Explorer',
             y: 11.84
         }, {
             name: 'Firefox',
             y: 10.85
         }, {
             name: 'Edge',
             y: 4.67
         }, {
             name: 'Safari',
             y: 4.18
         }, {
             name: 'Sogou Explorer',
             y: 1.64
         }, {
             name: 'Opera',
             y: 1.6
         }, {
             name: 'QQ',
             y: 1.2
         }, {
             name: 'Other',
             y: 2.61
         }]
     }]
 });
</script>
<script>
    var text = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean bibendum erat ac justo sollicitudin, quis lacinia ligula fringilla. Pellentesque hendrerit, nisi vitae posuere condimentum, lectus urna accumsan libero, rutrum commodo mi lacus pretium erat. Phasellus pretium ultrices mi sed semper. Praesent ut tristique magna. Donec nisl tellus, sagittis ut tempus sit amet, consectetur eget erat. Sed ornare gravida lacinia. Curabitur iaculis metus purus, eget pretium est laoreet ut. Quisque tristique augue ac eros malesuada, vitae facilisis mauris sollicitudin. Mauris ac molestie nulla, vitae facilisis quam. Curabitur placerat ornare sem, in mattis purus posuere eget. Praesent non condimentum odio. Nunc aliquet, odio nec auctor congue, sapien justo dictum massa, nec fermentum massa sapien non tellus. Praesent luctus eros et nunc pretium hendrerit. In consequat et eros nec interdum. Ut neque dui, maximus id elit ac, consequat pretium tellus. Nullam vel accumsan lorem.';
    var lines = text.split(/[,\. ]+/g),
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