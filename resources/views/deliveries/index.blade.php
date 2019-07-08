@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <a href="{{route('deliveries.create')}}">
            <button type="button" class="btn btn-primary">Registrar Entrega</button>
        </a>
        <!--<a href="{{route('report.product')}}">
            <button type="button" class="btn btn-primary">Generar Reporte</button>
        </a>-->
        <br>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Nro</th>
                <th scope="col">Codigo</th>
                <th scope="col">Fecha de Registro</th>
                <th scope="col">Fecha de Entrega</th>
                <th scope="col">Destino</th>
                <th scope="col">Estado</th>
                <th scope="col">Venta</th>
                <!--<th scope="col">Cliente</th>-->
                <th scope="col">Opciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($deliveries as $key => $row)
            <tr>
                <th>{{$key + 1}}</th>
                <th>{{$row->code}}</th>
                <th>{{$row->register_date}}</th>
                <th>{{$row->delivery_date}}</th>
                <th>{{$row->destine}}</th>
                <th>{{$row->estado}}</th>
                <th>{{$row->sale_id}}</th>
                <!--<th>{{$row->code_order}}</th>-->
                <!--<th>{{$row->name}}</th>-->
                <td>
                    @if($row->estado == 'P')
                    <a href="{{ route('deliveries.edit', $row->id) }}">
                        <button type="button" class="btn btn-warning">editar</button>
                    </a>
                    @endif
                    <form action="{{ route('deliveries.destroy', $row->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" class="btn btn-danger" value="eliminar">
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {{Auth()->user()->count(5)}}
        <p><strong>Cantidad de Visitas: {{Auth()->user()->getCount(5)}}</strong></p>
    </div>
@endsection
