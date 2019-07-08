@extends('layout.app')

@section('content')
<!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('css/statistics/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/statistics/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/statistics/AdminLTE.min.css') }}">
    <div class="container-fluid">
        <h1>ESTADISTICAS</h1>
       <!-- Donut chart -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <i class="fa fa-bar-chart-o"></i>
                <h3 class="box-title">Donut Chart</h3>
                <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div id="donut-chart" style="height: 300px;"></div>
            </div>
            <!-- /.box-body-->
        </div>
    </div>

   <!-- Bar chart -->
    <div class="box box-primary">
        <div class="box-header with-border">
            <i class="fa fa-bar-chart-o"></i>
            <h3 class="box-title">Bar Chart</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div id="bar-chart" style="height: 300px;"></div>
        </div>
        <!-- /.box-body-->
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

<script>
    var donutData = [
        { label: 'Series2', data: 10, color: '#3c8dbc' },
        { label: 'Series3', data: 20, color: '#0073b7' },
        { label: 'Series4', data: 50, color: '#00c0ef' }
    ]
    $.plot('#donut-chart', donutData, {
        series: {
        pie: {
            show       : true,
            radius     : 1,
            innerRadius: 0.5,
            label      : {
            show     : true,
            radius   : 2 / 3,
            formatter: labelFormatter,
            threshold: 0.1
            }

        }
        },
        legend: {
        show: false
        }
    })

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
