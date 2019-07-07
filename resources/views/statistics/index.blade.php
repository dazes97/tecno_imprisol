@extends('layout.app')

@section('content')
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
    <!-- /.box -->

@endsection
