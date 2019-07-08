@extends('layout.app')

@section('content')
    <div class="container-fluid">

        <h2>Genarar Reportes</h2>
        <form method="post" action="{{route('reports.store')}}">
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
            
            <div class="form-group">
                <label for="id">Eligan el reporte que desea hacer</label>
                <select class="form-control" id="id" name="id">
                    <option value="1">Ventas</option>
                    <option value="2">Comrpas</option>
                    <option value="3">Productos</option>
                    <option value="4">Pedidos</option>
                </select>
            </div>
            <div class="row">
                <button type="submit" class="btn btn-danger">Generar Reporte</button>
            </div>
        </form>
    </div>

@endsection
