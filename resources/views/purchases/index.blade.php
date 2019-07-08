@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <a href="{{route('purchases.create')}}">
            <button type="button" class="btn btn-primary">Registrar Compra</button>
        </a>
        <br>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Nro</th>
                <th scope="col">Codigo</th>
                <th scope="col">Fecha de Emision</th>
                <th scope="col">Costo Total</th>
                <th scope="col">Proveedor</th>
                <th scope="col">Opciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($purchases as $key => $row)
            <tr>
                <th>{{$key + 1}}</th>
                <th>{{$row->code}}</th>
                <th>{{$row->emission_date}}</th>
                <th>{{$row->total_cost}}</th>
                <th>{{$row->provider_id}}</th>
                <td>
                    <a href="{{ route('purchases.edit',$row->id) }}"><button type="button" class="btn btn-warning">editar</button></a>
                    <form action="{{ route('purchases.destroy',$row->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" class="btn btn-danger" value="eliminar">
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
