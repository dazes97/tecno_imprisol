@extends('layout.app')

@section('content')
    <div class="container-fluid">

        <h2>Reportes de Ventas</h2>
        <form method="post" action="{{ route('sales.generarrep') }}">
            @csrf
            <div class="row">
                <div class="form-group col-lg-4">
                    <label for="date">Fecha inicio</label>
                    <input type="date" class="form-control" id="date_inicio" name="date_inicio">
                </div>
                <div class="form-group col-lg-4">
                    <label for="date">Fecha inicio</label>
                    <input type="date" class="form-control" id="date_fin" name="date_fin">
                </div>
            </div>
            <div class="row">
                <button type="submit" class="btn btn-danger">Generar Reporte</button>
            </div>
        </form>
    </div>

@endsection
