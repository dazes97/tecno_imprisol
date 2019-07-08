@extends('layout.app')

@section('content')
<!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('css/statistics/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/statistics/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/statistics/AdminLTE.min.css') }}">
      <!-- Morris charts -->
    <link rel="stylesheet" href="{{ asset('css/statistics/morris.css') }}">
    <div class="container-fluid">
        <h1>ESTADISTICAS</h1>
       <!-- Donut chart -->
    </div>

    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Visitas por cada caso de</h3>

            <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body chart-responsive">
            <div class="chart" id="sales-chart" style="height: 300px; position: relative;"></div>
        </div>
    <!-- /.box-body -->
    </div>
    {{Auth()->user()->count(8)}}
        <p><strong>Cantidad de Visitas: {{Auth()->user()->getCount(8)}}</strong></p>
    <!-- /.box -->

    <!-- jQuery 3 -->
<script src="{{asset('js/statistics/jquery/dist/jquery.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('js/statistics/fastclick/lib/fastclick.js')}}"></script>
<!-- FLOT CHARTS -->
<script src="{{asset('js/statistics/Flot/jquery.flot.js')}}"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="{{asset('js/statistics/Flot/jquery.flot.resize.js')}}"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="{{asset('js/statistics/Flot/jquery.flot.pie.js')}}"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="{{asset('js/statistics/Flot/jquery.flot.categories.js')}}"></script>
<script src="{{asset('js/statistics/morris.js/morris.min.js')}}"></script>
<script src="{{asset('js/statistics/raphael/raphael.min.js')}}"></script>

<script>


//***************************************************** */

    function getEstadisticas() {
        $.ajax({
        // la URL para la petición
        url : '/api/pagecount',

        // especifica si será una petición POST o GET
        type : 'GET',

        // el tipo de información que se espera de respuesta
        dataType : 'json',

        // código a ejecutar si la petición es satisfactoria;
        // la respuesta es pasada como argumento a la función
        success : function(resp) {
            console.log('data ==> '+ resp);
            if (resp.response == 1) {
                let array = [];
                let colors = [];
                let data = resp.data;
                for (let i = 0; i < data.length; i++) {
                    colors.push(data[i].color);
                    array.push({
                        label: data[i].case_use,
                        value: data[i].count
                    });
                }
                //cargar(array);
                var donut = new Morris.Donut({
                element: 'sales-chart',
                resize: true,
                colors: colors,
                data: array,
                hideHover: 'auto'
                });
            }
        },

        // código a ejecutar si la petición falla;
        // son pasados como argumentos a la función
        // el objeto de la petición en crudo y código de estatus de la petición
        error : function(xhr, status) {
            //alert('Disculpe, existió un problema');
        },

        // código a ejecutar sin importar si la petición falló o no
        complete : function(xhr, status) {
            //alert('Petición realizada');
        }
    });
    }
    
    
    getEstadisticas();

    /*
   * Custom Label formatter
   * ----------------------
   */
    function labelFormatter(label, series) {
        return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
        + label
        + '<br>'
        + Math.round(series.percent) + '%</div>'
    }

    /*
     * BAR CHART
     * ---------
     */

    var bar_data = {
      data : [['January', 10], ['February', 8], ['March', 4], ['April', 13], ['May', 17], ['June', 9]],
      color: '#3c8dbc'
    }
    $.plot('#bar-chart', [bar_data], {
      grid  : {
        borderWidth: 1,
        borderColor: '#f3f3f3',
        tickColor  : '#f3f3f3'
      },
      series: {
        bars: {
          show    : true,
          barWidth: 0.5,
          align   : 'center'
        }
      },
      xaxis : {
        mode      : 'categories',
        tickLength: 0
      }
    })
    /* END BAR CHART */
</script>
@endsection
