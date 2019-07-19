@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <a href="{{route('sales.create')}}">
            <button type="button" class="btn btn-primary">Registrar Venta</button>
        </a>
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
            @foreach($sales as $key => $row)
            <tr>
                <th>{{$key + 1}}</th>
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
            @endforeach
            </tbody>
        </table>
        {{Auth()->user()->count(3)}}
        <p><strong>Cantidad de Visitas: {{Auth()->user()->getCount(3)}}</strong></p>
    </div>
@endsection
