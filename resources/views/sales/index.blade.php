@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <a href="{{route('sales.create')}}">
            <button type="button" class="btn btn-primary">Registrar Venta</button>
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
                <th scope="col">Fecha de Emision</th>
                <th scope="col">Monto Total</th>
                <th scope="col">Codigo Orden</th>
                <!--<th scope="col">Cliente</th>-->
                <th scope="col">Opciones</th>
            </tr>
            </thead>
            <tbody>
            {{ $nro = 1 }}
            @foreach($sales as $row)
            <tr>
                <th>{{$nro}}</th>
                <th>{{$row->code}}</th>
                <th>{{$row->emission_date}}</th>
                <th>{{$row->total_amount}}</th>
                <th>{{$row->order_id}}</th>
                <!--<th>{{$row->code_order}}</th>-->
                <!--<th>{{$row->name}}</th>-->
                <td>
                    <a href="{{ route('sales.edit',$row->id) }}"><button type="button" class="btn btn-warning">editar</button></a>
                    <form action="{{ route('sales.destroy',$row->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" class="btn btn-danger" value="eliminar">
                    </form>
                </td>
            </tr>
            {{ $nro++ }}
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
