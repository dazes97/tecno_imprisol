@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <a href="{{route('orders.create')}}">
            <button type="button" class="btn btn-primary">Registrar Orden</button>
        </a>
        <br>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Codigo</th>
                <th scope="col">Fecha</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Monto Total</th>
                <th scope="col">Opciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
            <tr>
                <th>{{$order->id}}</th>
                <th>{{$order->code}}</th>
                <th>{{$order->date}}</th>
                <th>{{$order->description}}</th>
                <th>{{$order->total_amount}}</th>
                <td>
                    <!--<a href="{{route('orders.edit',$order->id)}}"><button type="button" class="btn btn-warning">editar</button></a>-->
                     @if(Auth()->user()->isSelled($order->id))
                            <button type="button" class="btn btn-success">Vendido</button>
                        @else
                            <form action="{{route('orders.destroy',$order->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-danger" value="eliminar">
                            </form>
                     @endif

                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {{Auth()->user()->count(6)}}
        <p><strong>Cantidad de Visitas: {{Auth()->user()->getCount(6)}}</strong></p>
    </div>
@endsection
